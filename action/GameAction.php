<?php
    require_once("action/CommonAction.php");
    
    class GameAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_MEMBER);
        }

        protected function executeAction() {
            $messageErr = "";
            $data = [];
            $data["key"] = $_SESSION["key"];

            if(isset($_POST["surrender"])){
                $data["key"] = $_SESSION["key"];
                $data["type"] = "SURRENDER";
                $result = CommonAction::callAPI("games/action", $data);
                if ($result == "SURRENDER") {
                    $data["key"] = $_SESSION["key"];
                    $data["type"] = "SURRENDER";
                    $messageErr = "";
                    $messageErr = $result;
                    header("location:lobby.php");
                    exit;
                }    
            
            }
            elseif(isset($_POST["endturn"])){
                $data["key"] = $_SESSION["key"];
                $data["type"] = "END_TURN";
                $result = CommonAction::callAPI("games/action", $data);
                if ($result == "INVALID_GAME_TYPE") {
                    $data["key"] = $_SESSION["key"];
                    $messageErr = "";
                    $messageErr = $result;
                }    
            
            }


            return compact("messageErr");
        }
    }