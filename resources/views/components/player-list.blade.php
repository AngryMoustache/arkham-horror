<div {{ $attributes->merge(['class' => 'flex flex-col gap-2']) }}>
    @foreach ($players as $player)
        <div class="
            flex gap-2 justify-between p-2
            border-b border-green last:border-0
        ">
            <span class="w-full">{{ $player->name }}</span>

            <span class="w-full hidden sm:block">
                Investigator in {{ $player->campaigns->count() }} campaign(s)
            </span>

            <div class="w-full flex justify-end">
                <x-form.button wire:click="deletePlayer({{ $player->id }})">
                    <i class="fas fa-trash"></i>
                </x-form.button>
            </div>
        </div>
    @endforeach
</div>
