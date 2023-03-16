<div>
    <x-form.button href="https://arkhamdb.com/decklist/view/{{ $deckId }}" label="View List" />
    <x-form.button wire:click="refreshList" label="Refresh List" />

    <div>
        @foreach ($player->deck($campaign) as $card)
            @unless ($card['card'] ?? null)
                @continue
            @endunless

            <div class="w-full flex gap-2 border border-green border-b-0 last:border-b">
                <div class="flex w-16 justify-center items-center px-6 bg-{{ $card['card']?->faction?->color() }}-300 border-r border-green">
                    <p class="text-title text-3xl !text-black">{{ $card['amount'] }}</p>
                </div>

                <div class="flex flex-col p-2">
                    <p>{{ $card['card']?->name }}</p>
                    <p class="text-xs uppercase">
                        Lvl
                        {{ $card['card']?->experience ?? 0 }}
                        {{ collect(explode('.', $card['card']?->traits))->filter()->join(', ') }}
                        ({{ $card['card']?->type?->value }})
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    {{-- <div class="bg-blue-300"></div> --}}
    {{-- <div class="bg-green-300"></div> --}}
    {{-- <div class="bg-yellow-300"></div> --}}
    {{-- <div class="bg-red-300"></div> --}}
    {{-- <div class="bg-purple-300"></div> --}}
    {{-- <div class="bg-gray-300"></div> --}}
</div>
