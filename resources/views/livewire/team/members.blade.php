<?php

use Livewire\Attributes\Validate;
use App\Models\Team;

new class extends \Livewire\Volt\Component {
    public Team $team;

    #[Validate('string|required')]
    public $name = '';

    #[Validate('string|required|email')]
    public $email = '';

    #[Validate('string|required')]
    public $role = 'viewer';

    public function remove($id)
    {
        $this->team->members()->findOrFail($id)->delete();

        Flux::modal('member-remove')->close();
    }

    public function save()
    {
        $this->validate();

        $this->team->members()->create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
        ]);

        $this->reset([ 'name', 'email', 'role' ]);

        $this->modal('member-add')->close();
    }
}
?>

<div>
    <div class="flex justify-between items-center">
        <div>
            <flux:heading>Team members</flux:heading>
            <flux:subheading>Manage your team members and their roles</flux:subheading>
        </div>

        <flux:modal.trigger name="member-add">
            <flux:button size="sm" icon="user-plus">Add member</flux:button>
        </flux:modal.trigger>
    </div>

    <flux:table class="mt-8">
        <flux:columns>
            <flux:column>Name</flux:column>
            <flux:column>Email</flux:column>
            <flux:column>Role</flux:column>
            <flux:column></flux:column>
        </flux:columns>

        <flux:rows>
            @foreach ($team->members as $member)
                <livewire:team.member :$member :key="$member->id" />
            @endforeach
        </flux:rows>
    </flux:table>

    <flux:modal name="member-add" class="md:w-96" variant="flyout">
        <form wire:submit="save" class="space-y-6">
            <div>
                <flux:heading size="lg">Add member</flux:heading>
                <flux:subheading>Create a new member for your team</flux:subheading>
            </div>

            <flux:input wire:model="name" label="Name" />

            <flux:input type="email" wire:model="email" label="Email" />

            <flux:radio.group wire:model="role" label="Role">
                <flux:radio value="admin" label="Admin" description="Administrator users can perform any action." checked />
                <flux:radio value="editor" label="Editor" description="Editors have the ability to read, create, and update." />
                <flux:radio value="viewer" label="Viewer" description="Viewer users can only read." />
            </flux:radio.group>

            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary">Save changes</flux:button>
            </div>
        </form>
    </flux:modal>
</div>
