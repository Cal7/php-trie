<?php

namespace cal7\trie\Trie;

use cal7\trie\Node;

class Trie{
    private $root;

    public function __construct()
    {
        $this->root = new Node("", false);
    }
}