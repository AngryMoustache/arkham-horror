<div {{ $attributes->merge(['class' => 'flex flex-col gap-2']) }}>
    @foreach ($campaigns as $campaign)
        <div class="
            flex gap-2 justify-between p-2
            border-b border-green last:border-0
        ">
            <div class="w-full">
                <p class="text-lg">{{ $campaign->players->pluck('name')->join(', ', ' & ') }}</p>
                <p class="opacity-75">{{ $campaign->difficulty->label() }} difficulty</p>
            </div>

            <div class="w-full flex items-center justify-end">
                <x-form.button href="{{ $campaign->route() }}">
                    Continue
                </x-form.button>
            </div>
        </div>
    @endforeach
</div>
