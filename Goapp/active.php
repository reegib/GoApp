<?php
session_start();
include('connecti.php');
include('connect.php');

if (!isset($_SESSION['user_id'])) {
    echo 'Ошибка';
    header('Location: index.php');

} else {
    $session_uid = $_SESSION['user_id'];
    $query = "SELECT user_role FROM users WHERE user_id='$session_uid'";
$result = mysqli_query($connecti, $query);
$user_data = mysqli_fetch_assoc($result);
if ($user_data['user_role'] == 'user') {
    header('Location: index.php');
}
if ($user_data['user_role'] == 'creator') {
    header('Location: index.php');
}
}

if (isset($_GET['id'])) {
    $get_id = $_GET['id'];
    $publish= "UPDATE `web_applications` SET `status`='active' WHERE app_id=$get_id";
    $connect -> query($publish);
    }

header("Location:mod.php");

?>