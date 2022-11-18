<?php
    require_once("action/CommonAction.php");

    class Ajax_StateAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
        }
        protected function executeAction() {   
            $result ="";
            $data = [];
            $errMessage="";

            if (!empty($_POST["type"])) {
				if ($_POST["type"] == "PLAY") {
                    $data["key"] = $_SESSION["key"];
                    $data["type"]= $_POST["type"];
                    $data["uid"]= $_POST["uid"];
                    $result = CommonAction::callAPI("games/action", $data);
                }
                elseif ($_POST["type"] == "ATTACK") {
                    $data["key"] = $_SESSION["key"];
                    $data["type"]= $_POST["type"];
                    $data["uid"]= $_POST["uid"];
                    $data["targetuid"]= $_POST["targetuid"];

                    $result = CommonAction::callAPI("games/action", $data);
                }
                elseif ($_POST["type"] == "HERO_POWER") {
                    $data["key"] = $_SESSION["key"];
                    $result = CommonAction::callAPI("games/action", $data);
                }
                elseif ($_POST["type"] == "END_TURN") {
                    $data["key"] = $_SESSION["key"];
                    $result = CommonAction::callAPI("games/action", $data);
                }
                elseif ($_POST["type"] == "SURRENDER") {
                    $data["key"] = $_SESSION["key"];
                    $result = CommonAction::callAPI("games/action", $data);
                }
                if($result=="INVALID_KEY"){
                    echo("INVALID_KEY");

                }else if($result=="INVALID_ACTION"){

                }else if($result=="ACTION_IS_NOT_AN_OBJECT"){

                }else if($result=="NOT_ENOUGH_ENERGY"){
                    
                }else if($result=="BOARD_IS_FULL "){

                }else if($result=="CARD_NOT_IN_HAND"){

                }else if($result=="CARD_IS_SLEEPING"){

                }else if($result=="MUST_ATTACK_TAUNT_FIRST"){

                }else if($result=="OPPONENT_CARD_NOT_FOUND"){

                }else if($result=="OPPONENT_CARD_HAS_STEALTH"){ 
                    
                }else if($result=="CARD_NOT_FOUND"){
                }
			}
          
            else{
                $data["key"] = $_SESSION["key"];
                $result = CommonAction::callAPI("games/state", $data);
                if($result=="WAITING"){
                    
                }else if($result=="LAST_GAME_WON"){
                    
                }else if($result=="LAST_GAME_LOST"){
                    
                }else if($result=="INVALID_KEY"){
                    
                }
            }
             
            return compact("result","errMessage");
        }
    }