<?php
    require_once("action/LobbyAction.php");

    $action = new LobbyAction();
    $data = $action->execute();

    require_once("partial/header.php");

?>
<body>
    <script defer src="lobby.js"></script>
    <div class="lobby">
        <div>
            <h1>Welcome <?= $_SESSION["username"] ?></h1>
        </div>
        <div class="lobbybutton">
            <form action="" method="$_POST">
                <button type="submit" name="PVP" class="lbutton">Jouer</button>
            
                <button type="submit" name="PVE" class="lbutton">Pratique</button>
            
                <button type="submit" name="loggout" class="lbutton"> Quitter</button>
            </form>
        </div>
        <div class="chat">
            
            <iframe style="width:700px;height:562px;"onload="applyStyles(this)" 
            src="https://magix.apps-de-cours.com/server/#/chat/<?= $_SESSION["key"]?>/large">
            </iframe>
        </div>
    </div>
</body>
<?php
    require_once("partial/footer.php");