<?php

$authorFilter = $_GET['authors'] ?? '';

require_once 'src/book.php';
$books = new Book;
$authors = $books->getAuthors();

if ($authorFilter === '') {
    $list = $books->getAll();
} else {
    $list = $books->getByAuthor($authorFilter);
}

// echo '<pre>';
// print_r($list);
// echo '</pre>';

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
        <form action="index.php" method="GET" id="frmAuthor">
            <div>
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
        <section>
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
                    <?php foreach ($list as $book): ?>
                        <tr>
                            <td><?=$book['author'] ?></td>
                            <td><?=$book['title'] ?></td>
                            <td><?=$book['language'] ?></td>
                            <td><?=$book['year'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Arturo Mora-Rioja</p>
    </footer>
</body>
</html>