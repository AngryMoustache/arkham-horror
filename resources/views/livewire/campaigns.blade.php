<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    @foreach ($sets as $set)
        <x-card>
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
