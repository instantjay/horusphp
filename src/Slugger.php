<?php

namespace instantjay\horusphp;

use Cocur\Slugify\Slugify;

class Slugger {
    protected $slugger;

    public function __construct() {
        $this->slugger = new Slugify();
    }

    public function createSlug($string) {
        return $this->slugger->slugify($string);
    }
}