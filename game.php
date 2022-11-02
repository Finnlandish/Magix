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
    
    <div class="board">
        <div class="enemystat"></div>
        <div class="cardbox">
            <div class="enemycards"></div>
            <div class="mycards"></div>
        </div>
        
        <div class="mydeck"></div>
        <div class="mystats">
            <!-- <div class="box child-to-body">
                <img src="pokeBannerGimp.png" width="250" alt="">
                <div class="poke_box">
                    <div class="pokeball">
                        <div class="pokeball__button"></div>
                    </div>
                </div> -->
                
            </div>
        </div>
        <div id="togglechat" class="btntogglechat"> <button id="togglechat" class="clickable" onclick="togglechat()">toggle chat</button> </div>

    <div id="chat" class="gamechat">
        <iframe style="width:700px;height:240px;" onload="applyStyles(this)" src="https://magix.apps-de-cours.com/server/#/chat/<?= $_SESSION["key"] ?>">
        </iframe>
    </div>
    <div id="togglechat" class="btntogglechat"> 
        <button class="surrender">surrender</button>
    </div>
    <div id="togglechat" class="btntogglechat"> 
        <button class="endturn">end-turn</button>
    </div>
    </div>
</div>

<?php
require_once("partial/footer.php");
