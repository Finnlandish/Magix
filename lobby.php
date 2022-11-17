<?php
require_once("action/LobbyAction.php");

$action = new LobbyAction();
$data = $action->execute();

require_once("partial/header.php");

?>

<body>
    <script src="./js/chat.js"></script>
    <div class="lobby">
        <div>
            <h1>Welcome To Magix <?= $_SESSION["username"] ?></h1>
        </div>
        <?php
        if (!empty($data["message"])) {
        ?>
            <div style="color:red;text-align:center">
                <?= $data["message"] ?>
            </div>
        <?php
        }
        ?>
        <div class="lobbybutton">
            <form action="" method="post">
                <button type="submit" name="PVP" class="lbutton">Jouer</button>
                <button type="submit" name="TRAINING" class="lbutton">Pratique</button>
                <button type="submit" name="loggout" class="lbutton"> Quitter</button>
            </form>
            <div id="togglechat" class="btntogglechat">
                <button id="togglechat" class="clickable" onclick="togglechat()">toggle chat</button>
            </div>

        </div>
        <div id="chat" class="lobbychat">
            <iframe style="width:700px;height:562px;" src="https://magix.apps-de-cours.com/server/#/chat/<?= $_SESSION["key"] ?>/large">
            </iframe>

        </div>
    </div>
</body>
<?php
require_once("partial/footer.php");
