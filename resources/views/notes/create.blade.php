<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Create a Note') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-2xl space-y-4 sm:px-6 lg:px-8">
      <x-wireui-button
        icon="arrow-left"
        class="mb-12"
        href="{{ route('notes.index') }}"
        flat
        gray
        hover="negative"
      >All Notes</x-wireui-button>
      <livewire:notes.create-note>
    </div>
  </div>
</x-app-layout>