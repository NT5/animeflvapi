<?php

namespace NT5\AnimeflvApi\Entities;

use NT5\AnimeFLV\AnimeflvApi\Download;

class AnimeDownloadEntry {

    /**
     *
     * @var string
     */
    private $Title;

    /**
     *
     * @var string
     */
    private $AnimeSlug;

    /**
     *
     * @var int
     */
    private $AnimeCapi;

    /**
     *
     * @var Download\PlayerItem[]
     */
    private $AnimePlayer;

    /**
     *
     * @var Download\DownloadItem[]
     */
    private $AnimeDownload;

    /**
     * 
     * @param string $Title
     * @param int $AnimeId
     * @param string $AnimeSlug
     * @param int $AnimeCapi
     * @param array $AnimePlayer
     * @param array $AnimeDownload
     */
    public function __construct(string $Title, string $AnimeSlug, int $AnimeCapi, array $AnimePlayer, array $AnimeDownload) {
        $this->Title = $Title;
        $this->AnimeSlug = $AnimeSlug;
        $this->AnimeCapi = $AnimeCapi;
        $this->AnimePlayer = $AnimePlayer;
        $this->AnimeDownload = $AnimeDownload;
    }

    /**
     * 
     * @return string
     */
    public function getTitle() {
        return $this->Title;
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
     * @return int
     */
    public function getAnimeCapi() {
        return $this->AnimeCapi;
    }

    /**
     * 
     * @return array
     */
    public function getAnimePlayer(): array {
        return $this->AnimePlayer;
    }

    /**
     * 
     * @return array
     */
    public function getAnimeDownload(): array {
        return $this->AnimeDownload;
    }

}
