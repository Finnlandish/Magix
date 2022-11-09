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
        <div class="action" id="timer"></div>
        <div class="area" id="enemystat"></div>
        <div class="area" id="cardbox">
            <div class="area" id="enemycards"></div>
            <div class="area" id="mycards"></div>
        </div>
        <div class="area" id="mydeck"></div>
        </div>
        <div class="area" id="mystats">

                <!-- <div class="box child-to-body">
                <img src="pokeBannerGimp.png" width="250" alt="">
                <div class="poke_box">
                    <div class="pokeball">
                        <div class="pokeball__button"></div>
                    </div>
                </div> -->
                
        </div>
        
        <div id="togglechat" class="btntogglechat"> <button id="togglechat" class="clickable" onclick="togglechat()">toggle chat</button> </div>

    <div id="chat" class="gamechat">
        <iframe style="width:700px;height:240px;" onload="applyStyles(this)" src="https://magix.apps-de-cours.com/server/#/chat/<?= $_SESSION["key"] ?>">
        </iframe>
    </div>
    <div> 
        <form action="" method="POST">
            <button class="surrender" name="surrender">surrender</button>
        </form>
    </div>
    <div > 
        <form action="" method="POST">
            <button class="endturn" name="endturn" type=submit>end-turn</button>
        </form>
    </div>
    </div>
</div>

<?php
require_once("partial/footer.php");
