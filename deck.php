<?php
    require_once("action/DeckAction.php");

    $action = new DeckAction();
    $data = $action->execute();

    require_once("partial/header.php");
?>
<script src="./js/music.js"></script>

    <div class="deck">
        <iframe style="height: 100vh;width:100vw;" src="https://magix.apps-de-cours.com/server/#/deck/<?= $_SESSION["key"]?>">
        </iframe>
    </div>
    <button class="custom-btn btn-3" id="backLobby" name="backLobby" onclick="window.location='lobby.php';"><span>Return to lobby</span></button>
    <div id="music" class="custom-btn btn-3" onclick="playMusic()"> <span>Music</span></div>

<?php
    require_once("partial/footer.php");