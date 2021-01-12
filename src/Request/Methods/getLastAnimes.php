<?php

namespace NT5\AnimeflvApi\Request\Methods;

use NT5\AnimeflvApi\Entities\Error;
use NT5\AnimeflvApi\Entities\AnimeSimpleEntry;

trait getLastAnimes {

    /**
     * 
     * @param string $url
     * @return string
     */
    public abstract function get(string $url);

    /**
     * 
     * @return AnimeSimpleEntry|Error
     */
    public function getLastAnimes() {
        try {
            $response = $this->get("");
        } catch (\Exception $e) {
            return new Error($e);
        }

        if ($response) {
            $res = (string) $response;
            $qp = \htmlqp($res);

            $List = $qp->find('ul.ListEpisodios');
            $epList = [];
            foreach ($List->find('li') as $e) {
                $link = $e->find('a.fa-play')->attr("href");
                $img = $e->find('img')->attr('src');
                $title = $e->find('strong.Title')->text();
                $capi = $e->find('span.Capi')->text();

                $epList[] = new AnimeSimpleEntry((string) urldecode($link), (string) $img, (string) $title, (string) $capi);
            }

            return $epList;
        }

        return new Error(new \Exception("status error"));
    }

}
