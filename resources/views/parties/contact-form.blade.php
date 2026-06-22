@if(session('success'))
  <div class="alert alert-success mb-30">{{ session('success') }}</div>
@endif

@if($errors->any())
  <div class="alert alert-danger mb-30">
    <ul class="mb-0">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('contact.store') }}" method="post" class="contact-form-laravel">
  @csrf
  <div class="form_group form-group">
    <input type="text" class="form_control" placeholder="Nom complet" name="name" value="{{ old('name') }}" required>
  </div>
  <div class="form_group form-group">
    <input type="email" class="form_control" placeholder="Adresse e-mail" name="email" value="{{ old('email') }}" required>
  </div>
  @if($showPhone ?? false)
    <div class="form_group form-group">
      <input type="text" class="form_control" placeholder="Téléphone" name="phone" value="{{ old('phone') }}">
    </div>
  @endif
  @if($showSubject ?? false)
    <div class="form_group form-group">
      <input type="text" class="form_control" placeholder="Sujet" name="subject" value="{{ old('subject') }}">
    </div>
  @endif
  <div class="form_group form-group">
    <textarea class="form_control" placeholder="Écrire votre message" name="message" required>{{ old('message') }}</textarea>
  </div>
  <div class="form_group form-group">
    <button type="submit" class="main-btn btn-yellow">{{ $submitLabel ?? 'Envoyer le message' }}</button>
  </div>
</form>
