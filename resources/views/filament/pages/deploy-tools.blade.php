<x-filament-panels::page>
  <form wire:submit="execute">
    {{ $this->form }}

    <div class="mt-6 flex gap-3">
      <x-filament::button type="submit" color="warning" icon="heroicon-o-play">
        Exécuter les tâches sélectionnées
      </x-filament::button>
    </div>
  </form>

  @if(! empty($executionLog))
    <div class="mt-8">
      <h3 class="text-lg font-semibold mb-4">Journal d'exécution</h3>
      <div class="space-y-3">
        @foreach($executionLog as $entry)
          <div @class([
            'rounded-lg border p-4',
            'border-success-300 bg-success-50 dark:bg-success-950/30' => $entry['status'] === 'success',
            'border-danger-300 bg-danger-50 dark:bg-danger-950/30' => $entry['status'] === 'error',
          ])>
            <p class="font-medium">
              {{ $entry['task'] }}
              <span @class([
                'ml-2 text-xs uppercase',
                'text-success-600' => $entry['status'] === 'success',
                'text-danger-600' => $entry['status'] === 'error',
              ])>
                {{ $entry['status'] }}
              </span>
            </p>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-300 whitespace-pre-wrap">{{ $entry['message'] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  @endif

  <div class="mt-8 rounded-lg border border-gray-200 dark:border-gray-700 p-4 text-sm">
    <h4 class="font-semibold mb-2">Assistant d'installation (première mise en ligne)</h4>
    <p class="mb-2">Avant la première installation, visitez <code>{{ url('/install') }}</code> : le site redirige automatiquement vers cette page tant qu'il n'est pas lancé.</p>
    <p class="text-gray-500">L'API distante reste disponible pour les scripts :</p>
    <pre class="overflow-x-auto rounded bg-gray-100 dark:bg-gray-900 p-3 text-xs">curl -X POST {{ url('/deploy/init') }} \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{
    "secret": "VOTRE_DEPLOY_SECRET",
    "migrations": true,
    "storage_link": true,
    "shield_permissions": true,
    "super_admin": true,
    "seeders": ["settings", "admin"]
  }'</pre>
  </div>
</x-filament-panels::page>
