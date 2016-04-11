<?php
// init.php
require_once dirname(__FILE__) . '/database.php';
ini_set('display_error', 1);
ob_start();
session_start();

//xxs
function h($str,$encode = null) {
	return htmlspecialchars($str, ENT_QUOTES, $encode);
}