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

    public function getAll(): object
    {
        try {
            // $result = $collection->find(['author' => 'William Shakespeare']);
            // foreach ($result as $book) {
            //     echo $book['title'] . ' (' . $book['author'] . ', ' . $book['year'] . ')<br>';
            // }
            return $this->collection->find();
        } catch (Exception $e) {
            echo $e->getMessage();        
        }
    }
}