<?php

namespace NT5\AnimeflvApi;

use GuzzleHttp\Client;

/**
 * Request to AnimeFLV site
 */
class Request {

    /**
     *
     * @var string
     */
    private static $base_url = "https://www3.animeflv.net/";

    /**
     *
     * @var float
     */
    private $timeout = 2.0;

    /**
     *
     * @var Client
     */
    private $Cliente;

    /**
     *
     * @var array
     */
    private $RequestOpt = [];

    public function __construct() {
        $this->Cliente = new Client([
            'base_uri' => self::$base_url,
            'timeout' => $this->timeout
        ]);

        $this->RequestOpt = [
            'allow_redirects' => true,
            'verify' => false
        ];
    }

    /**
     * 
     * @param string $url
     * @return string
     */
    public function get(string $url) {
        $client = $this->Cliente;
        $opt = $this->RequestOpt;

        $res = $client->request('GET', $url, $opt);
        $body = $res->getBody();
        return $body->getContents();
    }

    /**
     * 
     * @param string $url
     * @param array $data
     * @return string
     */
    public function post(string $url, array $data) {
        $client = $this->Cliente;
        $opt = $this->RequestOpt;
        $opt['form_params'] = $data;

        $res = $client->request('POST', $url, $opt);
        $body = $res->getBody();
        return $body->getContents();
    }

    /**
     * 
     * @return string
     */
    public function getBaseURL(): string {
        return substr(self::$base_url, 0, -1);
    }

    /**
     * 
     * @return string
     */
    public static function getURL(): string {
        return self::$base_url;
    }

}
