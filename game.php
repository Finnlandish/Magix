<?php
    require_once("action/GameAction.php");

    $action = new GameAction();
    $data = $action->execute();

    require_once("partial/header.php");
?>
    <script src="js/game.js"></script>
<div>
    <button></button>
</div>
<?php
    require_once("partial/footer.php");