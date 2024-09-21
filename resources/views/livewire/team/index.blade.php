<?php

use App\Models\Team;

new class extends \Livewire\Volt\Component {
    public $team;

    public function mount()
    {
        $this->team = Team::first();
    }
}
?>

<div>
    {{-- Heading: Team settings --}}
    {{-- Subheading: Manage your team profile and members --}}

    {{-- Tabs: Profile, Members, Notifications --}}
    {{-- <livewire:team.profile :$team /> --}}
    {{-- <livewire:team.members :$team /> --}}
    {{-- <livewire:team.notifications :$team /> --}}
</div>
