<?php
    require_once("action/Ajax_StateAction.php");

    $action = new Ajax_StateAction();
    $data = $action->execute();

    echo json_encode($data["result"]);