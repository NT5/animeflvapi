<?php

namespace NT5\AnimeflvApi\Entities;

use NT5\AnimeflvApi\Request;

class AnimeTag {

    /**
     *
     * @var string
     */
    private $Title = "No title";

    /**
     *
     * @var string
     */
    private $Url = "/";

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
    public function getUrl(): string {
        return $this->Url;
    }

    /**
     * 
     * @return string
     */
    public function getFullUrl(): string {
        return Request::getURL() . $this->getUrl();
    }

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
     * @param string $Url
     * @return $this
     */
    public function setUrl(string $Url) {
        $this->Url = $Url;
        return $this;
    }

}
