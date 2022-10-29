<?php
    require_once("action/LobbyAction.php");

    $action = new LobbyAction();
    $data = $action->execute();

    require_once("partial/header.php");

?>
<body>
    <script src="lobby.js"></script>
    <div class="lobby">
        <div>
            <h1>Welcome <?= $data["username"] ?></h1>
        </div>
        <div class="lobbybutton">
            <form action="" method="post">
                <button type="submit" name="PVP" class="lbutton">Jouer</button>
            </form>
            <form action="" method="post">
                <button type="submit" name="PVE" class="lbutton">Pratique</button>
            </form>
            <form action="" method="post">
                <button type="submit" name="loggout" class="lbutton"> Quitter</button>
            </form>
        </div>
        <div class="gamechat">
            <iframe style="width:700px;height:240px;" onload="applyStyles(this)" 
            src="https://magix.apps-de-cours.com/server/#/chat/<?= $_SESSION["key"]?>">
            </iframe>

        </div>
    </div>
</body>
<?php
    require_once("partial/footer.php");