<?php

namespace Arca\SkillRatingSystem\Elo;

class EloPlayer {
    /** @var EloSettings Settings of the Elo rating system. */
    protected EloSettings $settings;
    /** @var float Current Elo of the player. */
    protected float $elo;

    /**
     * EloPlayer constructor.
     *
     * @param EloSettings $settings
     * @param float $elo
     */
    public function __construct(EloSettings $settings, float $elo) {
        $this
            ->setSettings($settings)
            ->setElo($elo)
        ;
    }

    /**
     * Get the settings of the Elo rating system.
     *
     * @return EloSettings
     */
    public function getSettings(): EloSettings {
        return $this->settings;
    }

    /**
     * Set the settings of the Elo rating system.
     *
     * @param EloSettings $settings
     * @return $this
     */
    public function setSettings(EloSettings $settings): static {
        $this->settings = $settings;

        return $this;
    }

    /**
     * Get the current Elo of the player.
     *
     * @return float
     */
    public function getElo(): float {
        return $this->elo;
    }

    /**
     * Set the current Elo of the player.
     *
     * @param float $elo
     * @return $this
     */
    public function setElo(float $elo): static {
        $this->elo = $elo;

        return $this;
    }

    /**
     * Calculate the odds of winning of the player.
     *
     * @param float $foeElo
     * @return float
     */
    public function calculateWinOdds(float $foeElo): float {
        $eloDiff = ($this->getElo() - $foeElo);

        return pow(10, ($eloDiff / 400));
    }

    /**
     * Calculate the probability of winning of the player.
     *
     * @param float $foeElo
     * @return float
     */
    public function calculateWinProbability(float $foeElo): float {
        $odds = $this->calculateWinOdds($foeElo);

        return ($odds / ($odds + 1));
    }

    /**
     * Calculate the evolution of the player's Elo.
     *
     * @param float $foeElo
     * @param EloMatchOutcome $matchOutcome
     * @return EloPlayerEvolution
     */
    public function calculate(float $foeElo, EloMatchOutcome $matchOutcome): EloPlayerEvolution {
        $eloA = $this->getElo();

        $k = $this->getSettings()->getK();
        $p = $this->calculateWinProbability($foeElo);
        $w = $matchOutcome->toFloat();

        $newEloA = ($eloA + $k * ($w - $p));

        return new EloPlayerEvolution($eloA, $newEloA, $matchOutcome, $this->getSettings());
    }
}