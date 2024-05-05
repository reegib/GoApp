<?php
include('connect.php');
?>
<header class="header">
        <div class="header_inner">
            <a href="index.php" class="header_logo">Goapp</a>
            <ul class="header_nav_list">
                <li class="header_nav_item">

                    <a href="index.php" class="header_nav_link">Главная</a>
                </li>
                <?php 
                $categories_list_sql = "SELECT * FROM `categories`";
                $result=$connect->query($categories_list_sql);
                while($row=$result->fetch(2)){?>
                    <li class="header_nav_item">
                        <a class="header_nav_link" href="category.php?id=<?php echo $row['category_id'] ?>" ><?= $row['name']?></a>
                    </li>
                <?}?>
                <li class="header_nav_item">
                    <a href="category.php" class="header_nav_link">Все приложения</a>
                </li>
            </ul>
          
            <button><a  class="header_nav_but" href="login.php">
                Профиль
            </a></button>
        </div>

    </header>