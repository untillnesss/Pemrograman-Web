<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/uts/helpers/Auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/uts/helpers/Helpers.php';

Auth::logout();
Helpers::redirect('login.php');
exit;

?>