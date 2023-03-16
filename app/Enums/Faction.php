<?php

namespace App\Enums;

enum Faction: string
{
    case GUARDIAN = 'guardian';
    case MYSTIC = 'mystic';
    case ROGUE = 'rogue';
    case SEEKER = 'seeker';
    case SURVIVOR = 'survivor';
    case NEUTRAL = 'neutral';

    public function color()
    {
        return match ($this->value) {
            self::GUARDIAN->value => 'blue',
            self::MYSTIC->value => 'purple',
            self::ROGUE->value => 'green',
            self::SEEKER->value => 'yellow',
            self::SURVIVOR->value => 'red',
            self::NEUTRAL->value => 'gray',
        };
    }
}
