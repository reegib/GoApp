<?php
session_start();
include('connect.php');
if (!isset($_SESSION['user_id'])) {
    echo 'Ошибка';
} else {
    $session_uid = $_SESSION['user_id'];
}

$user_id = $_SESSION['user_id'];
$query = "SELECT fio, email, level FROM users WHERE id='$user_id'";
$result = mysqli_query($connect, $query);
$user_data = mysqli_fetch_assoc($result);
if ($user_data['level'] == 1) {
    header('Location: index.php');
}




if (isset($_GET['id'])) {
    $get_id = $_GET['id'];
    $publish= "UPDATE `news` SET `level`='0' WHERE id=$get_id";
    $connect -> query($publish);
    }

header("Location:mod.php");





?>