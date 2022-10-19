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
    <div class="box">
        <h1>
            Bienvenue à Magix!
        </h1>
        <?php
		if (!empty($data["message"] )) {
			?>
        <div style="color:red;text-align:center">
            <?= $data["message"] ?>
        </div>
        <?php
		}
		?>
        <div>
            <form action="" method="POST">
                <div>
                    <input type="text" name="username" class="champ" placeholder="Username">
                </div>

                <div>
                    <input type="password" name="password" class="champ" placeholder="Password">
                </div>
				<span class="center"><input type="submit" name="connexion" value="" class="button"></span>
                
            </form>
        </div>
    </div>
    <?php
	require_once("partial/footer.php");