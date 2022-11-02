<?php
    require_once("action/CommonAction.php");

    class Ajax_StateAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
        }

        protected function executeAction() {
            $param = [];
            $param["key"] = $_SESSION["key"];
            $result ="";
            $result = CommonAction::callAPI("games/state", $param);
               
            if($result == "WAITING"){
                $messageErr = "";
                $messageErr = "En attente d’un autre joueur";

            }
            elseif($result == "LAST_GAME_WON"){
                $messageErr = "";
                $messageErr = "La partie n’existe plus, mais la dernière partie jouée a été gagnée";

            }
            elseif($result == "LAST_GAME_LOST"){
                $messageErr = "";
                $messageErr = "La dernière partie n’existe plus et vous l’aviez perdue";

            }    
            return compact("result");
        }
    }