<x-modal-wrapper title="Edit card">
    <form wire:submit="updateCard" class="space-y-3">
        <div>
            <x-input-label for="title" value="Title" class="sr-only" />
            <x-text-input class="w-full" id="title" autofocus wire:model="editCardForm.title" />
            <x-input-error :messages="$errors->get('editCardForm.title')" class="mt-1" />
        </div>
        <div>
            <x-input-label for="notes" value="Notes" class="sr-only" />
            <x-textarea class="w-full" id="notes" wire:model="editCardForm.notes" rows="6" />
            <x-input-error :messages="$errors->get('editCardForm.notes')" class="mt-1" />
        </div>
        <div class="flex items-center justify-between">
            <x-primary-button>
                Save
            </x-primary-button>

            <x-secondary-button wire:click="archiveCard">
                Archive
            </x-secondary-button>
        </div>
    </form>
</x-modal-wrapper>
