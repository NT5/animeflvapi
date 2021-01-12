<?php

namespace NT5\AnimeflvApi\Entities;

use NT5\AnimeflvApi\Request;

class SearchResult {

    /**
     *
     * @var int
     */
    private $Id;

    /**
     *
     * @var string
     */
    private $Title;

    /**
     *
     * @var string
     */
    private $Type;

    /**
     *
     * @var int
     */
    private $LastId;

    /**
     *
     * @var string
     */
    private $Slug;

    /**
     * 
     * @param int $Id
     * @param string $Title
     * @param string $Type
     * @param int $LastId
     * @param string $Slug
     */
    public function __construct(int $Id, string $Title, string $Type, int $LastId, string $Slug) {
        $this->Id = $Id;
        $this->Title = $Title;
        $this->Type = $Type;
        $this->LastId = $LastId;
        $this->Slug = $Slug;
    }

    /**
     * 
     * @return int
     */
    public function getId() {
        return $this->Id;
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
    public function getType(): string {
        return $this->Type;
    }

    /**
     * 
     * @return int
     */
    public function getLastId(): int {
        return $this->LastId;
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
    public function getURL(): string {
        $slug = $this->getSlug();
        return Request::getURL() . "anime/$slug";
    }

    /**
     * 
     * @return string
     */
    public function getImg(): string {
        return sprintf("%suploads/animes/covers/80x80/%s.jpg", Request::getURL(), $this->getId());
    }

}
