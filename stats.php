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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script defer src="./js/hunter.js"></script>

<body class="stats">
    <div class="statsborder"></div>


    <?php
    $dataPoints = array();

    $i = 0;
    foreach ($_SESSION["stats"] as $key => $value) {
        array_push($dataPoints, array("label" => "ID_" . (implode($_SESSION["cardid"][$i])), "y" => ($key) * 100 / sizeof($_SESSION["stats"])));

        $i++;
    }
    ?>
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                backgroundColor: '#FFFFFF50',
                animationEnabled: true,
                fontColor: "black",
                title: {
                    text: "Percentage of card picked by ID",
                    fontColor: "black",
                },
                data: [{
                    type: "doughnut",
                    indexLabel: "{symbol} - {y}",
                    yValueFormatString: "#,##0.0\"%\"",
                    showInLegend: true,
                    legendText: "{label} : {y}",
                    fontColor: "black",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
    <script>
        document.getElementById("foo").style.zIndex = "1"
    </script>


    <div id="chartContainer"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <form action="" method="POST">
        <div>
            <button class="custom-btn btn-3" id="clearBD" name="clearBD"><span>clearBD</span></button>
        </div>

    </form>

    <button class="custom-btn btn-3" id="backLobby" name="backLobby" onclick="window.location='lobby.php';"><span>Return to lobby</span></button>
    <div id="music" class="custom-btn btn-3" onclick="playMusic()"> <span>Music</span></div>

    <div id="foo">
        <div id="bee1"></div>
    </div>
    <?php
    require_once("partial/footer.php");
