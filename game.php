<?php
    require_once("action/GameAction.php");

    $action = new GameAction();
    $data = $action->execute();

    require_once("partial/header.php");
?>

<?php
    require_once("partial/footer.php");