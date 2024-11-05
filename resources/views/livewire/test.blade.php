<?php

use function Livewire\Volt\{computed, state};

state([
    'search' => '',
    'industry' => '',
    'industries' => [
        ['value' => 1, 'label' => 'Photography'],
        ['value' => 2, 'label' => 'Design services'],
        ['value' => 3, 'label' => 'Web development'],
        ['value' => 4, 'label' => 'Accounting'],
        ['value' => 5, 'label' => 'Legal services'],
        ['value' => 6, 'label' => 'Consulting'],
        ['value' => 7, 'label' => 'Other'],
    ],
]);

$options = computed(function () {
    if (! filled($this->search)) {
        return collect();
    }

    return collect($this->industries)
        ->filter(fn ($option) => str_contains($option['label'], $this->search))
        ->values();
});
?>

<div>
    <flux:input label="Text" size="sm" placeholder="Yo"/>
    <flux:textarea label="Textarea" rows="auto" resize="none" size="sm" placeholder="Yo"/>
</div>
