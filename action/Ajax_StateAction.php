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
                
            return compact("result");
        }
    }