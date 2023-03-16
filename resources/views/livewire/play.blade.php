<div class="flex flex-col gap-4">

    <x-folder :tabs="['Campaign', ...$campaign->players->pluck('name')]">
        <x-folder.tab tab-key="0">
            <x-headers.h1 title="Campaign notes" />

            <div class="mb-6 flex flex-col gap-2">
                <p>Campaign: {{ $campaign->set->name }}</p>
                <p>Difficulty: {{ $campaign->difficulty->label() }}</p>
            </div>

            <x-form.textarea
                wire:model.lazy="notes"
                style="min-height: 30rem"
            />
        </x-folder.tab>

        @foreach ($campaign->players as $key => $player)
            <x-folder.tab :tab-key="$key + 1">
                <div class="w-full md:w-2/3 mb-8">
                    <x-player.card :$player />
                </div>

                <div class="w-full md:w-2/3">
                    <x-headers.h1 title="Deck list" />

                    <livewire:deck-list
                        :player="$player"
                        :campaign="$campaign"
                    />
                </div>
            </x-folder.tab>
        @endforeach
    </x-folder>
</div>
