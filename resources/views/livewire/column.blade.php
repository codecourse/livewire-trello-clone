<div class="w-[260px] bg-white self-start shrink-0 rounded-lg shadow-sm max-h-full flex flex-col">
    <div class="flex items-center justify-between">
        <div
            x-data="{ editing: false }"
            x-on:click.outside="editing = false"
            class="h-8 w-full flex items-center px-4 pr-0 min-w-0"
        >
            <button
                class="text-left w-full font-medium"
                x-on:click="editing = true"
                x-show="!editing"
            >
                Column title
            </button>

            <template x-if="editing">
                <form class="-ml-[calc(theme('margin[1.5]')+1px)] grow">
                    <x-text-input value="Column title" class="h-8 px-1.5 w-full" />
                </form>
            </template>
        </div>
        <div class="px-3.5 py-3">
            <x-dropdown>
                <x-slot name="trigger">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </x-slot>
                <x-slot name="content">
                    dropdown content
                </x-slot>
            </x-dropdown>
        </div>
    </div>
    <div class="p-3 space-y-1.5 pt-0 overflow-y-scroll">
        @foreach (range(1, random_int(1, 30)) as $card)
            <livewire:card />
        @endforeach
    </div>
    <div class="p-3">create card</div>
</div>
