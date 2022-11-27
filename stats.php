<?php
require_once("action/StatsAction.php");
require_once("action/DAO/AnswerDAO.php");

$action = new StatsAction();
$data = $action->execute();
// $data["hasError"] 
// $data["user"] 
// $data contient les variables nécessaires à gérer l'interface graphique
require_once("partial/header.php");
?>
<link rel="stylesheet" href="css/stats.less">

<script src="./js/music.js"></script>
<script defer src="./js/stats.js"></script>


<body class="stats">
<div class="ui">
  <p class="zoom"><span class="zoom zoomin">+</span><span class="zoom zoomout">-</span></p>
  <p class="zoomlevel"><span class="percent">100</span> % - (<span class="width"></span>px)(<span class="height"></span>px)</p>
  <p>Dead: <span class="dead">0</span></p>
  <p>Alive: <span class="alive">0</span></p>
  <p>Drawn: <span class="drawn">0</span></p>
  <p><span class="fps">0</span> FPS</p>
  <a class="save" href="" download="capture.png">Save</a>
</div>


    <?php
    $dataPoints = array();

    $i = 0;
    foreach ($_SESSION["stats"] as $key => $value) {
        array_push($dataPoints, array("label" => (implode($_SESSION["cardid"][$i])), "y" => $key));
        $i++;
    }
    ?>
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                theme: "light2",
                animationEnabled: true,
                title: {
                    text: "Percentage of card picked by ID"
                },
                data: [{
                    type: "doughnut",
                    indexLabel: "{symbol} - {y}",
                    yValueFormatString: "#,##0.0\"%\"",
                    showInLegend: true,
                    legendText: "{label} : {y}",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>

    <div id="chartContainer"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <button class="custom-btn btn-3" id="backLobby" name="backLobby" onclick="window.location='lobby.php';"><span>Return to lobby</span></button>
    <button class="custom-btn btn-3" id="clearBD" name="clearBD"><span>clearBD</span></button>
    <div id="music" class="custom-btn btn-3" onclick="playMusic()"> <span>Music</span></div>


    <?php
    require_once("partial/footer.php");
