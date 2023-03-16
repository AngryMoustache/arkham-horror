<x-card class="w-2/3">
    <x-headers.h1 title="Players" />

    <form wire:submit.prevent="newPlayer" class="flex gap-4">
        <x-form.input
            wire:model.defer="newPlayerName"
            class="w-1/3"
            label="Name"
        />

        <x-form.button
            wire:click.prevent="newPlayer"
            label="Create new player"
        />
    </form>

    <x-player-list class="mt-4" :$players />
</x-card>
