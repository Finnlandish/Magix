<?php
    require_once("action/CommonAction.php");

    class Ajax_StateAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
        }
        protected function executeAction() {   
            $result ="";
            $data = [];

            if (!empty($_POST["type"])) {
				if ($_POST["type"] == "PLAY") {
                    $data["key"] = $_SESSION["key"];
                    $data["type"]= $_POST["type"];
                    $data["uid"]= $_POST["uid"];
                    $result = CommonAction::callAPI("games/action", $data);
                }
			}
            else{
                $data["key"] = $_SESSION["key"];
                $result = CommonAction::callAPI("games/state", $data);
            }
             
            return compact("result");
        }
    }