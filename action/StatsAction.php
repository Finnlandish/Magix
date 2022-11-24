<?php
    require_once("action/CommonAction.php");
    require_once("action/DAO/AnswerDAO.php");
    class StatsAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_MEMBER);
        }

        protected function executeAction() {

            $answers = AnswerDAO::getAnswers();

            return compact("answers");

            if (isset($_POST["text"])) {
                # code...
                $reponce = AnswerDAO::addCard($_POST["card"]);

                return compact("reponce");
            }
            
        }
    }