<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $board->title }}
        </h2>
    </x-slot>

    <div class="w-full p-6 overflow-x-scroll">
        <div class="flex w-max space-x-6 h-[calc(theme('height.screen')-64px-73px-theme('padding.12'))]">
            @foreach ($columns as $column)
                <livewire:column wire:key="$column->id" :column="$column" />
            @endforeach
        </div>
    </div>
</div>
