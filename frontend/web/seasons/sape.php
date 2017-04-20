<?php
 define('_SAPE_USER', '127b59466874f15bfe7a8d9038ac6cf0');
 require_once($_SERVER['DOCUMENT_ROOT'].'/'._SAPE_USER.'/sape.php');
 $sape = new SAPE_client();
 echo $sape->return_links();
?>