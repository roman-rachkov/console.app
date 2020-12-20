<?php
	require_once __DIR__.DIRECTORY_SEPARATOR."vendor".DIRECTORY_SEPARATOR."autoload.php";

	$app =  new Symfony\Component\Console\Application('Change String');

	$app->add(new \App\ChangeStringCommand());

	$app->run();