<?php
    require_once("action/DeckAction.php");

    $action = new DeckAction();
    $data = $action->execute();

    require_once("partial/header.php");
?>
<body>
    <div class="deck">
        <iframe style="height: 100vh;width:100vh;" src="https://magix.apps-de-cours.com/server/#/deck/<?= $_SESSION["key"]?>">
        </iframe>
    </div>
    
</body>
    

<?php
    require_once("partial/footer.php");