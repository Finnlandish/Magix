<?php
    require_once("action/GameAction.php");

    $action = new GameAction();
    $data = $action->execute();

    require_once("partial/header.php");
?>
    <script src="./js/game.js"></script>
    <script src="./js/chat.js"></script>
<div class="game">
    <div class="">

    </div>
    <div id="togglechat" class="clickable">toggle chat</div>
    <div id="chat" class="chat">
        <iframe style="width:700px;height:240px;" onload="applyStyles(this)" 
        src="https://magix.apps-de-cours.com/server/#/chat/<?= $_SESSION["key"]?>">
        </iframe>
    </div>
</div>
    
<?php
    require_once("partial/footer.php");