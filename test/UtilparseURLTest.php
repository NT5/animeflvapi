<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use NT5\AnimeflvApi\AnimeAPI;

class UtilparseURLTest extends TestCase {

    private function verbose($method, $text) {
        fwrite(STDERR, $method . "\n");
        fwrite(STDERR, print_r($text, TRUE));
    }

    public function testparseURL() {
        $api = new AnimeAPI();

        $test_links = [
            'serie' => [
            ],
            'capitulo' => [
            ]
        ];

        $serie = $api->parseUrl("https://animeflv.net/anime/5512/tate-no-yuusha-no-nariagari");

        $cap = $api->parseUrl("https://animeflv.net/ver/51030/tate-no-yuusha-no-nariagari-1");

        $this->verbose(__METHOD__, [$serie, $cap]);
    }

}
