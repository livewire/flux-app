<?php

use Livewire\Volt\Component;
use Livewire\InfiniteScroll;
use Livewire\Attributes\Computed;
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

<div class="contents">
    @foreach ($this->posts as $post)
        <div class="border rounded-lg p-8">
            {{ $post->id }}: {{ $post->content }}
        </div>
    @endforeach
</div>
