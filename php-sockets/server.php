<?php 

$sock = socket_create(AF_INET, SOCK_STREAM, 0);
socket_bind($sock, "127.0.0.1", $argv[1]);
socket_listen($sock, 10);

while (1) {
	$client = socket_accept($sock);
	socket_write($client, "Connected!");
	echo "Someone connected\n";
	socket_close($client);
}

socket_close($sock);
