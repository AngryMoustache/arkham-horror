<div
    class="relative w-full flex flex-col"
    x-data="{
        open: 0,
        tabs: @js($tabs),
    }"
>
    <div class="relative w-11/12 flex md:flex-row flex-col gap-2 ml-4">
        <template x-for="(tab, key) in tabs" :key="key">
            <div
                x-on:click="open = key"
                class="
                    relative flex items-center justify-center
                    shadow-lg bg-paper-reverse rounded-lg cursor-pointer
                    transition-all duration-300 ease-in-out

                    py-2
                    md:px-12 md:pt-3 md:pb-8 md:-mr-4
                "
                :style="'z-index:' + (open === key ? 30 : 30 - key)"
                :class="{
                    'md:-bottom-2 py-6': open === key,
                    'md:-bottom-4 md:hover:-bottom-3': open !== key,
                }"
            >
                <span
                    x-text="tab"
                    class="text-xl text-typed text-black bg-white px-4 py-1 rounded-lg"
                ></span>
            </div>
        </template>
    </div>

    <div class="relative z-50 bg-paper rounded-lg mt-4 md:mt-0">
        {{ $slot }}
    </div>
</div>
