<?php

namespace cal7\trie;

class Node{
    /**
     * The character that this node represents
     *
     * @var string
     */
    private $character;

    /**
     * Whether the path to this node from the trie's root forms a valid word
     *
     * @var bool
     */
    private $endOfWord;

    /**
     * This node's children
     *
     * @var array
     */
    private $children = [];

    /**
     * Node constructor.
     *
     * @param string $character
     * @param bool $isEndOfWord
     */
    public function __construct(string $character, bool $endOfWord)
    {
        $this->character = $character;
        $this->endOfWord = $endOfWord;
    }

    /**
     * Adds $node to this node's list of children
     *
     * @param Node $node
     */
    public function addChild(Node $node)
    {
        $this->children[$node->character] = $node;
    }

    /**
     * Returns whether or not this node has $character as a child
     *
     * @param string $character
     * @return bool
     */
    public function hasChild(string $character)
    {
        return array_key_exists($character, $this->children);
    }

    /**
     * Returns the child node identified by $character
     *
     * @param string $character
     * @return Node
     */
    public function getChild(string $character)
    {
        return $this->children[$character];
    }

    /**
     * @return bool
     */
    public function isEndOfWord()
    {
        return $this->endOfWord;
    }

    /**
     * Returns an array of this node's child nodes
     *
     * @return array
     */
    public function getChildren()
    {
        return $this->children;
    }
}