<?php
require_once("./Classes/User.php");
require_once("./Classes/Comment.php");

session_start();

if (isset($_POST['text'])) {
    $text = htmlspecialchars($_POST['text']);
    $comment = new Comment($text, $_SESSION['LOGED_USER']);
    $comment->register();
    header('Location: index.php');
}
?>

<form action="addComment.php" method="post">
    <textarea name="text"></textarea>
    <input type="submit" name="submit" class="submit_button">
</form>