
<?php
    session_start();
    include('connect.php');
    include('connecti.php');

    $user_id = $_SESSION['user_id'];
    $query = "SELECT user_role FROM users WHERE user_id='$user_id'";
    $result = mysqli_query($connecti, $query);
    $user_data = mysqli_fetch_assoc($result);
    if ($user_data['user_role'] == 'user') {
        header('Location: index.php');
    }

if (isset($_GET['id'])) {
    $get_id = $_GET['id'];
    $delete_orders = "DELETE FROM favorites WHERE item_id = '$get_id'";
    $connect->query($delete_orders);
   
    $delete = "DELETE FROM web_applications WHERE app_id = '$get_id'";
    $connect->query($delete);

    echo 'Приложение успешно удалено';
    header('Location: index.php');
}    
?>
