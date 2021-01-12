<?php

namespace Tests;

use NT5\AnimeflvApi\Request;
use PHPUnit\Framework\TestCase;

class RequestGetTest extends TestCase {

    public function testGet() {
        $r = new Request();

        $res = $r->get("anime/enen-no-shouboutai-ni-no-shou");
        $this->assertNotEmpty($res, "Empty GET Response");
    }

    public function testGetNotFound() {
        $r = new Request();

        $this->expectException(\Exception::class);
        $r->get("404");
    }

}
