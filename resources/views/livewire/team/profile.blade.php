<?php

use Livewire\Attributes\Validate;
use App\Models\Team;

new class extends \Livewire\Volt\Component {
    public Team $team;

    #[Validate('required')]
    public $name = '';

    #[Validate('required|email')]
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

        Flux::toast('Your team profile has been updated.');
    }
}
?>

<form wire:submit="save" class="space-y-6">
    <div>
        <flux:heading>Team profile</flux:heading>
        <flux:subheading>You can update your team profile here</flux:subheading>
    </div>

    <flux:input wire:model="name" label="Team name" />

    <flux:input wire:model="email" label="Billing email" />

    <flux:button type="submit" variant="primary">Save changes</flux:button>
</form>
