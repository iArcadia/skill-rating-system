<?php

namespace Arca\SkillRatingSystem\Elo;

class EloMatchResults {
    /** @var EloPlayerEvolution First player Elo evolution. */
    protected EloPlayerEvolution $firstPlayerEvolution;
    /** @var EloPlayerEvolution Second player Elo evolution. */
    protected EloPlayerEvolution $secondPlayerEvolution;

    /**
     * EloMatchResults constructor.
     *
     * @param EloPlayerEvolution $firstPlayerEvolution
     * @param EloPlayerEvolution $secondPlayerEvolution
     */
    public function __construct(EloPlayerEvolution $firstPlayerEvolution, EloPlayerEvolution $secondPlayerEvolution) {
        $this->firstPlayerEvolution = $firstPlayerEvolution;
        $this->secondPlayerEvolution = $secondPlayerEvolution;
    }

    /**
     * Get the home player Elo evolution.
     *
     * @return EloPlayerEvolution
     */
    public function getFirstPlayerEvolution(): EloPlayerEvolution {
        return $this->firstPlayerEvolution;
    }

    /**
     * Get the foe player Elo evolution.
     *
     * @return EloPlayerEvolution
     */
    public function getSecondPlayerEvolution(): EloPlayerEvolution {
        return $this->secondPlayerEvolution;
    }
}