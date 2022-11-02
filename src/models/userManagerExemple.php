<?php
// On import user_manager.php pour pouvoir l'utiliser
require_once 'userManager.php';

// On appel les fonction public de usermanager.
UserManager::registerPlayer("I'am groot", "myS3cur3p@ssw0rd");
?>