<?php

namespace NT5\AnimeflvApi\Request\Methods;

use NT5\AnimeflvApi\Entities\Error;
use NT5\AnimeflvApi\Entities\Download;
use NT5\AnimeflvApi\Entities\AnimeDownloadEntry;

trait getDownloads {

    /**
     * 
     * @param string $url
     * @return string
     */
    public abstract function get(string $url);

    /**
     * 
     * @param string $anime_slug
     * @param string $cap_id
     * @return AnimeDownloadEntry|Error
     */
    public function getDownloads(string $anime_slug, string $cap_id) {
        try {
            $response = $this->get("ver/$anime_slug-$cap_id");
        } catch (\Exception $e) {
            return new Error($e);
        }
        if ($response) {

            $res = (string) $response;

            $qp = \htmlqp($res);
            $download_table = $qp->find('div.DwsldCnTbl table tbody tr');
            $anime_title = $qp->find('nav.Brdcrmb.fa-home a:nth-of-type(2)')->text();

            // Download area
            $links = [];
            foreach ($download_table as $download) {
                $server = $download->find('td:first')->text();
                $type = $download->find('td:nth-child(2)')->text();
                $format = $download->find('td:nth-child(3)')->text();
                $link_ouo = $download->find('td:nth-child(4) a')->attr("href");
                $link = urldecode(preg_replace('/http:\/\/ouo\.io\/s\/y0d65LCP\?s=(.+)/', '${1}', $link_ouo));

                $links[] = new Download\DownloadItem($server, $type, $format, $link);
            }

            // Player area
            $anime_videos_matches = [];
            $videos = [];
            preg_match_all('/var videos = \{(.+)\}\;/m', $res, $anime_videos_matches, PREG_SET_ORDER, 0);
            $anime_videos = \json_decode("{" . \trim($anime_videos_matches[0][1]) . "}");
            foreach ($anime_videos as $k => $v) {
                foreach ($v as $player) {
                    $server = $player->server;
                    $title = $player->title;
                    $url = $player->code;

                    $videos[$k][] = new Download\PlayerItem($server, $title, $url);
                }
            }

            // Info Area
            return new AnimeDownloadEntry($anime_title, $anime_slug, $cap_id, $videos, $links);
        }

        return new Error(new \Exception("status error"));
    }

}
