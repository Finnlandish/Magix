<?php
require_once("action/GameAction.php");

$action = new GameAction();
$data = $action->execute();

require_once("partial/header.php");
?>
<script defer src="./js/game.js"></script>
<script src="./js/chat.js"></script>
<script src="./js/music.js"></script>



<div class="game">
    <div id="error">
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
        <div class="enemyInfo" id="enemyInfo"></div>
        <div class="enemyAvatar" id="enemystats"></div>
        <div class="enemyAvatar" id="enemyAvatar"></div>

        <div class="area" id="enemydeck"></div>
        <div class="area" id="enemycardBox"></div>
        <div class="area" id="mycardBox"></div>
        <div class="area" id="mydeck"></div>
        <div class="area" id="mystats"></div>
    </div>
    <div class="myAvatar" id="myAvatar"></div>

    <button class="custom-btn btn-3" id="togglechat" onclick="togglechat()"><span>toggle chat</span></button>
    <button class="custom-btn btn-3" id="toggleinfo" onclick="toggleinfo()"><span>info</span></button>
    <div id="infoClass">
        <p>DemonHunter
            Hero Power : Deal 1 HP to the left+right most minions. 2 HP if 1 minion or 3 HP to the hero if no minion</p>
        <p>Warlock
            Hero Power : Leech 2 HP from the opponent's hero</p>
        <p>Hunter
            Hero Power : Draw 1 card</p>
        <p>Priest
            Hero Power : Give a random friendly minion +2 HP</p>
        <p>Warrior
            Hero Power : Spawn a 1/1 taunt minion</p>
        <p>Rogue
            Hero Power : Spawn a 1/1 minion with charge and stealth</p>
        <p>Paladin
            Hero Power : Spawn a 0/1 minion that randomly gives +1/+1 to a friendly minion at the start of your turn</p>
        <p>Shaman
            Hero Power : Spawn a 0/1 minion that deals 2 HP to the opponent's hero at the end of your turn</p>
        <p>Druid
            Hero Power : Spawn a 1/1 minion, restore 2 HP to your hero</p>
        <p>Mage
            Hero Power : Randomly deal 3 HP to enemies</p>
    </div>
    <div id="chat" class="gamechat">
        <iframe style="width:700px;height:240px;" onload="applyStyles(this)" src="https://magix.apps-de-cours.com/server/#/chat/<?= $_SESSION["key"] ?>">
        </iframe>

    </div>
</div>
<div class="button">
    <form action="" method="POST">
        <div class="custom-btn btn-3" id="surrender" name="surrender" onclick="surrender()"><span>surrender</span></div>
    </form>
</div>
<div class="button">
    <form action="" method="POST">
        <div class="custom-btn btn-3" id="endturn" name="endturn"><span>end-turn</span></div>
    </form>
</div>
<div class="button">
    <form action="" method="POST">
        <button class="custom-btn btn-3" id="backLobby" name="backLobby"><span>Return to lobby</span></button>
    </form>
</div>
<div class="custom-btn btn-3" id="heroPower" name="heroPower"><span>Hero Power</span></div>
</div>
<div id="battlemusic" class="custom-btn btn-3" onclick="playBattleMusic()"><span>Music</span></div>

<?php
require_once("partial/footer.php");
