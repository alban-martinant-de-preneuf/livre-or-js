<?php
require_once("./Classes/User.php");
session_start();

if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $user = new User($login, $password);
    $user->connect();
    header('Location: index.php');
}
?>

<form action="connection.php" method="post">
    <input type="text" name="login">
    <input type="password" name="password">
    <input type="submit" name="submit" id="submit_button">
</form>

<script src="./Scripts/connection.js"></script>