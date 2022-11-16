<?php
    require_once("action/CommonAction.php");

    class Ajax_StateAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
        }

        protected function executeAction() {
            $data = [];
            $data["key"] = $_SESSION["key"];
            $result ="";
            $result = CommonAction::callAPI("games/state", $data);
               
            if (!empty($_POST["type"])) {
				if ($_POST["type"] === "PLAY") {
                    $data = [];
                    $data["key"] = $_SESSION["key"];
                    $result ="";
                    $result = CommonAction::callAPI("games/action", $data);

                }
				
			}
             
            return compact("result");
        }
    }