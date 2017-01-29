<?php

namespace cal7\trie;

class Node{
    private $character;
    private $isEndOfWord;
    private $children = [];

    public function __construct($character, $isEndOfWord)
    {
        $this->character = $character;
        $this->isEndOfWord = $isEndOfWord;
    }

    public function addChild($node)
    {
        $this->children[$node->character] = $node;
    }
}