<div class="flex flex-col gap-4">
    @foreach ($sets->pluck('campaigns')->flatten() as $campaign)
        <x-card class="
            w-3/4 flex flex-col gap-4 justify-between p-2
            border-b border-green last:border-0
        ">
            <div class="
                w-full flex flex-col justify-between gap-4
                md:items-center md:flex-row
                border-b border-green pb-4
            ">
                <x-headers.h2 class="text-lg md:text-2xl" :title="$campaign->overviewName" />

                <div class="flex gap-4 items-center md:justify-end">
                    <x-form.button href="{{ $campaign->route() }}" label="Continue" />
                    <x-form.button wire:click="deleteCampaign({{ $campaign->id }})" class="px-2">
                        <x-heroicon-s-trash class="w-4 h-6" />
                    </x-form.button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-5 gap-4">
                @foreach ($campaign->players as $player)
                    <div class="
                        relative aspect-video
                        w-full flex flex-col gap-2 overflow-hidden
                        border border-green rounded-xl bg-green
                    ">
                        <div
                            class="absolute inset-0 w-full bg-no-repeat bg-left z-0"
                            style="
                                background-image: url('{{ $player->pivot->investigator->attachment->path() }}');
                                background-size: 185%;
                            "
                        ></div>

                        <div
                            class="absolute inset-0 flex flex-col justify-center items-center z-10"
                            @if ($player->pivot->killed)
                                style="background: rgba(100, 0, 0, .8)"
                            @else
                                style="background: rgba(0, 0, 0, .8)"
                            @endif
                        >
                            <x-headers.h3 class="text-white">
                                {{ $player->name }}
                            </x-headers.h3>

                            <p class="text-white opacity-50">
                                {{ $player->pivot->investigator->name }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-card>
    @endforeach
</div>
