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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <script src="js/script.js" type="module"></script>
</head>
<body>
    <header>
        <h1>Books</h1>
    </header>
    <main>
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
                        <?php foreach ($bookList as $book): ?>
                            <tr>
                                <td><?=$book['author'] ?></td>
                                <td><?=$book['title'] ?></td>
                                <td><?=$book['language'] ?></td>
                                <td><?=$book['year'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Arturo Mora-Rioja</p>
    </footer>
</body>
</html>