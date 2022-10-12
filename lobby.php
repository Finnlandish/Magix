<?php
    require_once("action/LobbyAction.php");

    $action = new LobbyAction();
    $data = $action->execute();

    require_once("partial/header.php");
?>
<body>
    <main>
        
        <div id="chat">
            <iframe style="width:700px;height:240px;" onload="applyStyles(this)"  
            src="https://magix.apps-de-cours.com/server/#/chat/<?= $_SESSION["key"]?>">
            </iframe>

        </div>
    </main>
</body>
<?php
    require_once("partial/footer.php");