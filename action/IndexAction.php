<?php
require_once("action/CommonAction.php");
class IndexAction extends CommonAction
{

    public function __construct()
    {
        parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
    }

    protected function executeAction() {
        $result = NULL;
        $data = [];
        $message = "";
        $username = "";
        if(isset($_POST["connexion"])){
            if(isset($_POST["username"])){
                if(isset($_POST["password"])){
                    $data["username"] = $_POST["username"];
                    $data["password"] = $_POST["password"];

                    $result = CommonAction::callAPI("signin", $data);
                    if ($result == "INVALID_USERNAME_PASSWORD"){
                        $message = "erreur mot de passe ou nom invalide";
                    }
                    else{
                        $key = $result->key;
                        $_SESSION["key"] = $key;
                        $_SESSION["username"] = $username;
                        $_SESSION["visibility"] = 1;
                        header("location:lobby.php");
                        exit;
                    }
                }else{
                    $message = "entrer un mot de passe";
                }
            }else{
                $message = "entrer un nom d'utilisateur";
            }
        }
        return compact("message");
    }
} 
