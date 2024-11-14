<?php

use Livewire\Volt\Component;

new class extends Component {
    public $noteTitle;
    public $noteBody;
    public $noteRecipient;
    public $noteSendDate;

    public function submit()
    {
        $validated = $this->validate([
            'noteTitle' => ['required', 'string', 'min:5'],
            'noteBody' => ['required', 'string', 'min:20'],
            'noteRecipient' => ['required', 'email'],
            'noteSendDate' => ['required', 'date'],
        ]);

        auth()
            ->user()
            ->notes()
            ->create([
                'title' => $this->noteTitle,
                'body' => $this->noteBody,
                'recipient' => $this->noteRecipient,
                'send_date' => $this->noteSendDate,
                'is_published' => true,
            ]);

        redirect(route('notes.index'));
    }
}; ?>

<div>
  <form wire:submit="submit" class="space-y-4">
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
    <div class="pt-4">
      <x-wireui-button
        primary
        spinner
        type="submit"
        right-icon="calendar"
      >Schedule Note</x-wireui-button>
    </div>
    <x-wireui-errors />
  </form>
</div>
