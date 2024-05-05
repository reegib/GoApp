<?php 
include('connect.php');
include('connecti.php');


    session_start();
    if(!isset($_SESSION['user_id'])){
    }else{
        $session_uid = $_SESSION['user_id'];}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include('header.php');?>



        




    <section class="tovar">
            <div class="container">
            <div class="tovar_description">
            <?php
    if(isset($_GET['id'])){
        $get_id = $_GET['id'];
        
        $tovar_item_sql = "SELECT * FROM web_applications WHERE app_id=$get_id";
        $result = $connect -> query($tovar_item_sql);
        $tovar = $result -> fetch(2);
        $category_id=$tovar['category_id'];
        $auth_id=$tovar['user_id'];

        $category_sql="SELECT * FROM categories WHERE category_id=$category_id";
        $result = $connect -> query($category_sql);
        $category_name=$result -> fetch(2); 
        
        $user_sql="SELECT * FROM users WHERE user_id = $auth_id";
        $result = $connect -> query($user_sql);
        $user_name = $result -> fetch(2); ?>

        

        <div class="news">
        <div class="one_item">

                
                <div class="tovar-info">
                <div class="tovar_item_img_inner">
                    <img class="tovar_item_img_inner" src="<?php echo $tovar['photo1']; ?>" alt="">
                </div>
                    <h1 class="new_text">
                            <?=$tovar['title']?>
                        </h1>
                        <h3 class="new_text">
                            Автор: <?=$user_name['username']?>
                        </h3>
                        <p class="new_text ">
                            Категория: <?=$category_name['name']?>
                        </p>
                        <p class=" tem_text">
                            <?=$tovar['description']?>
                        </p>
                       <? if( $user_name['user_id'] == $session_uid) {?>
                        <p class="new_text ">
                            Статус: <?=$tovar['status']?>
                        </p>
                        <?} ?>
                        
                        
                       <div class="new_buttons">
                        <? if(!isset($_SESSION['user_id'])){
                            }else{?>
                                <a class="btn-katalog-mini" href="add_fav.php?app_id=<?php echo $tovar ['app_id']?>">Добавить в избранное</a>
                            <?}
                            $session_uid = $_SESSION['user_id'];
                         $query = "SELECT user_role FROM users WHERE user_id='$session_uid'";
                        $result = mysqli_query($connecti, $query);
                        $user_data = mysqli_fetch_assoc($result);
                        if ($user_data['user_role'] == 'admin') {?>
                            <a class="btn-katalog-mini" href="edit.php?id=<?php echo $tovar ['app_id']?>">Редактировать</a>
                            <a class="btn-katalog-mini"  href="delete.php?id=<?php echo $tovar ['app_id']?>">Удалить</a>
                            <p class="new_text ">
                            Статус: <?=$tovar['status']?>
                        </p>
                            <?if($tovar['status'] == 'pending') {?>
                                <a class="btn-katalog-mini" href="inactive.php?id=<?php echo $tovar ['app_id']?>">Не публиковать</a>

                                <a class="btn-katalog-mini" href="active.php?id=<?php echo $tovar ['app_id']?>">Опубликовать</a>
                                <?}?>
                           

                        </div>
                       <?}?>
                        
                </div>
                </div>
 
        </div>
        
    <?}else{
        echo '<h3 class="new-title">Товар не найден</h3>';
    }
?>
        </div>

    </section>
    </div>
    <?php include('footer.php');?>

</body>
</html>