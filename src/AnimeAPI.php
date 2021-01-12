<?php

namespace NT5\AnimeflvApi;

use NT5\AnimeflvApi\Request;
use NT5\AnimeflvApi\Request\Methods;
use NT5\AnimeflvApi\Request\Util;

class AnimeAPI {

    use Methods\search,
        Methods\getLastAnimes,
        Methods\getAnime,
        Methods\getDownloads;

    use Util\parseUrl;

    /**
     *
     * @var Request
     */
    private $Request;

    public function __construct() {
        $this->Request = new Request();
    }

    /**
     * 
     * @param string $url
     * @return string
     */
    public function get(string $url) {
        return $this->Request->get($url);
    }

    /**
     * 
     * @param string $url
     * @param array $data
     * @return string
     */
    public function post(string $url, array $data) {
        return $this->Request->post($url, $data);
    }

    /**
     * 
     * @return string
     */
    public function getBaseURL() {
        return $this->Request->getBaseURL();
    }

}
