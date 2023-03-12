<?php

namespace App\Enums;

enum CardType: string
{
    case ALLY = 'ally';
    case ASSET = 'asset';
    case EVENT = 'event';
    case SKILL = 'skill';
    case INVESTIGATOR = 'investigator';
    case OTHER = 'other';
}
