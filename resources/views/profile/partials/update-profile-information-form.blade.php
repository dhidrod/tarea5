<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Informacion del perfil') }} 
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Actualizar informacion del perfil y direccion de correo electronico.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="surname" :value="__('Apellido')" />
            <x-text-input id="surname" name="surname" type="text" class="mt-1 block w-full" :value="old('surname', $user->surname)" required autofocus autocomplete="surname" />
            <x-input-error class="mt-2" :messages="$errors->get('surname')" />
        </div>

        <div>
            <x-input-label for="nick" :value="__('Nick')" />
            <x-text-input id="nick" name="nick" type="text" class="mt-1 block w-full" :value="old('nick', $user->nick)" required autofocus autocomplete="nickname" />
            <x-input-error class="mt-2" :messages="$errors->get('nick')" />
        </div>

        <div>
            <x-input-label for="image" :value="__('Imagen de perfil')" />
            <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" :value="old('image', $user->image)" />
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>

        @if (auth()->user()->hasRole('admin'))
            <div>
                <x-input-label for="reputation" :value="__('Reputation')" />
                <x-text-input id="reputation" name="reputation" type="number" class="mt-1 block w-full" :value="old('reputation', $user->reputation)" required autofocus autocomplete="reputation" />
                <x-input-error class="mt-2" :messages="$errors->get('reputation')" />
            </div>
        @endif
        
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />


        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Guardar') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-500"
                >{{ __('Guardado.') }}</p>
            @endif
        </div>
    </form>
</section>
