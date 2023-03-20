<div class="flex flex-col gap-4">
    <x-card class="w-full xl:w-2/3">
        <x-headers.h1 title="Campaigns" />
        <x-form.button
            label="Start new campaign"
            :href="route('campaign.create', 'rcore')"
            class="mt-4"
        />
    </x-card>

    <div class="flex flex-col gap-2">
        @foreach ($sets->pluck('campaigns')->flatten() as $campaign)
            <x-card class="
                flex flex-col gap-4 justify-between p-2
                border-b border-green last:border-0
            ">
                <div class="
                    w-full flex flex-col justify-between gap-4
                    md:items-center md:flex-row
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
                        <div class="w-full flex flex-col gap-2 border border-green rounded-xl overflow-hidden bg-green">
                            <div
                                class="aspect-video w-full bg-no-repeat bg-left hidden md:block"
                                style="
                                    background-image: url('{{ $player->pivot->investigator->attachment->path() }}');
                                    background-size: 185%;
                                "
                            ></div>

                            <div class="w-full text-center p-4 pt-2">
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
</div>
