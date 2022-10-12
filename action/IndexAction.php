<?php
    require_once("action/CommonAction.php");
    class IndexAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
        }

        protected function executeAction() {
            $hasConnectionError = false;
            $message = "";
            $data = [];
            if (isset($_POST["connexion"])){
                if (isset($_POST["username"])){
                    if (isset($_POST["password"])){
                        $result = parent::callAPI("signin", $data);
                    
                        if ($result == "INVALID_USERNAME_PASSWORD") {
                            // err
                            $message = "Error please try again";
                        }
                        else {
                            // Pour voir les informations retournées : var_dump($result);exit;
                            $key = $result->key;
                            $_SESSION["key"]=$key;
                            
            
                            header("location:lobby.php");
                        }
                    }
                }
            }
        }
    }