<?php

namespace Arca\SkillRatingSystem\Elo;

enum EloMatchOutcome {
    case WIN;
    case DRAW;
    case LOSS;

    /**
     * Convert the outcome to a float number.
     *
     * @return float
     */
    public function toFloat(): float {
        return match ($this) {
            self::WIN => 1.0,
            self::DRAW => 0.5,
            self::LOSS => 0.0
        };
    }

    /**
     * Get the opposite outcome.
     *
     * @return EloMatchOutcome
     */
    public function getOpposite(): EloMatchOutcome {
        return match ($this) {
            self::WIN => self::LOSS,
            self::DRAW => self::DRAW,
            self::LOSS => self::WIN
        };
    }
}