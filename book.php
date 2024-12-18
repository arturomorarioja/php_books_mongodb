<?php

$author = $_POST['author'] ?? '';
$title = $_POST['title'] ?? '';

$error = false;
// POST request = add new book or delete book
if ($author !== '' && $title !== '') {
    $seeInfo = false;

    $language = $_POST['language'] ?? '';
    $year = $_POST['year'] ?? '';

    require_once 'src/book.php';

    $books = new Book;
    if (isset($_POST['delete'])) {
        $result = $books->delete($author, $title, $language, $year);
    } else {
        $result = $books->add($author, $title, $language, $year);
    }

    // If the insertion is successful, 
    // the user is redirected to the home page
    $error = isset($result['error']);
    if (!$error) {
        header('Location: index.php');
    }
// GET request = add new book or see book information
} else {
    $seeInfo = isset($_GET['a']);
    $author = trim($_GET['a'] ?? '');
    $title = trim($_GET['t'] ?? '');
    $language = trim($_GET['l'] ?? '');
    $year = trim($_GET['y'] ?? '');
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
                <input type="text" name="author" id="txtAuthor" required
                    value="<?=$author ?>" <?=$seeInfo ? 'readonly' : '' ?>>
            </div>
            <div>
                <label for="txtTitle">Title</label>
                <input type="text" name="title" id="txtTitle" required
                    value="<?=$title ?>" <?=$seeInfo ? 'readonly' : '' ?>>
            </div>
            <div>
                <label for="txtLanguage">Language</label>
                <input type="text" name="language" id="txtLanguage"
                    value="<?=$language ?>" <?=$seeInfo ? 'readonly' : '' ?>>
            </div>
            <div>
                <label for="txtYear">Year</label>
                <input type="text" name="year" id="txtYear" pattern="[0-9]{4}"
                    value="<?=$year ?>" <?=$seeInfo ? 'readonly' : '' ?>>
            </div>
            <?php if ($seeInfo): ?>
                <input type="hidden" name="delete">
            <?php endif; ?>
            <div>
                <button type="submit"><?=$seeInfo ? 'Delete' : 'Add' ?></button>
            </div>
        </form>
<?php 
include 'views/footer.php'; 
?>