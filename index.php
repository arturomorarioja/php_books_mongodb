<?php

require_once 'src/book.php';
$books = new Book;
$authors = $books->getAuthors();

$authorFilter = $_GET['authors'] ?? '';
if ($authorFilter === '') {
    $bookList = $books->getAll();
} else {
    $bookList = $books->getByAuthor($authorFilter);
}

$pageTitle = 'Books';
include 'views/header.php';
?>
        <nav>
            <p>
                <a href="book.php" title="Add new book">Add</a>
            </p>
        </nav>
        <?php if (isset($authors['error'])): ?>
            <p>There was an error while retrieving the list of authors: <?=$authors['error'] ?></p>
        <?php else: ?>
            <form action="index.php" method="GET" id="frmAuthor">
                <div>
                    <label for="cmbAuthor">Filter by author</label>
                    <select name="authors" id="cmbAuthor">
                        <option></option>
                        <?php foreach ($authors as $author): ?>
                            <option 
                            <?=$author === $authorFilter ? 'selected' : '' ?>>
                            <?=$author ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </form>
        <?php endif; ?>
        <section>
            <?php if (isset($bookList['error'])): ?>
                <p>There was an error while retrieving the list of books: <?=$bookList['error'] ?></p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Language</th>
                            <th>Year</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($bookList as $book) {
                                $author = $book['author'];
                                $title = $book['title'];
                                $language = $book['language'];
                                $year = $book['year'];
                        ?>
                            <tr>
                                <td><?=$author ?></td>
                                <td>
                                    <a href="book.php?a=<?=$author ?>&t=<?=$title ?>&l=<?=$language ?>&y=<?=$year ?>">
                                        <?=$title ?>
                                    </a>
                                </td>
                                <td><?=$language ?></td>
                                <td><?=$year ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </section>
<?php 
include 'views/footer.php'; 
?>