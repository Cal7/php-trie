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
     * The node that this instance is a child of
     *
     * @var Node
     */
    private $parent;

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
     * Calculates the string formed when one starts at the root of the trie and traverses downwards to this node
     *
     * @return string
     */
    public function pathFromRoot()
    {
        if(is_null($this->getParent()))
        {
            return $this->getCharacter();
        }

        return $this->getParent()->pathFromRoot() . $this->getCharacter();
    }

    /**
     * @return string
     */
    public function getCharacter()
    {
        return $this->character;
    }

    /**
     * Returns whether the path to this node from the trie's root forms a valid word
     *
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
     * Adds $node to this node's list of children
     *
     * @param Node $node
     */
    public function addChild(Node $node)
    {
        $this->children[$node->character] = $node;

        $node->setParent($this);
    }

    /**
     * @return Node
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param Node $parent
     */
    public function setParent(Node $parent)
    {
        $this->parent = $parent;
    }
}