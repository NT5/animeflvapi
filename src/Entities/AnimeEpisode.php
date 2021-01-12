<?php

namespace NT5\AnimeflvApi\Entities;

class AnimeEpisode {

    /**
     *
     * @var int
     */
    private $CapId;

    /**
     *
     * @var int
     */
    private $CapNumber;

    /**
     * 
     * @return int
     */
    public function getCapId(): int {
        return $this->CapId;
    }

    /**
     * 
     * @return int
     */
    public function getCapNumber(): int {
        return $this->CapNumber;
    }

    /**
     * 
     * @param int $CapId
     * @return $this
     */
    public function setCapId(int $CapId) {
        $this->CapId = $CapId;
        return $this;
    }

    /**
     * 
     * @param int $CapNumber
     * @return $this
     */
    public function setCapNumber(int $CapNumber) {
        $this->CapNumber = $CapNumber;
        return $this;
    }

}
