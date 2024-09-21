<?php

use Livewire\Attributes\Url;
use App\Models\Team;

new class extends \Livewire\Volt\Component {
    public Team $team;

    #[Url]
    public $tab = 'profile';

    public function mount()
    {
        $this->team = Team::first();
    }
}
?>

<div>
    <div>
        <flux:heading size="xl">Team settings</flux:heading>
        <flux:subheading>Manage your team profile and members</flux:subheading>
    </div>

    <flux:tab.group variant="flush" class="mt-8 max-w-lg">
        <flux:tabs wire:model="tab">
            <flux:tab name="profile">Profile</flux:tab>
            <flux:tab name="members">Members</flux:tab>
            <flux:tab name="notifications">Notifications</flux:tab>
        </flux:tabs>

        <flux:tab.panel name="profile">
            <livewire:team.profile :$team />
        </flux:tab.panel>

        <flux:tab.panel name="members">
            <livewire:team.members :$team />
        </flux:tab.panel>

        <flux:tab.panel name="notifications">
            <livewire:team.notifications :$team />
        </flux:tab.panel>
    </flux:tab.group>
</div>
