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
        if (!empty($data["messageErr"])) {
        ?>
            <div style="color:red;text-align:center">
                <?= $data["messageErr"] ?>
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
    <button class="custom-btn btn-3" id="togglechat" onclick="togglechat()"><span>toggle chat</span></button>

    <div id="chat" class="gamechat">
        <iframe style="width:700px;height:240px;" onload="applyStyles(this)" src="https://magix.apps-de-cours.com/server/#/chat/<?= $_SESSION["key"] ?>">
        </iframe>

    </div>
</div>
<div class="button">
    <form action="" method="POST">
        <button class="custom-btn btn-3" id="surrender" name="surrender"><span>surrender</span></button>
    </form>
</div>
<div class="button">
    <form action="" method="POST">
        <button class="custom-btn btn-3" id="endturn" name="endturn"><span>end-turn</span></button>
    </form>
</div>
<div class="button">
    <form action="" method="POST">
        <button class="custom-btn btn-3" id="backLobby" name="backLobby"><span>Return to lobby</span></button>
    </form>
</div>
<button class="custom-btn btn-3" id="heroPower" name="heroPower"><span>Hero Power</span></button></div>

<?php
require_once("partial/footer.php");
