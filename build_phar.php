<?php
/**
 * Builds out a PHAR file for easy inclusion.
 * 
 * 
 */
error_reporting("E_ALL");
ini_set('display_errors','On');
define("BASE",dirname(__FILE__).DIRECTORY_SEPARATOR);

$phar = new Phar(BASE.'build/cecilia.phar',
				 FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::KEY_AS_FILENAME,
		         "cecilia.phar");
$phar['index.php']=file_get_contents(BASE.'cecilia/index.php');
$phar->buildFromDirectory(BASE."cecilia",'/\.php$/');
$phar->setStub($phar->createDefaultStub("index.php"));			