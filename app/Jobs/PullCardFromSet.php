<?php

namespace App\Jobs;

use App\Enums\CardType;
use App\Models\Attachment;
use App\Models\Card;
use App\Models\Set;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PullCardFromSet implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public array $card)
    {
        //
    }

    public function handle()
    {
        $set = Set::firstOrCreate(['code' => $this->card['pack_code']], [
            'name' => $this->card['pack_name'],
        ]);

        $card = Card::firstOrCreate(['code' => $this->card['code']], [
            'name' => $this->card['name'],
            'type' => CardType::tryFrom($this->card['type_code']) ?? CardType::OTHER,
            'set_id' => $set->id,
            'faction' => $this->card['faction_code'],
            'deck_limit' => $this->card['deck_limit'] ?? 999,
            'traits' => $this->card['traits'],
            'experience' => $this->card['xp'] ?? 0,
        ]);

        if (! $card->wasRecentlyCreated) {
            return;
        }

        $card->increment('owned', $this->card['quantity']);

        $attachment = Attachment::uploadFromUrl("https://arkhamdb.com/{$this->card['imagesrc']}");

        $card->attachment_id = $attachment->id;
        $card->saveQuietly();
    }
}
