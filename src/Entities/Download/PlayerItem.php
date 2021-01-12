<?php

namespace NT5\AnimeflvApi\Entities\Download;

class PlayerItem {

    /**
     *
     * @var string
     */
    private $Server;

    /**
     *
     * @var string
     */
    private $Title;

    /**
     *
     * @var string 
     */
    private $Link;

    /**
     * 
     * @param string $Server
     * @param string $Title
     * @param string $Link
     */
    public function __construct(string $Server, string $Title, string $Link) {
        $this->Server = $Server;
        $this->Title = $Title;
        $this->Link = $Link;
    }

    /**
     * 
     * @return string
     */
    public function getServer() {
        return $this->Server;
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
    public function getLink() {
        return $this->Link;
    }

}
