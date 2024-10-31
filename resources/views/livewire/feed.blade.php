<?php

use Livewire\Volt\Component;

new class extends Component
{
   //
};
?>

<div class="grid gap-4">
    <livewire:posts infinite />

    {{-- <livewire:portable-infinite-scroll component="posts" /> --}}
    {{-- <livewire:posts /> --}}
</div>
