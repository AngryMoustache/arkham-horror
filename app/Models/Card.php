<?php

namespace App\Models;

use App\Enums\CardType;
use App\Enums\Faction;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'code',
        'set_id',
        'name',
        'type',
        'faction',
        'deck_limit',
        'traits',
        'experience',
        'owned',
        'attachment_id',
    ];

    public $casts = [
        'owned' => 'integer',
        'faction' => Faction::class,
        'type' => CardType::class,
    ];

    public function set()
    {
        return $this->belongsTo(Set::class);
    }

    public function attachment()
    {
        return $this->belongsTo(Attachment::class);
    }
}
