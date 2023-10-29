<?php
include_once "../includes/header.php";
include_once "../config/database.php";
include_once "../classes/player.php";

$db = new Database();
$dbase = $db->getConnection();

$player = new Player($dbase);
$player->player_id = $_POST['player_id'];
$player->delete()
?>