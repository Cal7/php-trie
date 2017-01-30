<?php

namespace cal7\trie;

use cal7\trie\Node;

class Trie{
    private $root;

    public function __construct()
    {
        $this->root = new Node("", false);
    }

    public function addWord($word)
    {
        $currentNode = $this->root;

        foreach(str_split($word) as $index => $character)
        {
            if(!$currentNode->hasChild($character))
            {
                $isEndOfWord = ($index === strlen($word) - 1);

                $currentNode->addChild(new Node($character, $isEndOfWord));
            }

            $currentNode = $currentNode->getChild($character);
        }
    }
}