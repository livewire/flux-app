<?php

use Livewire\Volt\Component;

new class extends Component {
    #[\Livewire\Attributes\Url(except: '')]
    public $test = 'hey';
}

?>

<flux:modal name="my-modal" class="md:w-96 space-y-6">
    <div>
        <flux:heading size="lg">Modal Heading</flux:heading>
        <flux:subheading>Something else modally.</flux:subheading>
    </div>
</flux:modal>
