<?php
include('connect.php');
session_start();
if(empty($_SESSION['user_id'])){
    echo "Авторизуйтесь для добавления приложение в избранное ";
    header('Location: login.php');

}else{ 
    


if (isset($_GET['app_id'])) {
    $get_id = $_GET['app_id'];
$user_id = $_SESSION['user_id']; 
echo $user_id;
echo $get_id;
$insert_cart_sql = "INSERT INTO favorites (user_id, item_id) VALUES ($user_id, $get_id)";
$success = $connect->exec($insert_cart_sql);

if ($success) {
    echo "Успешно добавлено ";
    header('Location: profile.php');

} else {
    echo "Ошибка при добавлении в избранное.";
}}
}
?>
