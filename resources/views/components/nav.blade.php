<div class="
    w-full relative top-0 bg-paper flex flex-col gap-4 p-4
    h-auto md:h-screen
    md:w-96 md:sticky
">
    <x-nav.item
        label="Dashboard"
        icon="heroicon-o-home"
        :route="route('dashboard')"
    />

    <x-nav.item
        label="Campaigns"
        icon="heroicon-o-book-open"
        :route="route('campaign.index')"
    />

    <x-nav.item
        label="Players"
        icon="heroicon-o-user-group"
        :route="route('player.index')"
    />
</div>
