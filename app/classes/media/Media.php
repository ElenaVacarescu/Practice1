<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace classes\media;

/**
 * Description of Media
 *
 * @author Elena
 */
class Media implements MediaInterface{
   private static $allMedia = 0;
    private $id;
    private $title;
    private $isCheckOut;
    private $ratings = [];
    public function __construct(string $title, bool $isCheckOut = false)
    {
        $this->title = $title;
        $this->isCheckOut = $isCheckOut;
        $this->id = 1 + self::$allMedia++;
    }
    public static function getMediaCount(): int
    {
        return self::$allMedia;
    }
    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }
    public function addRating(float $rating)
    {
        $this->ratings[] = $rating;
    }
    public function getRating(): float
    {
        try {
            $rating = array_sum($this->ratings) / \count($this->ratings);
        } catch (\DivisionByZeroError $e) {
             //Log division by 0 error.
            $rating = 0;
        } catch (\Exception $e) {
             //Log exception.
            $rating = 0;
        }
        return $rating;
    }
}
