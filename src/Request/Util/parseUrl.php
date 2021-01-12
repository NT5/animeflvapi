<?php

namespace NT5\AnimeflvApi\Request\Util;

trait parseUrl {

    /**
     * Extrae la info de los links con unos regex magicos.
     * @param string $text
     * @return object
     */
    public function parseUrl(string $text) {

        /**
         * NetBeans me dijo que tenia que iniciar las variables para el preg_match ¯\_(ツ)_/¯
         */
        $url_found_cap = $url_found_serie = false;

        /**
         * Regex 
         * base_url/any_word/any_number
         * any_word: anime_slug
         * any_number: anime_cap_id
         */
        \preg_match("/https:\/\/animeflv\.net\/ver\/(.+)\-(\d+)/", $text, $url_found_cap);

        /**
         * Regex 
         * base_url/any_word
         * any_word: anime_slug
         */
        \preg_match("/https:\/\/animeflv.net\/anime\/(.+)/", $text, $url_found_serie);

        /**
         * Momento de comprobar lo que se encontro (Puedes hacer otro If para comprobar si encuentra uno primero?)
         */
        /**
         * El regex fue correcto para una serie, crea una clase con la info encontrada
         * @var $url_found_serie index: 0 = anime_slug
         */
        if ($url_found_serie === 1) {
            $anime_slug = $url_found_serie[1];

            return (object) [
                        "is_animeset" => true,
                        "anime_slug" => $anime_slug
            ];
        }
        // El url es un capitulo
        else if ($reg_found_cap === 1) {
            return (object) [
                        "is_cap" => true,
                        "anime_id" => $url_found_cap[1],
                        "anime_slug" => $url_found_cap[2],
                        "anime_capid" => $url_found_cap[3]
            ];
        }
        // El url es un anime con el nuevo formato
        else if ($new_reg_found_set === 1) {
            return (object) [
                        "is_animeset" => true,
                        "anime_id" => '', // Too bad!
                        "anime_slug" => $url_found_set_new[1]
            ];
        }
        // el url es un capitilo con el nuevo formato
        else if ($new_reg_found_cap === 1) {
            return (object) [
                        "is_cap" => true,
                        "anime_id" => '', // Too bad!
                        "anime_slug" => $url_found_cap_new[1],
                        "anime_capid" => $url_found_cap_new[2]
            ];
        }

        return NULL;
    }

}
