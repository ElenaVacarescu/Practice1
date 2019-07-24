<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace classes\media;

/**
 * Description of Movie
 *
 * @author Elena
 */
class Movie extends Media{
    /**
     * Moves have additional runtime and director information
     * @var
     */
    private $runTime;
    private $director;
    /**
     * Movie constructor.
     * @param string $title
     * @param string $director
     * @param int $runtime
     * @param bool $isCheckOut
     */
    public function __construct(string $title, string $director, int $runtime, bool $isCheckOut = false)
    {
        parent::__construct($title, $isCheckOut);
        $this->director = $this->setProperName($director);
        $this->runTime = $runtime;
    }
    /**
     * Make director name look fancy. Change Full name into one with dot leaving only last name.
     *
     * @param string $directorName
     * @return string
     */
    private function setProperName(string $directorName): string
    {
        $names = explode(' ', $directorName);
        $nameCount = count($names) - 1;
        $properName = [];
        foreach ($names as $iteration => $partName) {
            // Check if it's last part and if so write whole name instead of short one.
            if ($nameCount === $iteration) {
                $properName[] = $partName;
                break;
            }
            $properName[] = $partName[0];
        }
        return implode('. ', $properName);
    }
    /**
     * @return mixed
     */
    public function getDirector()
    {
        return $this->director;
    }
    /**
     * @return mixed
     */
    public function getRunTime()
    {
        return $this->runTime;
    }
}
