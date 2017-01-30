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

    /**
     * Returns whether or not $word is a valid word in this trie
     *
     * @param string $word
     * @return bool
     */
    public function hasWord(string $word)
    {
        $currentNode = $this->root;

        foreach(str_split($word) as $character)
        {
            if(!$currentNode->hasChild($character))
            {
                return false;
            }

            $currentNode = $currentNode->getChild($character);
        }

        return $currentNode->isEndOfWord();
    }

    /**
     * Given a path to a file containing a list of words, each on a new line, this creates a new Trie instance from those words
     *
     * @param string $path
     * @return Trie
     */
    public static function fromTextFile(string $path)
    {
        $trie = new Trie();

        $handle = fopen($path, "r");
        while(($word = fgets($handle)) !== false)
        {
            $trie->addWord($word);
        }
        fclose($handle);

        return $trie;
    }
}