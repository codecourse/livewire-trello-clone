<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $board->title }}
        </h2>
    </x-slot>

    <div class="w-full p-6 overflow-x-scroll">
        <div class="flex w-max space-x-6 bg-green-500 h-[calc(theme('height.screen')-64px-73px-theme('padding.12'))]">
            @foreach (range(1, 10) as $column)
                <div class="bg-blue-500 w-[260px]">
                    Column
                </div>
            @endforeach
        </div>
    </div>
</div>
