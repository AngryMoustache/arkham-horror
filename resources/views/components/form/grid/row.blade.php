<div class="flex gap-4 p-4 border-b border-green last:border-0 flex-col md:flex-row">
    <div class="w-full md:w-2/5">
        <p>
            {{ $label }}
        </p>
    </div>

    <div class="w-full md:w-3/5">
        {{ $slot }}
    </div>
</div>
