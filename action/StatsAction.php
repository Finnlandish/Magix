<?php
require_once("action/CommonAction.php");
require_once("action/DAO/AnswerDAO.php");
class StatsAction extends CommonAction
{

    public function __construct()
    {
        parent::__construct(CommonAction::$VISIBILITY_MEMBER);
    }

    protected function executeAction()
    {
        $data["stat"] = AnswerDAO::getStats();
       
        return compact("data");
    }
}
