<?php

namespace NT5\AnimeflvApi\Request\Methods;

use NT5\AnimeflvApi\Entities\Error;
use NT5\AnimeflvApi\Entities\SearchResult;

trait search {

    /**
     * 
     * @param string $url
     * @param array $data
     * @return string
     */
    public abstract function post(string $url, array $data);

    /**
     * 
     * @param string $q
     * @return SearchResult|Error
     */
    public function search(string $q) {
        try {
            $response = $this->post("api/animes/search", [
                'value' => $q
            ]);
        } catch (\Exception $e) {
            return new Error($e);
        }

        if ($response) {
            $body = (string) $response;
            $res = \json_decode(mb_convert_encoding($body, "UTF-8"));
            $Items = [];
            foreach ($res as $item) {
                $Items[] = new SearchResult((int) $item->id, (string) $item->title, (string) $item->type, (int) $item->last_id, (string) $item->slug);
            }
            return $Items;
        }

        return new Error(new \Exception("status error"));
    }

}
