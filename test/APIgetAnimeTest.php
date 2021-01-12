<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use NT5\AnimeflvApi\AnimeAPI;

class APIgetAnimeTest extends TestCase {

    public function testgetAnime() {
        $api = new AnimeAPI();

        $res = $api->getAnime("rezero-kara-hajimeru-isekai-seikatsu-2nd-season");
        $this->assertNotEmpty(Entities\Error::class, $res);
    }

}
