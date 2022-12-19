<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight margin">
      {{ __('Profile') }}
    </h2>
  </x-slot>

  <div>
    {{--update profile information form--}}
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      @if (Laravel\Fortify\Features::canUpdateProfileInformation())
      @livewire('profile.update-profile-information-form')
      <x-jet-section-border />
      @endif

      {{--update pass--}}
      @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
      <div class="mt-10 sm:mt-0">
        @livewire('profile.update-password-form')
      </div>
      <x-jet-section-border />
      @endif

      {{--delete account--}}
      @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
      <div class="mt-10 sm:mt-0">
        @livewire('profile.delete-user-form')
      </div>
      @endif
    </div>
  </div>
</x-app-layout>