<x-guest-layout bodyClass="register-bg">
    <link rel="stylesheet" href="{{ asset('css/stylelogin.css') }}">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="form-container" style="background-color: #FFF8DC;">

        <div class="form-header">
            <h1>Connexion</h1>
            <p class="subtitle">Bienvenue à Eat&Drink, connectez-vous pour accéder à votre espace.</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <x-input-label for="email" value="Adresse email" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="form-group">
                <x-input-label for="password" value="Mot de passe" />
                <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="form-group remember-me">
                <label for="remember_me" class="inline-flex items-center cursor-pointer">
                    <input id="remember_me" type="checkbox" name="remember" class="checkbox-input" />
                    <span class="ms-2 text-sm text-purple-700">Se souvenir de moi</span>
                </label>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="link-forgot-password">
                        Mot de passe oublié ?
                    </a>
                @endif

                <x-primary-button class="button-submit">
                    Se connecter
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
