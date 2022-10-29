<?php
    require_once("action/CommonAction.php");
    class LobbyAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_MEMBER);
        }

        protected function executeAction() {
            $message = "";
            $param = [];


            if(isset($_POST["loggout"])){
                $param["key"] = $_SESSION["key"];
                $result = CommonAction::callAPI("signout", $param);
                $message = $result;
               
                if($result == "SIGNED_OUT"){
                    $_SESSION["visibility"] = 0;
                    header("location:index.php");
                    exit;
                }
            }
            else if (isset($_POST["PVP"])){
                $param["key"] = $_SESSION["key"];
                $param["type"] = "PVP";
                $param["mode"] = "STANDARD";
                $result = CommonAction::callAPI("games/auto-match", $param);

                if($result == "CREATED_PVP"||$result="JOINED_PVP"){
                    
                    header("location:game.php");
                    exit;
                }
                
            }
            else if (isset($_POST["PVE"])){
                $param=[];
                $param["key"] = $_SESSION["key"];
                $param["type"] = "PVE";
                $result = CommonAction::callAPI("games/auto-match", $param);
                $message = $result;

                    header("location:game.php");
                    exit;
            

            }
        
            return compact("message");
        }
            
    }