<?php
include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goapp</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
</head>

<body>
<?php include('header.php'); 
 if(isset($_GET['id'])){
    $category_id = $_GET['id'];
    $tovar_item_sql = "SELECT * FROM categories WHERE category_id=$category_id ";
    $result = $connect -> query($tovar_item_sql);
    $tovar = $result -> fetch(2);?>
    <h1 >
                        Приложения категории    <?=$tovar['name']?>
                        </h1><?}?>
<div class="container">
    <div class="tovar_list">
        
        <?php
       
       $app_list_sql = "SELECT * FROM web_applications WHERE status='active'";
        if(isset($_GET['id'])) {
            $category_id = $_GET['id'];
            $app_list_sql .= " AND category_id = '$category_id'";
        }
        $app_list_sql .= " ORDER BY creation_date DESC";
        
        $result = $connect->query($app_list_sql);
        while ($app = $result->fetch(2)) { ?>

           
            <div class="card">
            <div class="card-details">
            <div class="tovar_item_img">
                    <img class="tovar_item_img" src="<?php echo $app['photo1']; ?>" >
                </div>
                <p class="text-title"> <?= $app['title'] ?></p>
                  
            </div>
            <a class="card-button" href="item.php?id=<?php echo $app['app_id'] ?>">Подробнее</a>
            </div>



        <? }
         
        ?>
        </div>
       
    </div>
<?php include('footer.php'); ?>
</body>