<?php

session_start();

define("WEBSITE", 1);
define("SITE_ROOT", __DIR__);
define("NO_MVC", "yes");	# Yes / No

error_reporting(0);

require_once(SITE_ROOT. "/engine/inc/config.php");

require_once(SITE_ROOT. "/engine/router.php");

Router::Start();

?>