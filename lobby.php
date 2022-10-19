<?php
    require_once("action/LobbyAction.php");

    $action = new LobbyAction();
    $data = $action->execute();

    require_once("partial/header.php");

?>
<body>
    <div class="lobby">
        <div>
            <h1>Welcome <?= $_SESSION["username"] ?></h1>
        </div>
        <div class="lbutton">
            <form action="" method="$_POST">
                <button style.display = "block" type="submit" name="play" class="lButton">Jouer</button>
            </form>
            <form action="" method="$_POST">
                <button style.display = "block" type="submit" name="practice" class="lButton">Pratique</button>
            </form>
            <form action="" method="$_POST">
                <button style.display = "block" type="submit" name="deconnect" class="lButton"><a href="Index.php">Quitter</a> </button>
            </form>
        </div>
        <div class="chat">
            <iframe style="width:700px;height:240px;" onload="applyStyles(this)"  
            src="https://magix.apps-de-cours.com/server/#/chat/<?= $_SESSION["key"]?>">
            </iframe>
            <!-- <iframe style="width:700px;height:562px;" 
            src="https://magix.apps-de-cours.com/server/#/chat//<?= $_SESSION["key"]?>/large">
            </iframe> -->

        </div>
    </div>
</body>
<?php
    require_once("partial/footer.php");