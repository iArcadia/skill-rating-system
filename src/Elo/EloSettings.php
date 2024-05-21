<?php

namespace Arca\SkillRatingSystem\Elo;

class EloSettings {
    /** @var float The K-factor of the Elo formula. */
    protected float $k;
    /** @var float The minimum allowed Elo that a player can have. */
    protected float $minimumAllowedElo;

    /**
     * EloSettings constructor.
     *
     * @param float $k
     * @param float $minimumAllowedElo
     */
    public function __construct(float $k = 40.0, float $minimumAllowedElo = 100.0) {
        $this
            ->setK($k)
            ->setMinimumAllowedElo($minimumAllowedElo)
        ;
    }

    /**
     * Get the K-factor.
     *
     * @return float
     */
    public function getK(): float {
        return $this->k;
    }

    /**
     * Set the K-factor.
     *
     * @param float $k
     * @return $this
     */
    public function setK(float $k): static {
        $this->k = $k;

        return $this;
    }

    /**
     * Get the minimum allowed Elo that a player can have.
     *
     * @return float
     */
    public function getMinimumAllowedElo(): float {
        return $this->minimumAllowedElo;
    }

    /**
     * Set the minimum allowed Elo that a player can have.
     *
     * @param float $minimumAllowedElo
     * @return $this
     */
    public function setMinimumAllowedElo(float $minimumAllowedElo): static {
        $this->minimumAllowedElo = $minimumAllowedElo;

        return $this;
    }
}