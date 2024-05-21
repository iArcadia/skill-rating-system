<?php

namespace Arca\SkillRatingSystem\Elo;

class EloPlayerEvolution {
    /** @var float Elo of the player before the match. */
    protected float $eloBefore;
    /** @var float Elo of the player after the match. */
    protected float $eloAfter;
    /** @var float Elo gain. */
    protected float $eloGain;
    /** @var EloMatchOutcome Outcome of the match. */
    protected EloMatchOutcome $matchOutcome;

    /**
     * EloPlayerEvolution constructor.
     *
     * @param float $eloBefore
     * @param float $eloAfter
     * @param EloMatchOutcome $matchOutcome
     * @param EloSettings $settings
     */
    public function __construct(float $eloBefore, float $eloAfter, EloMatchOutcome $matchOutcome, EloSettings $settings) {
        $minimumAllowedElo = $settings->getMinimumAllowedElo();

        if ($eloAfter < $minimumAllowedElo) {
            $eloAfter = $minimumAllowedElo;
        }

        $this->eloBefore = $eloBefore;
        $this->eloAfter = $eloAfter;
        $this->eloGain = ($eloAfter - $eloBefore);

        $this->matchOutcome = $matchOutcome;
    }

    /**
     * Get the Elo of the player before the match.
     *
     * @return float
     */
    public function getEloBefore(): float {
        return $this->eloBefore;
    }

    /**
     * Get the Elo of the player after the match.
     *
     * @return float
     */
    public function getEloAfter(): float {
        return $this->eloAfter;
    }

    /**
     * Get the Elo gain.
     *
     * @return float
     */
    public function getEloGain(): float {
        return $this->eloGain;
    }

    /**
     * Get the outcome of the match.
     *
     * @return EloMatchOutcome
     */
    public function getMatchOutcome(): EloMatchOutcome {
        return $this->matchOutcome;
    }
}