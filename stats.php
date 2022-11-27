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
<script src="./js/music.js"></script>


<body class="stats">



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
