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
		if (!empty($data["hasError"] )) {
			?>
			<div style="color:red;text-align:center">
				!!! Erreur d'authentification !!!
			</div>
			<?php
		}
	?>
	<form action="" method="POST">
            <div>
                <input type="text" name="username" class = "field" placeholder = "Username">
            </div>

            <div>
                <input type="password" name="password" class = "field" placeholder = "Password">
            </div>

            <input type="submit" name="connexion" value="Connexion" class = "field">      
        </form>

</div>
<?php
	require_once("partial/footer.php");