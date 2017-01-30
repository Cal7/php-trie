<?php

namespace cal7\trie;

class Node{

    private $character;
    private $isEndOfWord;
    private $children = [];

    public function __construct(string $character, bool $isEndOfWord)
    {
        $this->character = $character;
        $this->isEndOfWord = $isEndOfWord;
    }

    public function addChild(Node $node)
    {
        $this->children[$node->character] = $node;
    }

    public function hasChild(string $character)
    {
        return array_key_exists($character, $this->children);
    }

    public function getChild(string $character)
    {
        return $this->children[$character];
    }
}