<?php

use App\Models\Team;

new class extends \Livewire\Volt\Component {
    public Team $team;

    #[\Livewire\Attributes\Validate('string|required')]
    public $name = '';

    #[\Livewire\Attributes\Validate('string|required|email')]
    public $email = '';

    #[\Livewire\Attributes\Validate('string|required')]
    public $role = 'viewer';

    public function remove($id)
    {
        $this->team->members()->findOrFail($id)->delete();
    }

    #[\Livewire\Attributes\Renderless]
    public function add()
    {
        //
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
    }
}
?>

<div>
    {{-- Heading: Team members --}}
    {{-- Subheading: Manage your team members and their roles --}}
    {{-- Button: Add member --}}

    {{-- Table --}}

    {{-- Column: Name --}}
    {{-- Column: Email --}}
    {{-- Column: Role --}}
    {{-- Column: (Actions) --}}

    {{-- Rows:
        @foreach ($team->members as $member)
            <livewire:team.member :$member :key="$member->id" />
        @endforeach
    --}}

    {{-- Modal: "member-add" --}}
    {{-- Heading: Add member --}}
    {{-- Subheading: Create a new member for your team --}}
    {{-- Input: Name --}}
    {{-- Input: Email --}}
    {{-- Radio: Role --}}
    {{-- Button: Add member --}}
</div>
