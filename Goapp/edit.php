<?php
session_start();
include('connecti.php');
include('connect.php');

if (!isset($_SESSION['user_id'])) {
    echo 'Ошибка';
} else {
    $session_uid = $_SESSION['user_id'];
    $query = "SELECT user_role FROM users WHERE user_id='$session_uid'";
$result = mysqli_query($connecti, $query);
$user_data = mysqli_fetch_assoc($result);
if ($user_data['user_role'] == 'user') {
    header('Location: index.php');
}
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">

    <title>Document</title>
</head>

<body>

    <!-- header start -->
    <?php include('header.php'); ?>

    <!-- header end -->

    <h1>Редактирование приложения</h1>
    <?php
    if (isset($_GET['id'])) {
        $get_id = $_GET['id'];
       
            $tovar_item_sql = "SELECT * FROM web_applications WHERE app_id=$get_id";
            $result = $connecti->query($tovar_item_sql);
            $tovar = $result->fetch_assoc();
    
           

        if (isset($_POST['edit_tovar'])) {

            $name = $_POST['title'];
            $text = $_POST['description'];
            $path = 'uploads/' . time() . $_FILES['photo1']['name'];
            move_uploaded_file($_FILES['photo1']['tmp_name'], $path);


            $update_tovar = "UPDATE web_applications SET
                        title = '$name',
                        description = '$text',
                        photo1 = '$path'
                    
                        WHERE app_id=$get_id";
            $connect->query($update_tovar);
            header('Location: category.php');
        }
    } ?>

    <form class="login" method="POST" name="edit_tovar" enctype="multipart/form-data">
        <input class="input" type="text" name="title" placeholder="Заголовок" value="<?= $tovar['title'] ?>">
        <input class="input" type="text" name="description" placeholder="Описание" value="<?= $tovar['description'] ?>">
        
            <div class="inputBox">
                <span class="user">Добавление фотографии</span>

                <input type="file" required="required" name="photo1">
            </div>
            <input class="header_nav_butt" type="submit" name="edit_tovar">
    </form>



    <!-- footer start -->
    <?php include('footer.php'); ?>

    <!-- footer end -->
</body>

</html>