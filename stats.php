<?php
require_once("action/StatsAction.php");

$action = new StatsAction();
$data = $action->execute();
// $data["hasError"] 
// $data["user"] 
// $data contient les variables nécessaires à gérer l'interface graphique
require_once("partial/header.php");
?>
<script src="./js/music.js"></script>
<!-- <script src="./js/stats.js"></script> -->


<body class="stats">
    <div>

        <?php
        for ($i = 0; $i < count($data["data"]); $i++) {

        ?>
            <div>
                <span><?= implode($data["data"][$i]) ?></span>
            </div>


        <?php
        }
        ?>

    </div>
    <?php
    for ($i = 0; $i < count($data["data"]); $i++) {
        $s=implode($data["data"][$i]);
        
        $dataPoints = array(
            array($s => $i ),
            
        );
    }
    ?>
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                exportEnabled: true,
                theme: "light1", // "light1", "light2", "dark1", "dark2"
                title: {
                    text: "Simple Column Chart with Index Labels"
                },
                axisY: {
                    includeZero: true
                },
                data: [{
                    type: "column", //change type to bar, line, area, pie, etc
                    //indexLabel: "{y}", //Shows y value on all Data Points
                    indexLabelFontColor: "#5A5757",
                    indexLabelPlacement: "outside",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <button class="custom-btn btn-3" id="backLobby" name="backLobby" onclick="window.location='lobby.php';"><span>Return to lobby</span></button>
    <div id="music" class="custom-btn btn-3" onclick="playMusic()"> <span>Music</span></div>


    <?php
    require_once("partial/footer.php");
