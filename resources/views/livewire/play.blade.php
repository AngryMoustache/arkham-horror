<div class="flex flex-col gap-4">

    <x-folder :tabs="[
        'Campaign',
        ...$campaign->players->pluck('name'),
    ]">
        <x-folder.tab tab-key="0">
            <x-headers.h1 title="Campaign notes" />

            <div class="mb-6 flex flex-col gap-2">
                <p>Campaign: {{ $campaign->set->name }}</p>
                <p>Difficulty: {{ $campaign->difficulty->label() }}</p>
                <p>Status:</p>
            </div>

            <x-form.textarea
                wire:model.lazy="notes"
                style="min-height: 30rem"
            />
        </x-folder.tab>

        @foreach ($campaign->players as $key => $player)
            <x-folder.tab :tab-key="$key + 1">
                <x-player.card :$player />
            </x-folder.tab>
        @endforeach
    </x-folder>
</div>
