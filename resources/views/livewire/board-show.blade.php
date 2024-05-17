<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $board->title }}
        </h2>
    </x-slot>

    <div class="w-full p-6 overflow-x-scroll">
        <div
            class="flex w-max space-x-6 h-[calc(theme('height.screen')-64px-73px-theme('padding.12'))]"
            wire:sortable="sorted"
            wire:sortable-group="moved"
        >
            @foreach ($columns as $column)
                <div wire:key="{{ $column->id }}" wire:sortable.item="{{ $column->id }}">
                    <livewire:column :key="$column->id" :column="$column" />
                </div>
            @endforeach

            <div
                x-data="{ adding: false }"
                x-on:column-created.window="adding = false"
            >
                <template x-if="adding">
                    <form wire:submit="createColumn" class="bg-white shadow-sm px-4 py-3 rounded-lg w-[260px]">
                        <div>
                            <x-input-label for="title" value="Title" class="sr-only" />
                            <x-text-input id="title" placeholder="Column title" class="w-full" wire:model="createColumnForm.title" x-init="$el.focus()" />
                            <x-input-error :messages="$errors->get('createColumnForm.title')" class="mt-1" />
                        </div>

                        <div class="flex items-center space-x-2 mt-2">
                            <x-primary-button>
                                Create
                            </x-primary-button>
                            <button x-on:click="adding = false" type="button" class="text-sm text-gray-500"">Cancel</button>
                        </div>
                    </form>
                </template>

                <button x-show="!adding" x-on:click="adding = true" class="bg-gray-200 shadow-sm px-4 py-3 flex items-center space-x-1 rounded-lg w-[260px]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <span>Add a column</span>
                </button>
            </div>
        </div>
    </div>
</div>
