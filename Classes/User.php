<?php
class User
{
    private static PDO $db;
    
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

    public function __construct(private string $name, private string $password, private ?int $id = null)
    {
        self::dbConnect();
    }

    public function getName()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function register()
    {
        // Vérifier que l'utilisateur n'existe pas
        $sqlQuery = "SELECT COUNT(login) FROM `utilisateurs` WHERE login = :login";
        $userCount = self::$db->prepare($sqlQuery);
        $userCount->execute([
            'login' => $this->name
        ]);
        $isUser = $userCount->fetchColumn() != 0 ? true : false;
        
        // Enregistrer l'utilisateur en base de donnée
        if (!$isUser) {
            $sqlQuery = "INSERT INTO `utilisateurs` (`login`,`password`) VALUES (:login,:password)";
            $insertUser = self::$db->prepare($sqlQuery);
            $insertUser->execute([
                'login' => $this->name,
                'password' => password_hash($this->password, PASSWORD_DEFAULT)
            ]);
            // Récupérer l'id de l'utilisateur
            $sqlQuery = "SELECT id FROM `utilisateurs` WHERE login = :login";
            $catchId = self::$db->prepare($sqlQuery);
            $catchId->execute([
                'login' => $this->name
            ]);
            $result = $catchId->fetchColumn();
            $this->id = $result;
            // Retourne true si l'utilisateur à été ajouter en DB, sinon false
            return true;
        } else {
            return false;
        }
    }

    public function connect()
    {
        // Vérifier que l'utilisateur existe avec ce mot de passe
        $sqlQuery = "SELECT login, password FROM utilisateurs WHERE login = :login";
        $getUser = self::$db->prepare($sqlQuery);
        $getUser->execute([
            'login' => $this->name
        ]);
        $fetch_assoc = $getUser->fetch(PDO::FETCH_ASSOC);
        $isRegisted = $fetch_assoc !== false;
        var_dump($fetch_assoc);
        // Si l'utilisateur existe et que le mot de passe est bon
        if ($isRegisted and password_verify($this->password,$fetch_assoc['password'])) {
            // Récupérer l'id de l'utilisateur
            $sqlQuery = "SELECT id FROM `utilisateurs` WHERE login = :login";
            $catchId = self::$db->prepare($sqlQuery);
            $catchId->execute([
                'login' => $this->name
            ]);
            $gettedId = $catchId->fetchColumn();
            $this->id = $gettedId;
            // Le mettre en session
            $_SESSION['LOGED_USER'] = $this;
            return true;
        } else {
            return false;
        }
    }

    public function changePwd(string $old_pwd, string $new_pwd)
    {
        var_dump($this);
        var_dump($old_pwd);
        var_dump($new_pwd);
        self::dbConnect();
        $sqlQuery = "SELECT password FROM utilisateurs WHERE login = :login";
        $getPwd = self::$db->prepare($sqlQuery);
        $getPwd->execute([
            'login' => $this->name
        ]);
        $gettedPwd = $getPwd->fetchColumn();
        if (password_verify($old_pwd, $gettedPwd)) {
            $sqlQuery = "UPDATE `utilisateurs` SET `password` = :password WHERE `id` = :id";
            $insertUser = self::$db->prepare($sqlQuery);
            $insertUser->execute([
                'password' => password_hash($new_pwd, PASSWORD_DEFAULT),
                'id' => $this->id
            ]);
        }
    }
}
