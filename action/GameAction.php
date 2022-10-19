<?php
    require_once("action/CommonAction.php");
    
    class GameAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
        }

        protected function executeAction() {
            
            if(isset($_POST["etat"])){
                $key["key"] = $_SESSION["key"];
                $result = CommonAction::callAPI("games/action", $key);
                    
                if($result == "WAITING"){
                   

                    exit;
                }
                if($result == "LAST_GAME_WON"){
                   

                    exit;
                }
                if($result == "LAST_GAME_LOST"){
                   

                    exit;
                }
            }


            return [];
        }
    }