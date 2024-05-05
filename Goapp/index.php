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
    <script src="assets/script.js" defer></script>
  
</head>

<body>
    <?php include('header.php'); ?>

    <div class="banner">
        
        <h2 class="ban_text">Goapp</h1>
        <h3 class="ban_info">Все веб-приложения в  одном месте</p>
        

    </div>


   <div class="container">
   <div class="slider">
        <div class="slides">
            <div class="slide active"><img src="images/iamge.jpg" alt=""></div>
            <div class="slide"><img src="images/iamge2.jpg" alt=""></div>
            <div class="slide"><img src="images/iamge3.jpg" alt=""></div>
        </div>
        <div class="dots">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>
   </div>

    <div class="about">
        <div class="container">
            <h1>О нас</h1>
            <div class="about_inner">
                <p class="about_text">Это уникальное пространство, где пользователи могут легко найти, исследовать и использовать широкий спектр веб-сервисов и приложений, сфокусированных на различных областях интересов, без необходимости их установки на устройства.</p>
                <img src="images/about.png" alt="" class="about_pic">
            </div>
        </div>
       

    </div>

    
    <h1>Новые приложения</h1>
<div class="container">
<div class="tovar_list">
    <?php
    // Модифицируем SQL-запрос
    $app_list_sql = "SELECT * FROM web_applications WHERE status='active' ORDER BY creation_date DESC LIMIT 4";
    $result = $connect->query($app_list_sql);

    while ($app = $result->fetch(2)) {
    ?>
        <div class="card">
            <div class="card-details">
                <div class="tovar_item_img">
                    <img class="tovar_item_img" src="<?php echo $app['photo1']; ?>" >
                </div>
                <p class="text-title"><?= $app['title'] ?></p>
            </div>
            <a class="card-button" href="item.php?id=<?php echo $app['app_id'] ?>">Подробнее</a>
        </div>
    <?php
    }
    ?>
</div>
<div class="container">
<div class="all_appps_inner">
    <div class="all_apps">
        <button  class="header_nav_but all_apps" class="all_apps"> <a href="category.php">Все приложения</a> </button>
    </div>
</div>
</div>


</div>
    
    <div class="pluses">
        <h1>Преимущества</h1>
        <div class="container">
            <div class="pluses_inner">
                <div class="plus">
                    <img src="images/plus1.png" alt="" class="plus_ph">
                    <p class="plus_text">Разнообразие приложений и сайтов</p>
                </div>
                <div class="plus">
                    <img src="images/plus2.png" alt="" class="plus_ph">
                    <p class="plus_text">Отсутствие необходимости установки</p>
                </div>
                <div class="plus">
                    <img src="images/plus3.png" alt="" class="plus_ph">
                    <p class="plus_text">Система обратной связи и оценки</p>
                </div>
            </div>
        </div>

    </div>
   
    <div class="faq">
        <h1>FAQ</h1>
        <div class="container">
            <div class="faq_inner">
               
                    <ul class="menu">
                        <li class="menu-item" id="home">
                            <div class="container_faq">
                                <a class="title">Могу ли я добавлять свои собственные веб-приложения или сайты в галерею?</a>
                                <img src="images/icon.png" class="icon">
                            </div>
                            <ul class="submenu">
                                <li class="about_text">Да, вы можете добавлять веб-приложения и сайты, для этого вам необходимо написать нам на appgo@mail.com и запросить права создателя. Это позволит вам делиться полезными ресурсами с другими пользователями.</li>
                            </ul>
                        </li>
                        <li class="menu-item" id="home">
                            <div class="container_faq">
                                <a class="title">Могу ли я использовать галерею веб-приложений на мобильных устройствах?</a>
                                <img src="images/icon.png" class="icon">
                            </div>
                            <ul class="submenu">
                                <li class="about_text">Да, вы можете добавлять веб-приложения и сайты, для этого вам необходимо написать нам на appgo@mail.com и запросить права создателя. Это позволит вам делиться полезными ресурсами с другими пользователями.</li>
                            </ul>
                        </li>
                        <li class="menu-item" id="home">
                            <div class="container_faq">
                                <a class="title">Могу ли я синхронизировать свой аккаунт между устройствами?</a>
                                <img src="images/icon.png" class="icon">
                            </div>
                            <ul class="submenu">
                                <li class="about_text">Да, вы можете добавлять веб-приложения и сайты, для этого вам необходимо написать нам на appgo@mail.com и запросить права создателя. Это позволит вам делиться полезными ресурсами с другими пользователями.</li>
                            </ul>
                        </li>
                    </ul>
            
            
            </div>
        </div>
    </div>


    <?php include('footer.php'); ?>

</body>
<script src="assets/script.js"></script>

<!-- <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
      $('.single-item').slick({
        setting-name: setting-value
      });
    });
  </script> -->
</html>