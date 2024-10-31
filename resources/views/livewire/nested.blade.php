<?php

use Livewire\Volt\Component;

new class extends Component {
    public $profiles = [
        [
            "id" => 1,
            "name" => "profile1",
        ],
        [
            "id" => 2,
            "name" => "profile2",
        ],
    ];

    public $subscriber_profile_id = 1;
};
?>

<div>
    <flux:select label="Profile" variant="listbox" wire:model="subscriber_profile_id">
        @foreach ($profiles as $profile)
            <flux:option wire:key="{{ $profile['id'] }}" value="{{ $profile['id'] }}">
                {{ $profile['name'] }}
            </flux:option>
        @endforeach
    </flux:select>
</div>
