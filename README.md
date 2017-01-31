# php-trie
A PHP package to facilitate usage of the trie data structure.

Allows the insertion and lookup of words, generation from a text file, and a search feature for Scrabble-like games

## Word insertion
Word insertion is as easy as:
```php
$trie = new Trie();
$trie->addWord("example");
```

Or if you have a text file containing a list of words (each on a newline), either locally or online, you can use:
```php
$trie1 = Trie::fromTextFile("/local/path/to/file.txt");
$trie2 = Trie::fromTextFile("https://example.com/file.txt");
```

## Word finding
This package offers a feature useful for many Scrabble-related applications - word finding. The following snippet showcases this:
```php
$trie = new Trie();
$trie->addWords([
  "example",
  "test",
  "tested",
  "testing"
]);
$letters = ["t", "e", "s", "t"];
$wildcardCount = 2; //represents a "blank" tile in the game of Scrabble
$trie->findWords($letters, $wildcardCount); //returns ["test", "tested"]
```
