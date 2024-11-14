<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Edit Note') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-2xl space-y-4 sm:px-6 lg:px-8">
      <livewire:notes.edit-note :note-id="$noteId">
    </div>
  </div>
</x-app-layout>
