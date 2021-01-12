<?php

namespace Tests;

use NT5\AnimeFLV\API\AnimeAPI;
use NT5\AnimeFLV\API\Entities;
use PHPUnit\Framework\TestCase;

class APIsearchTest extends TestCase {

    private function verbose($method, $text) {
        fwrite(STDERR, $method . "\n");
        fwrite(STDERR, print_r($text, TRUE));
    }

    public function testsearch() {
        $api = new AnimeAPI();

        $res = $api->search("youjo senki");
        $this->assertNotInstanceOf(Entities\Error::class, $res);

        $this->verbose(__METHOD__, $res);
    }

}
