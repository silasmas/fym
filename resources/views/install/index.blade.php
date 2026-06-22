<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Installation — {{ config('app.name') }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            fym: {
              DEFAULT: '#3B4D2A',
              light: '#6A9E4A',
            },
          },
        },
      },
    };
  </script>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 to-green-50 text-slate-800 antialiased">
  <div class="mx-auto flex min-h-screen max-w-3xl flex-col justify-center px-4 py-10">
    <div class="mb-8 text-center">
      <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-fym text-2xl font-bold text-white shadow-lg">
        FYM
      </div>
      <h1 class="text-3xl font-bold text-fym">Installation du site</h1>
      <p class="mt-2 text-slate-600">
        Configurez la base de données, les paramètres et l'administration avant le lancement public.
      </p>
    </div>

    @if (session('error'))
      <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-800">
        {{ session('error') }}
      </div>
    @endif

    @if (session('status'))
      <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-800">
        {{ session('status') }}
      </div>
    @endif

    @if (! $hasSecret)
      <div class="mb-6 rounded-xl border border-amber-200 bg-amber-50 px-4 py-3 text-amber-900">
        <strong>Action requise :</strong> ajoutez <code class="rounded bg-amber-100 px-1">DEPLOY_SECRET=...</code>
        dans le fichier <code class="rounded bg-amber-100 px-1">.env</code> sur le serveur, puis rechargez cette page.
      </div>
    @endif

    @if (! empty(session('log')))
      <div class="mb-6 space-y-2">
        <h2 class="text-sm font-semibold uppercase tracking-wide text-slate-500">Journal d'exécution</h2>
        @foreach (session('log') as $entry)
          <div @class([
            'rounded-lg border px-4 py-3 text-sm',
            'border-green-200 bg-green-50 text-green-900' => $entry['status'] === 'success',
            'border-red-200 bg-red-50 text-red-900' => $entry['status'] === 'error',
          ])>
            <p class="font-medium">{{ $entry['task'] }} — {{ $entry['status'] }}</p>
            <p class="mt-1 whitespace-pre-wrap opacity-80">{{ $entry['message'] }}</p>
          </div>
        @endforeach
      </div>
    @endif

    <form method="POST" action="{{ route('install.store') }}" class="rounded-2xl border border-slate-200 bg-white p-6 shadow-xl shadow-slate-200/60">
      @csrf

      <div class="mb-6">
        <label for="secret" class="mb-2 block text-sm font-semibold text-slate-700">
          Clé secrète de déploiement (DEPLOY_SECRET)
        </label>
        <input
          type="password"
          id="secret"
          name="secret"
          required
          @disabled(! $hasSecret)
          class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:border-fym focus:outline-none focus:ring-2 focus:ring-fym/20"
          placeholder="Collez la valeur DEPLOY_SECRET du .env"
        >
        @error('secret')
          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <fieldset class="mb-6">
        <legend class="mb-3 text-sm font-semibold uppercase tracking-wide text-slate-500">Tâches système</legend>
        <div class="grid gap-3 sm:grid-cols-2">
          @foreach ($tasks as $key => $label)
            <label class="flex cursor-pointer items-start gap-3 rounded-xl border border-slate-200 p-4 hover:border-fym-light hover:bg-green-50/50">
              <input
                type="checkbox"
                name="{{ $key }}"
                value="1"
                @checked(old($key, true))
                @disabled(! $hasSecret)
                class="mt-1 rounded border-slate-300 text-fym focus:ring-fym"
              >
              <span>
                <span class="block font-medium text-slate-800">{{ $label }}</span>
              </span>
            </label>
          @endforeach
        </div>
      </fieldset>

      <fieldset class="mb-8">
        <legend class="mb-3 text-sm font-semibold uppercase tracking-wide text-slate-500">Seeders</legend>
        <div class="space-y-3">
          @foreach ($seeders as $key => $label)
            <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 p-4 hover:border-fym-light hover:bg-green-50/50">
              <input
                type="checkbox"
                name="seeders[]"
                value="{{ $key }}"
                @checked(in_array($key, old('seeders', array_keys($seeders)), true))
                @disabled(! $hasSecret)
                class="rounded border-slate-300 text-fym focus:ring-fym"
              >
              <span class="font-medium text-slate-800">{{ $label }}</span>
            </label>
          @endforeach
        </div>
      </fieldset>

      <button
        type="submit"
        @disabled(! $hasSecret)
        class="w-full rounded-xl bg-fym px-6 py-4 text-lg font-semibold text-white shadow-lg shadow-fym/30 transition hover:bg-fym-light disabled:cursor-not-allowed disabled:opacity-50"
      >
        Installer et lancer le site
      </button>
    </form>

    <p class="mt-6 text-center text-xs text-slate-500">
      Après installation, cette page sera inaccessible. Les mises à jour se font depuis le menu
      <strong>Système → Déploiement</strong> dans l'administration.
    </p>
  </div>
</body>
</html>
