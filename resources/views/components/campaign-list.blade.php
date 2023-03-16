<div {{ $attributes->merge(['class' => 'flex flex-col gap-2']) }}>
    @foreach ($campaigns as $campaign)
        <div class="
            flex gap-2 justify-between p-2
            border-b border-green last:border-0
        ">
            <div class="w-full">
                <p class="text-lg">{{ $campaign->players->pluck('name')->join(', ', ' & ') }}</p>
                <p class="opacity-75 text-sm">{{ $campaign->difficulty->label() }} difficulty</p>
            </div>

            <div class="w-full flex gap-4 items-center justify-end">
                <x-form.button href="{{ $campaign->route() }}" label="Continue" />

                <x-form.button wire:click="deleteCampaign({{ $campaign->id }})" class="px-2">
                    <x-heroicon-s-trash class="w-4 h-6" />
                </x-form.button>
            </div>
        </div>
    @endforeach
</div>
