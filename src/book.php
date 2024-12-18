<?php

require_once 'connection.php';

Class Book extends Connection
{
    private object $collection;

    public function __construct()
    {
        parent::__construct();
        $this->collection = $this->client->bookdb->books;
    }

    /**
     * Returns all books
     */
    public function getAll(): array
    {
        try {
            return $this->collection->find()->toArray();
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    /**
     * Returns filtered books by author
     */
    public function getByAuthor(string $author): array
    {
        try {
            return $this->collection->find(['author' => $author])->toArray();
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    /**
     * Returns the list of authors
     */
    public function getAuthors(): array
    {
        try {
            return $this->collection->distinct('author');
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}