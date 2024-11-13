<?php

use App\Models\Note;
use Livewire\Volt\Component;

new class extends Component {
    public function delete($noteId)
    {
        $note = Note::where('id', $noteId)->first();
        $this->authorize('delete', $note);
        $note->delete();
    }

    public function with(): array
    {
        return [
            'notes' => Auth::user()->notes()->orderBy('send_Date', 'asc')->get(),
        ];
    }
}; ?>

<div>
  <div class="space-y-2">
    @if ($notes->isEmpty())
      <div class="text-center">
        <p class="text-xl font-bold">No notes yet</p>
        <p class="text-sm">Let's create your first note to send.</p>
        <x-wireui-button
          right-icon="plus"
          primary
          class="mt-6"
          href="{{ route('notes.create') }}"
          wire:navigate
        >Create
          note</x-wireui-button>
      </div>
    @else
      <x-wireui-button
        right-icon="plus"
        primary
        class="mb-12"
        href="{{ route('notes.create') }}"
        wire:navigate
      >Create
        note</x-wireui-button>

      <div class="mt-12 grid grid-cols-2 gap-4">
        @foreach ($notes as $note)
          <x-wireui-card wire:key='{{ $note->id }}'>
            <div class="flex justify-between">
              <a href="#" class="text-xl font-bold hover:text-blue-500 hover:underline">
                {{ $note->title }}
              </a>
              <div class="text-xs text-gray-500">{{ $note->send_date->format('d/m/Y') }}</div>
            </div>
            <div class="mt-4 flex items-end justify-between space-x-1">
              <p class="text-xs">Recipient: <span class="font-semibold">{{ $note->recipient }}</span></p>
              <div>
                <x-wireui-mini-button
                  size="xs"
                  rounded
                  outline
                  flat
                  secondary
                  icon="eye"
                />
                <x-wireui-mini-button
                  size="xs"
                  rounded
                  outline
                  flat
                  secondary
                  icon="trash"
                  wire:click="delete('{{ $note->id }}')"
                />
              </div>
            </div>
          </x-wireui-card>
        @endforeach
      </div>
    @endif
  </div>
</div>
