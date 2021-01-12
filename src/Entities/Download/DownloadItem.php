<?php

namespace NT5\AnimeflvApi\Entities\Download;

class DownloadItem {

    /**
     *
     * @var string
     */
    private $Server;

    /**
     *
     * @var string
     */
    private $Type;

    /**
     *
     * @var string
     */
    private $Format;

    /**
     *
     * @var string
     */
    private $Link;

    /**
     * 
     * @param string $Server
     * @param string $Type
     * @param string $Format
     * @param string $Link
     */
    public function __construct(string $Server, string $Type, string $Format, string $Link) {
        $this->Server = $Server;
        $this->Type = $Type;
        $this->Format = $Format;
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
    public function getType() {
        return $this->Type;
    }

    /**
     * 
     * @return string
     */
    public function getFormat() {
        return $this->Format;
    }

    /**
     * 
     * @return string
     */
    public function getLink() {
        return $this->Link;
    }

}
