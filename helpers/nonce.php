<?php

function create_nonce (): string
{
	if(isset($_SESSION['nonce']))
	{
		unset($_SESSION['nonce']);
	}

	$nonce = str_shuffle(strval(md5(rand(1000, 9999))));

	$_SESSION['nonce'] = $nonce;

	return $nonce;
}

?>