<?php
require_once("./Classes/User.php");

if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $password_confirm = htmlspecialchars($_POST['password_confirm']);

    if ($password === $password_confirm) {
        $user = new User($login, $password);
        if ($user->register()) {
            echo "Vous avez bien été inscrit";
        } else {
            echo "l'utilisateur existe déjà !";
        }
    } else {
        echo "Les mots de passe sont différents !!!";
    }
    header('Location: index.php');
}

?>

<form action="inscription.php" method="post">
    <input type="text" name="login">
    <input type="password" name="password">
    <input type="password" name="password_confirm">
    <input type="submit" name="submit" class="submit_button">
</form>