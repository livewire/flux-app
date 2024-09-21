<?php

use Livewire\Attributes\Renderless;
use App\Models\Team;

new class extends \Livewire\Volt\Component {
    public Team $team;

    public $communication = false;
    public $marketing = false;
    public $social = false;
    public $security = false;

    public function mount()
    {
        $this->communication = $this->team->communication;
        $this->marketing = $this->team->marketing;
        $this->social = $this->team->social;
        $this->security = $this->team->security;
    }

    #[Renderless]
    public function updated()
    {
        $this->team->update([
            'communication' => $this->communication,
            'marketing' => $this->marketing,
            'social' => $this->social,
            'security' => $this->security,
        ]);
    }
}
?>

<div>
    <flux:heading>Team notifications</flux:heading>
    <flux:subheading>Manage which notification features are enabled for your team</flux:subheading>

    <flux:card class="space-y-4 mt-8">
        <flux:switch wire:model.live="communication" label="Communication emails" description="Receive emails about new messages, comments, and more." />

        <flux:separator variant="subtle" />

        <flux:switch wire:model.live="marketing" label="Marketing emails" description="Receive emails about your account activity and security." />

        <flux:separator variant="subtle" />

        <flux:switch wire:model.live="social" label="Social emails" description="Receive emails about your account activity and security." />

        <flux:separator variant="subtle" />

        <flux:switch wire:model.live="security" label="Security emails" description="Receive emails about your account activity and security." />
    </flux:card>
</div>
