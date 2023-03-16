<?php

namespace App\Enums;

enum Difficulty: string
{
    case EASY = 'easy';
    case STANDARD = 'standard';
    case HARD = 'hard';
    case EXPERT = 'expert';

    public function label(): string
    {
        return ucfirst($this->value);
    }
}
