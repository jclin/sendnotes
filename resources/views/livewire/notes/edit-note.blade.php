<?php

use App\Models\Note;
use Livewire\Volt\Component;

new class extends Component {
    public Note $note;

    public $noteTitle;
    public $noteBody;
    public $noteRecipient;
    public $noteSendDate;
    public $noteIsPublished;

    public function mount($noteId)
    {
        $note = Note::findOrFail($noteId);
        $this->note = $note;
        $this->authorize('update', $note);

        $this->noteTitle = $note->title;
        $this->noteBody = $note->body;
        $this->noteRecipient = $note->recipient;
        $this->noteSendDate = $note->send_date;
        $this->noteIsPublished = $note->is_published;
    }

    public function save()
    {
        $validated = $this->validate([
            'noteTitle' => ['required', 'string', 'min:5'],
            'noteBody' => ['required', 'string', 'min:20'],
            'noteRecipient' => ['required', 'email'],
            'noteSendDate' => ['required', 'date'],
        ]);

        $this->note->update([
            'title' => $this->noteTitle,
            'body' => $this->noteBody,
            'recipient' => $this->noteRecipient,
            'send_date' => $this->noteSendDate,
            'is_published' => $this->noteIsPublished,
        ]);

        $this->dispatch('note-saved');
    }
}; ?>

<div class="py-12">
  <div class="mx-auto max-w-2xl space-y-4 sm:px-6 lg:px-8">
    <form wire:submit="save" class="space-y-4">
      <x-wireui-input
        wire:model="noteTitle"
        label="Note Title"
        placeholder="It's been a great day."
      />
      <x-wireui-textarea
        wire:model="noteBody"
        label="Your Note"
        placeholder="Share all your thoughts with your friend."
      />
      <x-wireui-input
        wire:model="noteRecipient"
        label="Recipient"
        type="email"
        placeholder="yourfriend@email.com"
        icon="user"
      />
      <x-wireui-datetime-picker
        wire:model="noteSendDate"
        label="Send Date"
        placeholder="MM/DD/YYYY"
        without-time
        without-timezone
      />
      <x-wireui-checkbox label="Note Published" wire:model="noteIsPublished" />
      <div class="flex justify-between pt-4">
        <x-wireui-button
          primary
          spinner
          type="submit"
          spinner="save"
        >Save Note</x-wireui-button>
        <x-wireui-button
          href="{{ route('notes.index') }}"
          flat
          gray
          hover="negative"
        >Back to Notes</x-wireui-button>
      </div>
      <x-action-message on="note-saved" />
      <x-wireui-errors />
    </form>
  </div>
</div>
