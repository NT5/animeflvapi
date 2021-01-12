<?php

namespace Tests;

use NT5\AnimeFLV\API\AnimeAPI;
use NT5\AnimeFLV\API\Entities;
use PHPUnit\Framework\TestCase;

class APIgetLastAnimesTest extends TestCase {

    private function verbose($method, $text) {
        fwrite(STDERR, $method . "\n");
        fwrite(STDERR, print_r($text, TRUE));
    }

    public function testGetLastAnimes() {
        $api = new AnimeAPI();

        $res = $api->getLastAnimes();
        $this->assertNotInstanceOf(Entities\Error::class, $res);

        $this->verbose(__METHOD__, $res);
    }

}
