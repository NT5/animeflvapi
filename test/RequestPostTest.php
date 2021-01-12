<?php

namespace Tests;

use NT5\AnimeflvApi\Request;
use PHPUnit\Framework\TestCase;

class RequestPostTest extends TestCase {

    public function testPost() {
        $r = new Request();

        $res = $r->post("api/animes/search", [
            'value' => 'naruto'
        ]);
        $json = \json_encode($res);
        $this->assertJson($json, "Invalid JSON");
    }

}
