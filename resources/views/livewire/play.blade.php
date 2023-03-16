<div class="flex flex-col gap-4">
    <x-folder :tabs="[
        ...$campaign->players->pluck('name'),
        'Notes',
    ]">
        @foreach ($campaign->players as $key => $player)
            <x-folder.tab :tab-key="$key">
                <x-player.card :$player />
            </x-folder.tab>
        @endforeach

        <x-folder.tab :tab-key="$key + 1">
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
    </x-folder>
</div>
