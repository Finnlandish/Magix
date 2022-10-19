<?php
    require_once("action/CommonAction.php");
    
    class GameAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
        }

        protected function executeAction() {
            
            if(isset($_POST["loggout"])){
                $key["key"] = $_SESSION["key"];
                $result = CommonAction::callAPI("games/state", $key);
                    
                if($result == "SIGNED_OUT"){
                    $_SESSION["visibility"] = 0;
                    header("location:index.php");
                    exit;
                    echo("loggout");

                }
            }


            return [];
        }
    }