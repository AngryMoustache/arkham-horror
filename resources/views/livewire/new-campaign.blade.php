<x-card>
    <x-headers.h1 title="New Campaign" />

    <p>
        Starting a new campaign for the "{{ $set->name }}" set,
        who is playing and who is their investigator?
    </p>

    <div class="my-8 w-1/3">
        @foreach ($players as $player)
            <div class="
                flex gap-4 p-4 items-center justify-between
                border-b border-green last:border-0
            ">
                <span class="w-full text-xl text-title">
                    {{ $player->name }}
                </span>

                <x-form.select
                    label="Pick investigator if playing"
                    wire:model.defer="fields.investigators.{{ $player->id }}"
                    :options="$investigators"
                />
            </div>
        @endforeach
    </div>

    <x-form.button
        label="Begin new campaign"
        wire:click="startCampaign"
        class="text-2xl px-6 py-3"
    />
</x-card>
