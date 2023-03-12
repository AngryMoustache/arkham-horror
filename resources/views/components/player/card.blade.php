<div class="flex gap-4 w-full">
    <div class="w-1/3">
        <div
            class="w-full bg-no-repeat bg-left bg-cover rounded-xl"
            style="aspect-ratio: 1/1.35; background-image: url('{{ $player->pivot->investigator->attachment->path() }}')"
        ></div>
    </div>

    <div class="w-2/3 flex flex-col gap-4">
        <x-headers.h1
            class="text-2xl"
            :title="$player->name . ' as ' . $player->pivot->investigator->name"
            mb="0"
        />

        <div class="grid grid-cols-3 gap-8">
            <div class="flex flex-col gap-2 items-center">
                <x-headers.h3 title="Physical Trauma" />
                <x-player.counter :$player type="physical_trauma" />
            </div>

            <div class="flex flex-col gap-2 items-center">
                <x-headers.h3 title="Mental Trauma" />
                <x-player.counter :$player type="mental_trauma" />
            </div>

            <div class="flex flex-col gap-2 items-center">
                <x-headers.h3 title="Experience" />
                <x-player.counter :$player type="experience" />
            </div>
        </div>

        <div>
            <x-headers.h3 class="mb-1" title="Earned story assets/weaknesses" />

            <x-form.textarea
                wire:model.lazy="player_information.{{ $player->id }}"
                style="min-height: 15rem"
            />
        </div>
    </div>
</div>
