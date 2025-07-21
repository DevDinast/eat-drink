<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <div class="form-container">

        <!-- Titre -->
        <div class="form-header">
            <h1>Inscription des Entrepreneurs</h1>
            <p class="subtitle">Participez à Eat&Drink en enregistrant votre stand.</p>
        </div>

        <!-- Formulaire -->
        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <!-- Nom de l'entreprise -->
            <div class="form-group">
                <x-input-label for="nom_entreprise" value="Nom de l'entreprise" />
                <x-text-input id="nom_entreprise" class="block mt-1 w-full" type="text" name="nom_entreprise" :value="old('nom_entreprise')" required autofocus />
                <x-input-error :messages="$errors->get('nom_entreprise')" class="mt-2" />
            </div>

            <!-- Nom du responsable -->
            <div class="form-group">
                <x-input-label for="nom_responsable" value="Nom du responsable" />
                <x-text-input id="nom_responsable" class="block mt-1 w-full" type="text" name="nom_responsable" :value="old('nom_responsable')" required />
                <x-input-error :messages="$errors->get('nom_responsable')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="form-group">
                <x-input-label for="email" value="Adresse email" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Mot de passe -->
            <div class="form-group">
                <x-input-label for="password" value="Mot de passe" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirmation du mot de passe -->
            <div class="form-group">
                <x-input-label for="password_confirmation" value="Confirmation du mot de passe" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Téléphone -->
            <div class="form-group">
                <x-input-label for="telephone" value="Téléphone" />
                <x-text-input id="telephone" class="block mt-1 w-full" type="tel" name="telephone" :value="old('telephone')" required />
                <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
            </div>

            <!-- Nom du stand -->
            <div class="form-group">
                <x-input-label for="nom_stand" value="Nom du stand souhaité" />
                <x-text-input id="nom_stand" class="block mt-1 w-full" type="text" name="nom_stand" :value="old('nom_stand')" required />
                <x-input-error :messages="$errors->get('nom_stand')" class="mt-2" />
            </div>

            <!-- Description du stand -->
            <div class="form-group">
                <x-input-label for="description_stand" value="Description du stand" />
                <textarea id="description_stand" name="description_stand" class="block mt-1 w-full rounded-md" required>{{ old('description_stand') }}</textarea>
                <x-input-error :messages="$errors->get('description_stand')" class="mt-2" />
            </div>

            <!-- Connexion + Bouton -->
            <div class="flex items-center justify-between mt-6">
                <a class="underline text-sm text-purple-600 hover:text-orange-600" href="{{ route('login') }}">
                    Déjà inscrit ?
                </a>

                <x-primary-button class="button-submit ml-4">
                    S’inscrire
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
