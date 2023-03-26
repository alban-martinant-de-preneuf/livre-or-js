<?php

require_once("./Classes/User.php");

class Comment
{
    private static PDO $db;
    private DateTime $date;
    private ?int $comment_id;

    private static function dbConnect()
    {
        // Connection à la base de donnée
        try {
            self::$db = new PDO(
                'mysql:host=localhost;dbname=livreor;charset=utf8',
                'root',
                ''
            );
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function __construct(
        private string $text,
        private User $user,
    ) {
        self::dbConnect();
    }

    public function register()
    {
        $sqlQuery = "INSERT INTO `commentaires` (`commentaire`,`id_utilisateur`, `date`) VALUES (:commentaire,:id_utilisateur, NOW())";
        $insertUser = self::$db->prepare($sqlQuery);
        $insertUser->execute([
            'commentaire' => $this->text,
            'id_utilisateur' => $this->user->getId()
        ]);
    }

    public function edit(string $text, User $user)
    {
        if ($this->user == $user) {
            $this->text = $text;
            $sqlQuery = "UPDATE commentaires SET `commentaire` = :commentaire WHERE `id` = :id";
            $insertUser = self::$db->prepare($sqlQuery);
            $insertUser->execute([
                'commentaire' => $this->text,
                'id' => $this->comment_id
            ]);
        }
    }

    public static function displayComment()
    {
        $sqlQuery = "SELECT commentaires.commentaire, commentaires.date, utilisateurs.login FROM commentaires JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id";
        self::dbConnect();
        $takeComments = self::$db->prepare($sqlQuery);
        $takeComments->execute();        
        while ($comment = $takeComments->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>" .
                        $comment['login'] . "<br>" . $comment['date'] .
                    "</td>
                    <td>" .
                        $comment['commentaire'] .
                    "</td>
                </tr>";
        }
    }
}
