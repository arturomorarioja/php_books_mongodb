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

    /**
     * Inserts a new book
     * 
     * @return ['status' => 'ok'] or ['error' => <error_message>]
     */
    public function add(string $author, string $title, string $language, int $year): array
    {
        if (trim($author) === '') {
            return ['error' => 'Author is mandatory'];
        }
        if (trim($title) === '') {
            return ['error' => 'Title is mandatory'];
        }
        try {
            $data = [
                'author' => $author,
                'title' => $title,
                'year' => $year
            ];
            $language = trim($language);
            if ($language !== '') {
                $data['language'] = $language;
            }
            $this->collection->insertOne($data);

            return ['status' => 'ok'];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}