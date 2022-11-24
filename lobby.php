<?php
require_once("action/LobbyAction.php");

$action = new LobbyAction();
$data = $action->execute();

require_once("partial/header.php");

?>
<script src="./js/chat.js"></script>
<script defer src="./js/lobby.js" type="module"></script>
<!-- Audio -->
<audio id="chanseyAudio">
        <source src="Sounds/PokeSound/Chansey.mp3" type="audio/mpeg">
</audio>
<audio id="musiclob1">
        <source src="Sounds/lobby/cool-jazz-loops-2641.mp3" type="audio/mpeg">
</audio>
<audio id="musiclob2">
        <source src="Sounds/lobby/lullaby-13005.mp3" type="audio/mpeg">
</audio>
<audio id="musiclob3">
        <source src="Sounds/lobby/lovely-time-13003.mp3" type="audio/mpeg">
</audio>
<audio id="musiclob4">
        <source src="Sounds/lobby/piano-bar-piano-lounge-background-chill-music-4178.mp3" type="audio/mpeg">
</audio>

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
            <button type="submit" name="deck" id="deck" class="custom-btn btn-3"> <span>Deck</span></button>
            <div id="music" class="custom-btn btn-3" onclick="playMusic()"> <span>Music</span></div>

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
    <div id="container"></div>
</div>

</body>
<?php
require_once("partial/footer.php");
