<x-card>
    <x-headers.h1 title="New Campaign" />

    <x-form.grid class="md:w-1/2 pt-6 pb-8">
        <x-form.grid.row label="Campaign">
            <x-form.select
                wire:model.defer="fields.set_id"
                :options="json_decode($sets)"
            />
        </x-form.grid.row>

        <x-form.grid.row label="Difficulty">
            <x-form.select
                wire:model.defer="fields.difficulty"
                :options="[
                    'easy' => 'Easy',
                    'standard' => 'Standard',
                    'hard' => 'Hard',
                    'expert' => 'Expert',
                ]"
            />
        </x-form.grid.row>

        <x-form.grid.row label="Players">
            <div class="flex flex-col gap-4">
                @foreach ($players as $player)
                    <div class="flex gap-2">
                        <span class="w-1/3 text-xl text-title">
                            {{ $player->name }}
                        </span>

                        <x-form.select
                            label="- not playing -"
                            wire:model.defer="fields.investigators.{{ $player->id }}"
                            :options="$investigators->pluck('name', 'id')->sort()"
                        />
                    </div>
                @endforeach
            </div>
        </x-form.grid.row>
    </x-form.grid>

    <x-form.button
        label="Begin new campaign"
        wire:click="startCampaign"
        class="text-xl px-6 py-3"
    />
</x-card>
