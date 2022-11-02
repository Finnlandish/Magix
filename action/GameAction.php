<?php
    require_once("action/CommonAction.php");
    
    class GameAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_MEMBER);
        }

        protected function executeAction() {
            $messageErr = "";
            $param = [];
            if(isset($_POST["surrender"])){
                $param["key"] = $_SESSION["key"];
                $param["type"] = "SURRENDER";
                $result = CommonAction::callAPI("games/action", $param);
                if ($result == "INVALID_GAME_TYPE") {
                    $param["key"] = $_SESSION["key"];
                    $param["type"] = "SURRENDER";
                    $messageErr = "";
                    $messageErr = $result;
                    header("location:lobby.php");
                    exit;
                }    
            
            }
            elseif(isset($_POST["endturn"])){
                $param["key"] = $_SESSION["key"];
                $param["type"] = "END_TURN";
                $result = CommonAction::callAPI("games/action", $param);
                if ($result == "INVALID_GAME_TYPE") {
                    $param["key"] = $_SESSION["key"];
                    $param["type"] = "SURRENDER";
                    $messageErr = "";
                    $messageErr = $result;
                }    
            
            }


            return [];
        }
    }