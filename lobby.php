<?php
require_once("action/LobbyAction.php");

$action = new LobbyAction();
$data = $action->execute();

require_once("partial/header.php");

?>
<script src="./js/chat.js"></script>
<script src="./js/music.js"></script>

<script defer src="./js/lobby.js" type="module"></script>
<script defer src="./js/pokemonPicker.js" type="module"></script>
<!-- Audio -->
<audio id="chanseyAudio">
    <source src="Sounds/PokeSound/Chansey.mp3" type="audio/mpeg">
</audio>
<audio id="squirtleAudio">
    <source src="Sounds/PokeSound/squirtleSound.mp3" type="audio/mpeg">
</audio>
<audio id="bulbasaurAudio">
    <source src="Sounds/PokeSound/bulbasaurSound.mp3" type="audio/mpeg">
</audio>
<audio id="charmanderAudio">
    <source src="Sounds/PokeSound/charmanderSound.mp3" type="audio/mpeg">
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
    <div id="rightStair"></div>
    <div id="leftStair"></div>

    <?php
    if (!empty($data["messageErr"])) {
    ?>
        <div id="error">
            <?= $data["messageErr"] ?>
        </div>
    <?php
    }
    ?>

    <div id="chat" class="lobbychat">
        <iframe style="width:700px;height:562px;" onload="applyStyles(this)" src="https://magix.apps-de-cours.com/server/#/chat/<?= $_SESSION["key"] ?>/large">
        </iframe>
    </div>
    <div id="layer2"></div>
    <div id="container"></div>
    <div id="containerSarters"></div>
    <div id="pokesound"></div>

</div>
<?php
require_once("partial/footer.php");
