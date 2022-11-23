<?php
require_once("action/IndexAction.php");

$action = new IndexAction();
$data = $action->execute();
// $data["hasError"] 
// $data["user"] 
// $data contient les variables nécessaires à gérer l'interface graphique

require_once("partial/header.php");
?>
<div class="login">

    <!-- <img id="pichu" src="img/Indexbg/pichu.png" alt=""> -->
    <img id="wooper" src="img/Indexbg/Wooper.png" alt="">
    <!-- <img id="eevee" src="img/Indexbg/pichu.png" alt=""> -->




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
        <form action="" method="POST">
            <div>
                <input type="text" name="username" class="champ" placeholder="Username">
            </div>

            <div>
                <input type="password" name="password" class="champ" placeholder="Password">
            </div>
            <Button type="submit" name="connexion" id="connect" class="custom-btn btn-3"><span>Connect</span></Button>

        </form>
    </div>

    <?php
    require_once("partial/footer.php");
