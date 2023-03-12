<div class="flex gap-4">
    @foreach ($sets as $set)
        <x-card class="w-1/2">
            <x-headers.h1 :title="$set->name" />

            <x-campaign-list :campaigns="$set->campaigns" />

            <x-form.button
                label="Start new campaign"
                :href="route('campaign.create', $set->code)"
                class="mt-4"
            />
        </x-card>
    @endforeach
</div>
