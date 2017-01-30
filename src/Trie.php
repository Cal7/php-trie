<?php

namespace cal7\trie;

use cal7\trie\Node;

class Trie{
    /**
     * The root node of the trie
     *
     * @var \cal7\trie\Node
     */
    private $root;

    /**
     * Trie constructor.
     */
    public function __construct()
    {
        $this->root = new Node("", false);
    }

    /**
     * Inserts the given string into this trie
     *
     * @param string $word
     */
    public function addWord(string $word)
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