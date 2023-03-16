<div class="w-full flex gap-2 border border-green border-b-0 last:border-b">
    <div class="flex w-16 justify-center items-center px-6 bg-{{ $card->faction?->color() }}-300 border-r border-green">
        <p class="text-title text-3xl !text-black">{{ $card->pivot->quantity }}</p>
    </div>

    <div class="flex flex-col p-2">
        <p>{{ $card->name }}</p>
        <p class="text-xs uppercase">
            Level
            {{ $card->experience ?? 0 }}
            {{ $card->type->value }}
        </p>
    </div>
</div>
