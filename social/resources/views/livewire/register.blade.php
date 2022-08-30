<?php
    $currentStep = '1';
?>

<div>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Step 1 -->
        <div class="{{ $currentStep != 1 ? 'hidden' : '' }}" id="step-1">
            <div>
                <x-jet-input id="first_name" class="block mt-1 w-full" type="text" nwire:model="first_name" :value="old('first_name')" 
                            placeholder="Имя" required />
            </div>

            <div class="mt-4">
                <x-jet-input id="last_name" class="block mt-1 w-full" type="text" nwire:model="last_name" :value="old('last_name')" 
                            placeholder="Фамилия" required />
            </div>

            <select nwire:model="gender" class="mt-4 border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <option value="">Пол</option>
            <option value="m" {{ old('gender') === 'm' ? 'selected' : '' }}>Мужчина</option>
            <option value="f" {{ old('gender') === 'f' ? 'selected' : '' }}>Женщина</option>
            </select>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4" wire:click="firstStepSubmit">Далее</x-jet-button>
            </div>
        </div><!-- ./ Step 1 -->


        
        <!--
        <div class="mt-4">
            <x-jet-input id="username" class="block mt-1 w-full" type="text" wire:model="username" :value="old('username')" 
                        placeholder="Логин" required autofocus autocomplete="username" />
        </div>

        <div class="mt-4">
            <x-jet-input id="email" class="block mt-1 w-full" type="email" wire:model="email" :value="old('email')" 
                        placeholder="Email" required />
        </div>

        <div class="mt-4">
            <x-jet-input id="password" class="block mt-1 w-full" type="password" wire:model="password" required autocomplete="new-password" 
                        placeholder="Пароль" />
        </div>

        <div class="mt-4">
            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" wire:model="password_confirmation" 
                        placeholder="Подтвердить пароль" required autocomplete="new-password" />
        </div>

        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-jet-label for="terms">
                    <div class="flex items-center">
                        <x-jet-checkbox wire:model="terms" id="terms"/>

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-jet-label>
            </div>
        @endif

        
    </form>
    -->
</div>
