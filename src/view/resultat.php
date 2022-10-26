
<div class="info_box">
<p> Bonjour,<?php echo htmlspecialchars($_SESSION["name"]);?> :<?php echo $_SESSION["score"];?> pts. </p>
<?php
require_once '../models/user_manager.php' ;
$um = new UserManager();
 
$hscore = $um->getHighscore($_SESSION["name"]);
if ($_SESSION["score"]>$hscore)
        $um->setHighscore($_SESSION["name"],$hscore); ?>

<form action="../public/index.php" method="post">
        <div class="buttons">
            <button type="submit"> Main Menu </button>
        </div>
    </form>
	<form action="../public/classement.php" method="post">
        	<div class="buttons">
            		<button type="submit"> Classement </button>
        	</div>
    	</form>
</div>
