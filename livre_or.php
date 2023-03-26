<?php
require_once("./Classes/User.php");
require_once("./Classes/Comment.php");

session_start();
?>

<table>
    <tr>
        <th>Utilisateur<br>Date</th>
        <th>Commentaire</th>
    </tr>
    <?php Comment::displayComment(); ?>
    
</table>