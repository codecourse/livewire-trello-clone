<x-modal-wrapper title="Create board">
    <form wire:submit="createBoard" class="space-y-3">
        <div>
            <x-input-label for="title" value="Title" class="sr-only" />
            <x-text-input class="w-full" id="title" autofocus wire:model="createBoardForm.title" />
            <x-input-error :messages="$errors->get('createBoardForm.title')" class="mt-1" />
        </div>
        <div class="flex items-center justify-between">
            <x-primary-button>
                Create
            </x-primary-button>
        </div>
    </form>
</x-modal-wrapper>
