<?php 

define("HOST", "127.0.0.1");
define("PORT", $argv[1]);

$sock = socket_create(AF_INET, SOCK_STREAM, 0);
socket_connect($sock, HOST, PORT);

#socket_send($sock, $msg, strlen($msg), 0);

socket_recv($sock, $buf, 2045, MSG_WAITALL);
echo "{$buf}\n";

socket_close($sock);
