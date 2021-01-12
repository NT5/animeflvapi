<?php

namespace NT5\AnimeflvApi\Entities\URL;

class AnimeEpisodeLink {

    /**
     *
     * @var int
     */
    private $CapId;

    /**
     *
     * @var int
     */
    private $AnimeId;

    /**
     *
     * @var string
     */
    private $AnimeSlug;

    /**
     *
     * @var string
     */
    private $AnimeCapId;

    /**
     * 
     * @param int $CapId
     * @param int $AnimeId
     * @param string $AnimeSlug
     * @param string $AnimeCapId
     */
    public function __construct(int $CapId, int $AnimeId, string $AnimeSlug, string $AnimeCapId) {
        $this->CapId = $CapId;
        $this->AnimeId = $AnimeId;
        $this->AnimeSlug = $AnimeSlug;
        $this->AnimeCapId = $AnimeCapId;
    }

    /**
     * 
     * @return int
     */
    public function getCapId() {
        return $this->CapId;
    }

    /**
     * 
     * @return int
     */
    public function getAnimeId() {
        return $this->AnimeId;
    }

    /**
     * 
     * @return string
     */
    public function getAnimeSlug() {
        return $this->AnimeSlug;
    }

    /**
     * 
     * @return string
     */
    public function getAnimeCapId() {
        return $this->AnimeCapId;
    }

}
