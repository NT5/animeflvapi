<?php

namespace NT5\AnimeflvApi\Entities;

use NT5\AnimeflvApi\Request;
use NT5\AnimeflvApi\Entities\AnimeTag;
use NT5\AnimeflvApi\Entities\AnimeEpisode;

class AnimeEntry {

    /**
     *
     * @var string
     */
    private $Title = "No definido";

    /**
     *
     * @var string
     */
    private $Description = "Sin descripcion";

    /**
     *
     * @var string
     */
    private $Type = "void";

    /**
     *
     * @var string
     */
    private $Image = "/uploads/animes/banners/1.jpg";

    /**
     *
     * @var string
     */
    private $Status = "FINALIZADO";

    /**
     *
     * @var int
     */
    private $Following = 0;

    /**
     *
     * @var float
     */
    private $Rating = 0.0;

    /**
     *
     * @var AnimeTag[]
     */
    private $Tags;

    /**
     *
     * @var AnimeEpisode[]
     */
    private $Episodes;

    /**
     *
     * @var string
     */
    private $Slug = "none";

    /**
     *
     * @var array
     */
    private $AnimeMeta;

    /**
     * 
     * @param string $Title
     * @return $this
     */
    public function setTitle(string $Title) {
        $this->Title = $Title;
        return $this;
    }

    /**
     * 
     * @param string $Description
     * @return $this
     */
    public function setDescription(string $Description) {
        $this->Description = $Description;
        return $this;
    }

    /**
     * 
     * @param string $Type
     * @return $this
     */
    public function setType(string $Type) {
        $this->Type = $Type;
        return $this;
    }

    /**
     * 
     * @param string $Image
     * @return $this
     */
    public function setImage(string $Image) {
        $this->Image = $Image;
        return $this;
    }

    /**
     * 
     * @param string $Status
     * @return $this
     */
    public function setStatus(string $Status) {
        $this->Status = $Status;
        return $this;
    }

    /**
     * 
     * @param int $Following
     * @return $this
     */
    public function setFollowing(int $Following) {
        $this->Following = $Following;
        return $this;
    }

    /**
     * 
     * @param float $Rating
     * @return $this
     */
    public function setRating(float $Rating) {
        $this->Rating = $Rating;
        return $this;
    }

    /**
     * 
     * @param AnimeTag $Tag
     * @return $this
     */
    public function addTag(AnimeTag $Tag) {
        $this->Tags[] = $Tag;
        return $this;
    }

    /**
     * 
     * @param AnimeEpisode $Episode
     * @return $this
     */
    public function addEpisode(AnimeEpisode $Episode) {
        $this->Episodes[] = $Episode;
        return $this;
    }

    /**
     * 
     * @param array $AnimeMeta
     * @return $this
     */
    public function setAnimeMeta(array $AnimeMeta) {
        $this->AnimeMeta = $AnimeMeta;
        return $this;
    }

    /**
     * 
     * @param string $Slug
     * @return $this
     */
    public function setSlug(string $Slug) {
        $this->Slug = $Slug;
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getTitle(): string {
        return $this->Title;
    }

    /**
     * 
     * @return string
     */
    public function getDescription(): string {
        return $this->Description;
    }

    /**
     * 
     * @return string
     */
    public function getType(): string {
        return $this->Type;
    }

    /**
     * 
     * @return string
     */
    public function getImage(): string {
        return $this->Image;
    }

    /**
     * 
     * @return string
     */
    public function getStatus(): string {
        return $this->Status;
    }

    /**
     * 
     * @return int
     */
    public function getFollowing(): int {
        return $this->Following;
    }

    /**
     * 
     * @return float
     */
    public function getRating(): float {
        return $this->Rating;
    }

    /**
     * 
     * @return AnimeTag[]
     */
    public function getTags(): array {
        return $this->Tags;
    }

    /**
     * 
     * @return array
     */
    public function getTagNames(): array {
        return array_map(function (AnimeTag $Tag) {
            return $Tag->getTitle();
        }, $this->getTags());
    }

    /**
     * 
     * @return AnimeEpisode[]
     */
    public function getEpisodes(): array {
        return $this->Episodes;
    }

    /**
     * 
     * @return array
     */
    public function getAnimeMeta(): array {
        return $this->AnimeMeta;
    }

    /**
     * 
     * @return string
     */
    public function getSlug(): string {
        return $this->Slug;
    }

    /**
     * 
     * @return string
     */
    public function getUrl(): string {
        return Request::getURL() . $this->getSlug();
    }

}
