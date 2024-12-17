<?php

require_once 'src/book.php';
$books = new Book;
$list = $books->getAll();

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
</head>
<body>
    <header>
        <h1>Books</h1>
    </header>
    <main>
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