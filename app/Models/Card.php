<?php

namespace App\Models;

use App\Enums\CardType;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'code',
        'set_id',
        'name',
        'type',
        'owned',
        'attachment_id',
    ];

    public $casts = [
        'owned' => 'integer',
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
