<?php
require_once("action/CommonAction.php");
class LobbyAction extends CommonAction
{

    public function __construct()
    {
        parent::__construct(CommonAction::$VISIBILITY_MEMBER);
    }

    protected function executeAction()
    {
        $messageErr = "";
        $data = [];
        $data["username"] = !empty($_SESSION["username"]);


        if (isset($_POST["loggout"])){
            $data["key"] = $_SESSION["key"];
            $result = CommonAction::callAPI("signout", $data);
            $messageErr = $result;

            if ($result == "SIGNED_OUT") {
                $_SESSION["visibility"] = 0;
                header("location:index.php");
                exit;
            }
        } else if (isset($_POST["PVP"])){
            $data["key"] = $_SESSION["key"];
            $data["type"] = "PVP";
            $result = CommonAction::callAPI("games/auto-match", $data);

            if ($result == "CREATED_PVP" || $result = "JOINED_PVP") {

                header("location:game.php");
                exit;
            } elseif ($result == "INVALID_KEY") {

                $messageErr = "";
                $messageErr = $result;
            } elseif ($result == "INVALID_GAME_TYPE") {

                $messageErr = "";
                $messageErr = $result;
            } elseif ($result == "DECK_INCOMPLETE") {
                $messageErr = "";
                $messageErr = $result;
            } elseif ($result == "MAX_DEATH_THRESHOLD_REACHED") {
                $messageErr = "";
                $messageErr = $result;
            }
        } else if (isset($_POST["TRAINING"])){
            $data["key"] = $_SESSION["key"];
            $data["type"] = "TRAINING";
            $result = CommonAction::callAPI("games/auto-match", $data);
            $messageErr = $result;
            
            if ($result == "JOINED_TRAINING") {

                header("location:game.php");
                exit;
            } 
        }
        
        return compact("messageErr");
    }
}
