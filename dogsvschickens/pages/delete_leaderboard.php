<?php
include_once "../includes/header.php";
include_once "../config/database.php";
include_once "../classes/gameresult.php";

$db = new Database();
$dbase = $db->getConnection();

$gameresult = new GameResult($dbase);
$gameresult->gameresult_id = $_POST['gameresult_id'];
$gameresult->delete();

if($gameresult->delete()){
    echo 'success';
}else{
    echo 'fail';
}
?>