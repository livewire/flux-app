<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div>
    <div x-data="{ notActive: true }">
        {{-- Works --}}
        <flux:button ::disabled="notActive">Mon</flux:button>
        <flux:input ::disabled="notActive" type="text" size="sm" placeholder="Open time" />

        {{-- Does not work, still active on select? --}}
        <flux:select ::disabled="notActive">
            <flux:option>Breakfast</flux:option>
            <flux:option>Lunch</flux:option>
            <flux:option>Dinner</flux:option>
        </flux:select>
    </div>
</div>
