<?php

namespace NT5\AnimeflvApi\Request\Methods;

use NT5\AnimeflvApi\Entities;

trait getAnime {

    /**
     * 
     * @param string $url
     * @return string
     */
    public abstract function get(string $url);

    /**
     * 
     * @param string $url
     * @return \NT5\AnimeflvApi\Request\Methods\AnimeEntry
     */
    public function getAnime(string $url): Entities\AnimeEntry {
        $response = $this->get("anime/$url");

        $res = (string) $response;
        $qp = \htmlqp($res);
        $entry = new Entities\AnimeEntry();

        $anime_title = $qp->find("h1.Title")->text();
        $anime_description = $qp->find("div.Description p")->text();
        $anime_following = $qp->find("section.WdgtCn.Sm div.Top div.Title span")->text();
        $anime_rating = $qp->find("span.vtprmd#votes_prmd")->text();
        $anime_status = $qp->find("p.AnmStts span.fa-tv")->text();
        $anime_type = $qp->find("span.Type")->text();
        $anime_image = $qp->find("div.AnimeCover div.Image figure img")->attr("src");

        $anime_tags = [];
        foreach ($qp->find("nav.Nvgnrs a") as $a) {
            $tag_name = $a->text();
            $tag_url = $a->attr("href");

            $anime_tag = new Entities\AnimeTag();
            $anime_tag
                    ->setTitle($tag_name)
                    ->setUrl($tag_url);

            $anime_tags[] = $anime_tag;
        }

        $reg_anime_episodes = [];
        $reg_anime_info = [];
        preg_match_all("/var episodes = \[(.+)\]/", $res, $reg_anime_episodes);
        preg_match_all("/var anime_info = \[(.+)\]/", $res, $reg_anime_info);
        $json_anime_episodes = \json_decode("[" . $reg_anime_episodes[1][0] . "]");
        $json_anime_info = \json_decode("[" . $reg_anime_info[1][0] . "]");

        $anime_episodes = array_map(function($ar) {
            $cap_number = (int) $ar[0];
            $cap_id = (int) $ar[1];

            $episode = new Entities\AnimeEpisode();
            $episode
                    ->setCapId($cap_id)
                    ->setCapNumber($cap_number);

            return new $episode;
        }, $json_anime_episodes);

        $entry
                ->setSlug($url)
                ->setTitle($anime_title)
                ->setDescription($anime_description)
                ->setFollowing($anime_following)
                ->setRating($anime_rating)
                ->setStatus($anime_status)
                ->setType($anime_type)
                ->setImage($anime_image)
                ->setAnimeMeta($json_anime_info);

        foreach ($anime_tags as $tag) {
            $entry->addTag($tag);
        }
        foreach ($anime_episodes as $episode) {
            $entry->addEpisode($episode);
        }

        return $entry;
    }

}
