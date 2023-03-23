<nav>
    <ul>
        <?php if (!isset($_SESSION['LOGED_USER'])):?>
            <li id="connection_button">Se connecter</li>
            <li id="inscription_button">S'inscrire</li>
        <?php else:?>
            <li id="profil_button">Mon profil</li>
            <li id="disconnection_button">Se déconnecter</li>
            <li id="addcomment_button">Ajouter un commentaire</li>
        <?php endif?>
        <li id="livre-or">Livre d'or</li>
    </ul>
</nav>