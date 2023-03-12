<div {{ $attributes->merge(['class' => 'flex flex-col gap-2']) }}>
    @foreach ($campaigns as $campaign)
        <div class="
            flex gap-2 justify-between p-2
            border-b border-green last:border-0
        ">
            <span class="w-full">
                {{ $campaign->players->pluck('name')->join(', ', ' & ') }}
            </span>

            <div class="w-full flex justify-end">
                <x-form.button href="{{ $campaign->route() }}">
                    Continue
                </x-form.button>
            </div>
        </div>
    @endforeach
</div>
