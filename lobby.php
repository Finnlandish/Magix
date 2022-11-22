<?php
require_once("action/LobbyAction.php");

$action = new LobbyAction();
$data = $action->execute();

require_once("partial/header.php");

?>

<body>
    <script src="./js/chat.js"></script>
    <!-- <script src="./js/lobby.js"></script> -->

    <div class="lobby">
    <div class="lobbybutton">
            <form action="" method="post">
                <button type="submit" name="PVP" id="jouer" class="button"><a>Jouer</a> </button>
                <button type="submit" name="TRAINING" id="practice" class="button"><a>Pratique</a></button>
                <button type="submit" name="loggout" id="logout" class="button"> <a>Logout</a></button>
            </form>
            <div id="togglechat" class="button">
                <button id="togglechat" class="clickable" onclick="togglechat()"><a>Toggle chat</a></button>
            </div>

        </div>
        
        <?php
        if (!empty($data["messageErr"])) {
        ?>
            <div style="color:red;text-align:center">
                <?= $data["messageErr"] ?>
            </div>
        <?php
        }
        ?>
       
        <div id="chat" class="lobbychat">
            <iframe style="width:700px;height:562px;" onload="applyStyles(this)" src="https://magix.apps-de-cours.com/server/#/chat/<?= $_SESSION["key"] ?>/large">
            </iframe>
        </div>
        <div id="example" >
            <p id="test">x: , y:</p>
        </div>
        <div id="container" style="position: relative;"></div>

        <div class="welcomLobby">
            <h2>Welcome to Magix <?= $_SESSION["username"] ?></h2>
        </div>



    </div>
</body>
<?php
require_once("partial/footer.php");
