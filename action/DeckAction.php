<?php
require_once("action/CommonAction.php");

class DeckAction extends CommonAction
{

    public function __construct()
    {
        parent::__construct(CommonAction::$VISIBILITY_MEMBER);
    }

    protected function executeAction()
    {
        $messageErr = "";
        $data = [];
        $data["key"] = $_SESSION["key"];


        if (isset($_POST["deck"])){
            header("location:lobby.php");
            exit;   
        }
        return compact("messageErr");
    }
}
