<?php
require_once("action/StatsAction.php");

$action = new StatsAction();
$data = $action->execute();
// $data["hasError"] 
// $data["user"] 
// $data contient les variables nécessaires à gérer l'interface graphique
require_once("partial/header.php");
?>

<body class="stats">
    <div>
        <?
        for ($x = 0; $x <= (sizeof($_SESSION["stats"])); $x++) {
 
        }
        ?>
        <div id="piechart"></div>

    </div>
    <button class="custom-btn btn-3" id="backLobby" name="backLobby" onclick="window.location='lobby.php';"><span>Return to lobby</span></button>


    <?php
    require_once("partial/footer.php");
