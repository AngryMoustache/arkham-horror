<div x-data="{
    open: false,
    init () {
        window.livewire.on('open-modal', (e, a) => this.openModal(a))
        window.livewire.on('close-modal', () => this.closeModal())
    },
    openModal (a) {
        $wire.set('modelId', a.modelId)
        $wire.set('modelClass', a.modelClass)

        this.open = true
    },
    closeModal () {
        this.open = false
    }
}">
    <x-modal x-show="open">
        <x-card class="m-4 md:m-0 md:w-1/2">
            <x-headers.h1 title="Deleting" />
            <p class="px-2 pb-8">
                Are you sure you want to delete that?
            </p>

            <div class="flex flex-row gap-4">
                <x-form.button x-on:click="closeModal()" class="w-full md:w-1/3 py-4" label="Cancel" />
                <x-form.button wire:click="delete" class="w-full md:w-1/3 py-4" label="Yes, delete" />
            </div>
        </x-card>
    </x-modal>
</div>
