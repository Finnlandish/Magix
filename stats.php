<?php
require_once("action/StatsAction.php");

$action = new StatsAction();
$data = $action->execute();
// $data["hasError"] 
// $data["user"] 
// $data contient les variables nécessaires à gérer l'interface graphique
require_once("partial/header.php");
?>
<body>
<div>
    <p>hello</p>
</div>    


<?php
require_once("partial/footer.php");