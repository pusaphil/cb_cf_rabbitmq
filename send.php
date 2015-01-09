<?php
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPConnection;
use PhpAmqpLib\Message\AMQPMessage;
//	$message = $_GET['themsg'];
	$message = 'pusa';
	$connection = new AMQPConnection('localhost', 5672, 'guest', 'guest');
	$channel = $connection->channel();
	$channel->queue_declare('hello', false, false, false, false);
	$msg = new AMQPMessage($message);
	$channel->basic_publish($msg, '', 'hello');
	echo " [x] Sent '".$message."'\n";
	$channel->close();
	$connection->close();
//}
?>
