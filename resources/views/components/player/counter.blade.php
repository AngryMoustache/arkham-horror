<div
    class="flex w-full gap-1 justify-between items-center"
    x-data="{
        value: {{ $player->pivot->$type }},
        increment: function() {
            this.value += 1;
            this.update()
        },
        decrement: function() {
            if (this.value > 0) {
                this.value -= 1;
                this.update()
            }
        },
        update () {
            this.$wire.setPlayerInformation({{ $player->id }}, '{{ $type }}', this.value)
        }
    }"
>
    <x-form.button
        label="-"
        x-on:click="decrement"
    />

    <span
        class="text-xl text-title"
        x-text="value"
    ></span>

    <x-form.button
        label="+"
        x-on:click="increment"
    />
</div>
