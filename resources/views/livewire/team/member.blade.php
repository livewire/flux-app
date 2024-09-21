<?php

use App\Models\Team;
use App\Models\Member;

new class extends \Livewire\Volt\Component {
    public Member $member;

    #[\Livewire\Attributes\Validate('string|required')]
    public $name = '';

    #[\Livewire\Attributes\Validate('string|required|email')]
    public $email = '';

    #[\Livewire\Attributes\Validate('string|required')]
    public $role = '';

    public function mount()
    {
        $this->name = $this->member->name;
        $this->email = $this->member->email;
        $this->role = $this->member->role;
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        $this->validate();

        $this->member->update([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
        ]);
    }

    public function remove()
    {
        //
    }
}
?>

<flux:row>
    <flux:cell>{{ $member->name }}</flux:cell>

    <flux:cell>{{ $member->email }}</flux:cell>

    <flux:cell>{{ $member->roleLabel() }}</flux:cell>

    <flux:cell>
        {{-- Dropdown: Edit, Remove --}}

        {{-- Modal: "member-edit" --}}
        {{-- Heading: Edit member --}}
        {{-- Subheading: Update the member's name and email --}}
        {{-- Input: Name --}}
        {{-- Input: Email --}}
        {{-- Radio: Role --}}
        {{-- Button: Save changes --}}

        {{-- Modal: "member-remove" --}}
        {{-- Heading: Remove member? --}}
        {{-- Subheading: You're about to remove this member from your team. --}}
        {{-- Subheading: This action cannot be reversed. --}}
        {{-- Button: Cancel --}}
        {{-- Button: Delete project --}}
    </flux:cell>
</flux:row>
