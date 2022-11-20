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

    <img id="trees" src="img/Indexbg/trees.png" alt="">
    <img id="monument2" src="img/Indexbg/monument2.png" alt="">
    <img id="mony" src="img/Indexbg/mony.png" alt="">
    <img id="foliage" src="img/Indexbg/foliage.png" alt="">
    <img id="bush" src="img/Indexbg/bush.png" alt="">
    <img id="pichu" src="img/Indexbg/pichu.png" alt="">
    <img id="wooper" src="img/Indexbg/Wooper.png" alt="">

    <img id="treeright" src="img/Indexbg/treeright.png" alt="">
    <img id="eevee" src="img/Indexbg/pichu.png" alt="">
    
    

    
    <div class="box">
        <h1>
            Bienvenue à Magix!
        </h1>
        <?php
		if (!empty($data["messageErr"] )) {
			?>
        <div style="color:red;text-align:center">
            <?= $data["messageErr"] ?>
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