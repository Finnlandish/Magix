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
        $param = [];
        $data["username"] = !empty($_SESSION["username"]);


        if (isset($_POST["loggout"])) {
            $param["key"] = $_SESSION["key"];
            $result = CommonAction::callAPI("signout", $param);
            $messageErr = $result;

            if ($result == "SIGNED_OUT") {
                $_SESSION["visibility"] = 0;
                header("location:index.php");
                exit;
            }
        } else if (isset($_POST["PVP"])) {
            $param["key"] = $_SESSION["key"];
            $param["type"] = "PVP";
            $result = CommonAction::callAPI("games/auto-match", $param);

            if ($result == "CREATED_PVP" || $result = "JOINED_PVP") {

                header("location:game.php");
                exit;
            } elseif ($result == "INVALID_KE") {

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
        } else if (isset($_POST["TRAINING"])) {
            $param = [];
            $param["key"] = $_SESSION["key"];
            $param["type"] = "TRAINING";
            $result = CommonAction::callAPI("games/auto-match", $param);
            $messageErr = $result;

            if ($result == "JOINED_TRAINING") {

                header("location:game.php");
                exit;
            } elseif ($result == "INVALID_KE") {

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
        }
        return compact("messageErr");
    }
}
