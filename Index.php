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
	<form action="" method="post">
		<div class="formLabel"><label for="username"> nom d'usager : </label></div>
		<div class="formInput"><input type="text" name="username" /></div>
		<div class="formSeparator"></div>
		
		<div class="formLabel"><label for="password"> Mot de passe : </label> </div>
		<div class="formInput"><input type="password" name="password"/></div>
		<div class="formSeparator"></div>
		
		<div class="formLabel">&nbsp;</div>
		<div  class="formInput" type="submit" value="connexion"><button>Envoyer</button>
		<div class="formSeparator"></div>
	</form>
</div>
<?php
	require_once("partial/footer.php");