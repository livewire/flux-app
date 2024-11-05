<?php

use function Livewire\Volt\{computed, state};

;
?>

<div>
    <flux:input label="Text" size="sm" placeholder="Yo"/>
    <flux:textarea label="Textarea" rows="auto" resize="none" size="sm" placeholder="Yo"/>
</div>

@script
<script>
    // will return the value between 0 to 6 while 0 is Sunday and 6 is Saturday
    let startOfMonth = new Date(year, month).getDay()

    let date = new Date();
    let day = date.getDate();
    let month = date.getMonth();
    let year = date.getFullYear();
</script>
@endscript
