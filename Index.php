<?php
require_once("action/IndexAction.php");

$action = new IndexAction();
$data = $action->execute();
// $data["hasError"] 
// $data["user"] 
// $data contient les variables nécessaires à gérer l'interface graphique

require_once("partial/header.php");
?>
<script defer src="./js/index.js" type="module"></script>
<script src="./js/music.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script defer src="./js/hunter.js"></script>


<div class="login">
    <div id="indexlayer2"></div>
    <audio id="welcomeAudio">
        <source src="Sounds/index/welcome.mp3" type="audio/mpeg">
    </audio>
    <audio id="wooperAudio">
        <source src="Sounds/PokeSound/wooper.mp3" type="audio/mpeg">
    </audio>

    <div class="welcomeIndex">
        <h2>Magix Arena</h2>
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
    <div class="box">
        <form action="" method="POST" onsubmit="setnom()">
            <div>
                <input type="text" name="username" class="champ" placeholder="Username">
            </div>

            <div>
                <input type="password" name="password" class="champ" placeholder="Password">
            </div>
            <Button type="submit" name="connexion" id="connect" class="custom-btn btn-3" onclick="setnom()" onsubmit="setnom()"><span>Connect</span></Button>

        </form>

    </div>
    <div id="welcomePlay" class="custom-btn btn-3"><span>Info</span></div>
    <div id="music" class="custom-btn btn-3" onclick="playMusic()"> <span>Music</span></div>

    <div id="containerSarters" class="containerSarters"></div>

    <div id="foo">
        <div id="bee1"></div>
    </div>
    <?php
    require_once("partial/footer.php");
