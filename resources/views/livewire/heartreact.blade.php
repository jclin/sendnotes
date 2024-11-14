<?php

use App\Models\Note;
use Livewire\Volt\Component;

new class extends Component {
    public Note $note;
    public $heartCount;

    public function mount(Note $note)
    {
        $this->note = $note;
        $this->heartCount = $note->heart_count;
    }

    public function incrementHeartCount()
    {
        $this->note->heart_count++;
        $this->note->save();

        $this->heartCount = $this->note->heart_count;
    }
}; ?>

<div>
  <x-wireui-button
    sm
    rose
    icon="heart"
    wire:click="incrementHeartCount"
    spinner
  >{{ $heartCount }}</x-wireui-button>
</div>
