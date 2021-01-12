<?php

namespace NT5\AnimeflvApi\Entities\URL;

class AnimeSerieLink {

    /**
     *
     * @var int
     */
    private $AnimeId;

    /**
     *
     * @var int
     */
    private $AnimeSlug;

    /**
     * 
     * @param int $AnimeId
     * @param string $AnimeSlug
     */
    public function __construct(int $AnimeId, string $AnimeSlug) {
        $this->AnimeId = $AnimeId;
        $this->AnimeSlug = $AnimeSlug;
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

}
