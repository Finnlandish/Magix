<?php
require_once("action/GameAction.php");
require_once("action/GameAction.php");

$action = new GameAction();
$data = $action->execute();

require_once("partial/header.php");
?>
<script src="./js/game.js"></script>
<script src="./js/chat.js"></script>

<div class="game">
    <div class="">
        <?php
        if (!empty($data["message"])) {
        ?>
            <div style="color:red;text-align:center">
                <?= $data["message"] ?>
            </div>
        <?php
        }
        ?>
    </div>

    <div class="board" id="board">

        <div class="timer" id="timer"></div>

        <div class="enemystats" id="enemystats"></div>
        <div class="area" id="enemydeck"></div>
        <div class="area" id="enemycardBox"></div>
        <div class="area" id="mycardBox"></div>
        <div class="area" id="mydeck"></div>
        <div class="area" id="mystats"></div>


    </div>
    <div id="togglechat" class="btntogglechat"> <button id="togglechat" class="clickable" onclick="togglechat()">toggle chat</button> </div>

    <div id="chat" class="gamechat">
        <iframe style="width:700px;height:240px;" onload="applyStyles(this)" src="https://magix.apps-de-cours.com/server/#/chat/<?= $_SESSION["key"] ?>">
        </iframe>
    </div>
    <div>
        <form action="" method="POST">
            <button id="surrender" class="surrender" name="surrender">surrender</button>
        </form>
    </div>
    <div>
        <form action="" method="POST">
            <button class="endturn" name="endturn" type=submit>end-turn</button>
        </form>
    </div>
    <div>
        <form action="" method="POST">
            <button class="backLobby" name="backLobby" type=submit>backLobby</button>
        </form>
    </div>
    <div>
        <form action="" method="POST">
            <button  class="heroPower" id="heroPower" name="heroPower" type=submit>heroPower</button>
        </form>
    </div>
</div>
</div>

<?php
require_once("partial/footer.php");
