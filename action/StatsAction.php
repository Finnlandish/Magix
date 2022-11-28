<?php
require_once("action/CommonAction.php");
require_once("action/DAO/AnswerDAO.php");
require_once("action/DAO/Connection.php");

class StatsAction extends CommonAction
{

    public function __construct()
    {
        parent::__construct(CommonAction::$VISIBILITY_MEMBER);
    }

    protected function executeAction()
    {
        
        if (isset($_POST["clearBD"])) {
            AnswerDAO::clearBD();
            echo("awa");
            # code...
        }

        $connection = Connection::getConnection();

        $statement = $connection->prepare("SELECT COUNT(cardid) FROM stats GROUP BY cardid;");
        $cardid = $connection->prepare("SELECT cardid FROM stats GROUP BY cardid;");

        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $cardid->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute();
        $cardid->execute();

        $data = $statement->fetchAll();
        $dataId = $cardid->fetchAll();

        $_SESSION["stats"] = $data;
        $_SESSION["cardid"] = $dataId;





        return compact("dataId", "data");
    }
}
