<?php

use App\Models\Team;

new class extends \Livewire\Volt\Component {
    public Team $team;

    #[\Livewire\Attributes\Validate('required')]
    public $name = '';

    #[\Livewire\Attributes\Validate('required|email')]
    public $email = '';

    public function mount()
    {
        $this->name = $this->team->name;
        $this->email = $this->team->email;
    }

    public function save()
    {
        $this->team->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $this->team->save();
    }
}
?>

<form wire:submit="save">
    {{-- Heading: Team profile --}}
    {{-- Subheading: You can update your team profile here --}}

    {{-- Input: Team name --}}
    {{-- Input: Billing email --}}

    {{-- Submit button: Save changes --}}
</form>
