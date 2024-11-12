<?php

use Livewire\Volt\Component;

new class extends Component {
    public function with(): array
    {
        return [
            'notes' => Auth::user()->notes()->orderBy('send_Date', 'asc')->get(),
        ];
    }
}; ?>

<div>
  <div class="space-y-2">
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
                />
              </div>
            </div>
          </x-wireui-card>
        @endforeach
      </div>
  </div>
</div>
