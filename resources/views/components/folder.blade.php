<div
    class="relative w-full flex flex-col"
    x-data="{
        open: @js((int) request()->query('tab', 0)),
        tabs: @js($tabs),
    }"
>
    <div class="relative w-11/12 flex gap-2 ml-4">
        <template x-for="(tab, key) in tabs" :key="key">
            <div
                x-on:click="open = key"
                class="
                    relative flex items-center justify-center px-12 pt-3 pb-7
                    -mr-4 shadow-lg bg-paper-reverse rounded-t cursor-pointer
                    transition-all duration-300 ease-in-out
                "
                :style="'z-index:' + (open === key ? 30 : 30 - key)"
                :class="{
                    'bottom-0': open === key,
                    '-bottom-4 hover:-bottom-3': open !== key,
                }"
            >
                <span
                    x-text="tab"
                    class="text-xl text-typed text-black bg-white px-4 py-1 rounded-lg"
                ></span>
            </div>
        </template>
    </div>

    <div class="relative z-50 bg-paper">
        {{ $slot }}
    </div>
</div>
