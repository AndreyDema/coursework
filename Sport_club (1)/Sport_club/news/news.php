<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../news/style.css">
    <link rel="stylesheet" href="../news/style_new.css">
</head>
<body>
    <div class="Wrapper">
        <div>
            <?php
                include "../header/header.php"
            ?>
        </div>
        <div class="blocks">
            <div class="top_block">
                <div class="fs48fw500">Новости</div>
            </div>
            <div class="news_block">
                <?php
                    include "../news/news_new.php"
                ?>
            </div>
        </div>
    </div>

</body>
</html>