<div class="flex flex-col gap-4">
    <x-card class="w-full">
        <x-headers.h1 :title="$campaign->set->name" />

        <div class="grid grid-cols-2 gap-6">
            @foreach ($campaign->players as $player)
                <x-player.card :$player />
            @endforeach
        </div>
    </x-card>

    <x-card class="w-full">
        <x-headers.h1 title="Campaign notes" />

        <x-form.textarea
            wire:model.lazy="notes"
            style="min-height: 30rem"
        />
    </x-card>
</div>
