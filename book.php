<?php

$author = $_POST['author'] ?? '';
$title = $_POST['title'] ?? '';
$language = $_POST['language'] ?? '';
$year = $_POST['year'] ?? '';

$error = false;
if ($author !== '' && $title !== '') {
    require_once 'src/book.php';

    $books = new Book;
    $result = $books->add($author, $title, $language, $year);

    // If the insertion is successful, 
    // the user is redirected to the home page
    $error = isset($result['error']);
    if (!$error) {
        header('Location: index.php');
    }
}

$pageTitle = 'New book';
include 'views/header.php';

?>
        <nav>
            <p>
                <a href="index.php" title="Homepage">Home</a>
            </p>
        </nav>
        <?php if ($error): ?>
            <p>There was an error while trying to add a new book: <?=$result['error'] ?></p>
        <?php endif; ?>
        <form action="book.php" method="POST">
            <div>
                <label for="txtAuthor">Author</label>
                <input type="text" name="author" id="txtAuthor" required>
            </div>
            <div>
                <label for="txtTitle">Title</label>
                <input type="text" name="title" id="txtTitle" required>
            </div>
            <div>
                <label for="txtLanguage">Language</label>
                <input type="text" name="language" id="txtLanguage">
            </div>
            <div>
                <label for="txtYear">Year</label>
                <input type="text" name="year" id="txtYear" pattern="[0-9]{4}">
            </div>
            <div>
                <button type="submit">Add</button>
            </div>
        </form>
<?php 
include 'views/footer.php'; 
?>