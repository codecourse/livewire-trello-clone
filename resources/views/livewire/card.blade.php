<div
    class="cursor-pointer"
    wire:sortable-group.handle
    wire:click="$dispatch('openModal', { component: 'modals.edit-card', arguments: { card: {{ $card->id }} } })"
>
    <div class="bg-gray-200 rounded-lg px-3 py-1.5 flex items-center justify-between">
        <div>{{ $card->title }}</div>
    </div>
</div>
