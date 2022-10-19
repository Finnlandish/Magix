<?php
    require_once("action/LobbyAction.php");

    $action = new LobbyAction();
    $data = $action->execute();

    require_once("partial/header.php");

?>
<body>
    <div class="lobby">
        <div>
            <h1>Welcome <?= $_SESSION["username"] ?> how can we help you</h1>
        </div>
        
        <div class="chat">
            <iframe style="width:700px;height:240px;" onload="applyStyles(this)"  
            src="https://magix.apps-de-cours.com/server/#/chat/<?= $_SESSION["key"]?>">
            </iframe>

        </div>
    </div>
</body>
<?php
    require_once("partial/footer.php");