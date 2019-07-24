<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace classes\media;

/**
 * Description of Book
 *
 * @author Elena
 */
class Book extends Media{
    /**
     * Books have additional pages count
     * @var int
     */
    private $pages;
    /**
     * Book constructor.
     * @param string $title
     * @param int $pages
     * @param bool $isCheckOut
     */
    public function __construct(string $title, int $pages, bool $isCheckOut = false)
    {
        parent::__construct($title, $isCheckOut);
        $this->pages = $pages;
    }
    /**
     * Return pages count
     * @return int
     */
    public function getPages(): int
    {
        return $this->pages;
    }
}
