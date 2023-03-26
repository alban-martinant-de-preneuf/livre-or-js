<?php
require_once("./Classes/User.php");
session_start();

if (isset($_POST['old_pwd']) && isset($_POST['new_pwd_confirm']) && isset($_POST['new_pwd'])) {
    $old_pwd = $_POST['old_pwd'];
    $old_pwd_confirm = $_POST['new_pwd_confirm'];
    $new_pwd = $_POST['new_pwd'];

    $_SESSION['LOGED_USER']->changePwd($old_pwd, $new_pwd);
}
?>

<section>
    <h3>Modifier le mot de passe</h3>
    <form action="profil.php" method="post">
        <label for="old_pwd">Ancien mot de passe</label>
        <input type="password" name="old_pwd" id="old_pwd"><br>
        <label for="new_pwd">Nouveau mot de passe</label>
        <input type="password" name="new_pwd" id="new_pwd"><br>
        <label for="new_pwd_confirm">confirmation nouveau mot de passe</label>
        <input type="password" name="new_pwd_confirm" id="new_pwd_confirm">
        <input type="submit" value="Valider">
    </form>
</section>