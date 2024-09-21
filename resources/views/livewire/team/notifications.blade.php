<?php

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

    #[\Livewire\Attributes\Renderless]
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
    {{-- Heading: Team notifications --}}
    {{-- Subheading: Manage which notification features are enabled for your team --}}

    {{-- Switch: Communication emails --}}
    {{-- Switch: Marketing emails --}}
    {{-- Switch: Social emails --}}
    {{-- Switch: Security emails --}}
</div>
