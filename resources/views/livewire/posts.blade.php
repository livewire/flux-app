<?php

use Livewire\Attributes\Computed;
use Livewire\Volt\Component;
use Livewire\InfiniteScroll;
use App\Models\Post;

new class extends Component
{
    public InfiniteScroll $infinite;

    #[Computed]
    public function posts()
    {
        return $this->infinite->batch(function ($page) {
            return Post::paginate(10, page: $page);
        });
    }

    public static function placeholder()
    {
        return '<div>Loading more posts...</div>';
    }
};
?>

<div class="contents" wire:append>
    @foreach ($this->posts as $post)
        <div wire:key="">{{ $post->content }}</div>
    @endforeach
</div>
