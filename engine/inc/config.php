<?php

@session_start();

$GLOBALS['config'] = parse_ini_file(SITE_ROOT. "/engine/config.ini");

$GLOBALS['database'] = array(); 
$GLOBALS['database']['host'] = $GLOBALS['config']['sql_host'];
$GLOBALS['database']['user'] = $GLOBALS['config']['sql_user'];
$GLOBALS['database']['pass'] = $GLOBALS['config']['sql_pass'];
$GLOBALS['database']['db'] = $GLOBALS['config']['sql_db'];
$GLOBALS['database']['port'] = NULL;
$GLOBALS['database']['socket'] = NULL;
$GLOBALS['database']['pconnect'] = FALSE;
$GLOBALS['database']['charset'] = 'utf8';
$GLOBALS['database']['errmode'] = 'error';
$GLOBALS['database']['exception'] = 'Exception';

?>