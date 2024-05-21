<?php

namespace Arca\SkillRatingSystem\Elo;

class Elo {
    /** @var EloSettings Settings of the Elo rating system. */
    protected EloSettings $settings;

    /**
     * Elo constructor.
     *
     * @param EloSettings|null $settings
     */
    public function __construct(?EloSettings $settings = null) {
        if (is_null($settings)) {
            $settings = new EloSettings;
        }

        $this->setSettings($settings);
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
     * Run a one-to-one match again two players and give the results.
     *
     * @param float $eloA
     * @param float $eloB
     * @param EloMatchOutcome $matchOutcome
     * @return EloMatchResults
     */
    public function oneToOne(float $eloA, float $eloB, EloMatchOutcome $matchOutcome): EloMatchResults {
        $settings = $this->getSettings();

        $playerA = new EloPlayer($settings, $eloA);
        $playerB = new EloPlayer($settings, $eloB);

        $playerEvolutionA = $playerA->calculate($eloB, $matchOutcome);
        $playerEvolutionB = $playerB->calculate($eloA, $matchOutcome->getOpposite());

        return new EloMatchResults($playerEvolutionA, $playerEvolutionB);
    }
}
