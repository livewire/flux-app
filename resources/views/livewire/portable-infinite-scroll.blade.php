<?php

use Livewire\Attributes\Locked;
use Livewire\Attributes\Url;
use Livewire\Volt\Component;
use Livewire\InfiniteScroll;
use Livewire\Wireable;

new class extends Component
{
    #[Locked]
    public string $component;

    #[Url]
    public int $page = 1;
    public int $pageStart;
    public int $pageEnd;
    public bool $outOfResults = false;

    public function mount()
    {
        $this->pageStart = $this->page;
        $this->pageEnd = $this->page;
    }

    public function loadEarlier()
    {
        $this->pageStart = max(1, $this->pageStart - 1);
    }

    public function loadMore()
    {
        $this->pageEnd++;
    }

    protected function placeholder()
    {
        $instance = app('livewire')->new($this->component);

        if (method_exists($instance, 'placeholder')) {
            return $instance->placeholder();
        } else {
            return '<div>Loading...</div>';
        }
    }

    protected function getPagesLoop()
    {
        return range($this->pageStart, $this->pageEnd);
    }

    protected $lastProvider;

    protected function generateInfiniteScrollProvider($page)
    {
        return $this->lastProvider = new class ($page) implements Wireable {
            public function __construct(
                protected $page,
                protected $count = null,
            ) {}

            public function batch($callback)
            {
                $batch = $callback($this->page);

                $this->count = count($batch);

                return $batch;
            }

            public function getPage()
            {
                return $this->page;
            }

            public function getCount()
            {
                return $this->count;
            }

            public function toLivewire()
            {
                return ['page' => $this->page, 'count' => $this->count];
            }

            public static function fromLivewire($value)
            {
                return new static($value['page'], $value['count']);
            }
        };
    }

    public function likelyMoreResults()
    {
        if ($this->outOfResults) return false;

        if ($this->lastProvider && $this->lastProvider->getCount() === 0) {
            $this->outOfResults = true;
        }

        return ! $this->outOfResults;
    }
};
?>

<div x-data="infiniteScroll">
    @if ($this->pageStart > 1)
        <div x-intersect.once="loadEarlier" wire:key="{{ $this->pageStart }}"></div>
    @endif

    @foreach ($this->getPagesLoop() as $i)
        <div x-intersect="viewing({{ $i }})" wire:key="{{ $i }}">
            <livewire:dynamic-component :is="$component" :infinite="$this->generateInfiniteScrollProvider($i)" :key="$i" />
        </div>
    @endforeach

    @if ($this->likelyMoreResults())
        <div x-intersect.once="loadMore" wire:key="{{ $this->pageEnd }}">
            {!! $this->placeholder() !!}
        </div>
    @endif
</div>

@script
<script>
Alpine.data('infiniteScroll', () => ({
    async loadEarlier() {
        this.preserveScrollPosition(async () => {
            await $wire.loadEarlier()
        })
    },

    viewing(page) {
        $wire.page = page
    },

    loadMore() {
        $wire.loadMore()
    },

    async preserveScrollPosition(callback) {
        let scrollParent = this.getScrollParent(this.$el)
        let scrollHeightBefore = scrollParent.scrollHeight
        let scrollTopBefore = scrollParent.scrollTop

        await callback()

        let scrollHeightDiff = scrollParent.scrollHeight - scrollHeightBefore

        scrollParent.scrollTop = scrollTopBefore + scrollHeightDiff
    },

    // This snippet is from jQuery UI. Found on StackOverflow...
    // https://stackoverflow.com/questions/35939886/find-first-scrollable-parent
    getScrollParent(element) {
        var style = window.getComputedStyle(element);
        var excludeStaticParent = style.position === "absolute";
        var overflowRegex = /(auto|scroll)/;

        if (style.position === "fixed") return document.body;
        for (var parent = element; (parent = parent.parentElement);) {
            if (! parent) return document.documentElement;
            style = window.getComputedStyle(parent);
            if (excludeStaticParent && style.position === "static") {
                continue;
            }
            if (overflowRegex.test(style.overflow + style.overflowY + style.overflowX)) return parent;
        }

        return document.documentElement;
    }
}))
</script>
@endscript
