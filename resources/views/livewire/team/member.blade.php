<?php

use Livewire\Attributes\Validate;
use App\Models\Member;

new class extends \Livewire\Volt\Component {
    public Member $member;

    #[Validate('string|required')]
    public $name = '';

    #[Validate('string|required|email')]
    public $email = '';

    #[Validate('string|required')]
    public $role = '';

    public function mount()
    {
        $this->name = $this->member->name;
        $this->email = $this->member->email;
        $this->role = $this->member->role;
    }

    public function edit()
    {
        $this->modal('member-edit')->show();
    }

    public function update()
    {
        $this->validate();

        $this->member->update([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
        ]);

        $this->modal('member-edit')->close();
    }

    public function remove()
    {
        $this->modal('member-remove')->show();
    }
}
?>

<flux:row>
    <flux:cell variant="strong">{{ $member->name }}</flux:cell>

    <flux:cell>{{ $member->email }}</flux:cell>

    <flux:cell><flux:badge :color="$member->roleColor()" size="sm" inset="top bottom">{{ $member->roleLabel() }}</flux:badge></flux:cell>

    <flux:cell>
        <flux:dropdown align="end" offset="-15">
            <flux:button icon="ellipsis-horizontal" size="sm" variant="ghost" inset="top bottom" />

            <flux:menu class="min-w-32">
                <flux:menu.item wire:click="edit" icon="pencil-square">Edit</flux:menu.item>
                <flux:menu.item wire:click="remove" icon="trash" variant="danger">Remove</flux:menu.item>
            </flux:menu>
        </flux:dropdown>

        <flux:modal name="member-remove" class="min-w-[22rem]">
            <form class="space-y-6" wire:submit="$parent.remove({{ $member->id }})">
                <div>
                    <flux:heading size="lg">Remove member?</flux:heading>

                    <flux:subheading>
                        <p>You're about to delete this member.</p>
                        <p>This action cannot be reversed.</p>
                    </flux:subheading>
                </div>

                <div class="flex">
                    <flux:spacer />

                    <flux:modal.close>
                        <flux:button variant="ghost">Cancel</flux:button>
                    </flux:modal.close>

                    <flux:button type="submit" variant="danger">Remove member</flux:button>
                </div>
            </form>
        </flux:modal>

        <flux:modal name="member-edit" class="md:w-96" variant="flyout">
            <form wire:submit="update" class="space-y-6">
                <div>
                    <flux:heading size="lg">Edit member</flux:heading>
                    <flux:subheading>Update a member in your team</flux:subheading>
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

                    <flux:button type="submit" variant="primary">Update member</flux:button>
                </div>
            </form>
        </flux:modal>
    </flux:cell>
</flux:row>
