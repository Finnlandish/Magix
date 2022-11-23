<?php
require_once("action/LobbyAction.php");

$action = new LobbyAction();
$data = $action->execute();

require_once("partial/header.php");

?>
<script src="./js/chat.js"></script>
<!-- <script src="./js/lobby.js"></script> -->
<div class="welcomLobby">
    <h2>Welcome to Magix <?= $_SESSION["username"] ?></h2>
</div>
<div class="lobby">
    <div class="lobbybutton">
        <form action="" method="post">
            <button type="submit" name="PVP" id="jouer" class="custom-btn btn-3"><span>PVP</span> </button>
            <button type="submit" name="TRAINING" id="practice" class="custom-btn btn-3"><span>Pratique</span></button>
            <button type="submit" name="loggout" id="logout" class="custom-btn btn-3"> <span>Logout</span></button>
            <button type="submit" name="Stats" id="stats" class="custom-btn btn-3"> <span>Stats</span></button>

        </form>

        <button type="submit" id="togglechat" class="custom-btn btn-3" onclick="togglechat()"><span>Toggle chat</span></button>


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
    <div id="example">
        <p id="test">x: , y:</p>
    </div>
    <div id="container" style="position: relative;"></div>

    <!-- <div class="chansey"><a href="https://pokemondb.net/pokedex/blissey"><img src="https://img.pokemondb.net/sprites/black-white/anim/normal/blissey.gif" alt="Blissey"></a></div> -->

</div>

</body>
<?php
require_once("partial/footer.php");
