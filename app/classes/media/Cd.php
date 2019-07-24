<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace classes\media;

/**
 * Description of Cd
 *
 * @author Elena
 */
class Cd extends Media{
  /**
     * Cd have additional artist and songs information
     * @var
     */
    private $artist;
    private $songs = [];
    /**
     * Cd constructor.
     *
     * @param string $title
     * @param string $artist
     * @param array $songs
     * @param bool $isCheckOut
     */
    public function __construct(string $title, string $artist, array $songs = [], $isCheckOut = false)
    {
        parent::__construct($title, $isCheckOut);
        $this->artist = $artist;
        $this->songs = $songs;
    }
    /**
     * @return mixed
     */
    public function getArtist()
    {
        return $this->artist;
    }
    /**
     * @return array
     */
    public function getSongs(): array
    {
        return $this->songs;
    }
    /**
     * @return int
     */
    public function getSongsCount(): int
    {
        return count($this->songs);
    }
}
