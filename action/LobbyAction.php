<?php
    require_once("action/CommonAction.php");
    class LobbyAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_MEMBER);
        }

        protected function executeAction() {
            $message = "";
            $key = [];

            if(isset($_POST["loggout"])){
                $key["key"] = $_SESSION["key"];
                $result = CommonAction::callAPI("signout", $key);
                $message = $result;
                    
                if($result == "SIGNED_OUT"){
                    $_SESSION["visibility"] = 0;
                    header("location:index.php");
                    exit;
                    echo"loggout";

                }
            }
            elseif (isset($_POST["PVP"])){
                $param["key"] = $_SESSION["key"];
                $param["type"] = "PVP";
                $param["mode"] = "STANDARD";
                $result = CommonAction::callAPI("games/auto-match", $param);

                if($result = "CREATED_PVP"||$result="JOINED_PVP"){
                    $_SESSION["visibility"] = 0;
                    
                    header("location:game.php");
                    exit;
                }
                
            }
            elseif (isset($_POST["PVE"])){
                $param["key"] = $_SESSION["key"];
                $param["type"] = "PVE";
                $param["mode"] = "STANDARD";
                $result = CommonAction::callAPI("games/auto-match", $param);
                
                if($result = "JOINED_TRAINING"){
                    $_SESSION["visibility"] = 0;
                    
                    header("location:game.php");
                    exit;
                }
            }
        
            return compact("message");
        }
            
    }