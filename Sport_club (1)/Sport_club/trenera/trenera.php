<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Выбор тренера</title>
    <link rel="stylesheet" href="../trenera/style.css">
</head>
<body>

    <?php
        include "../header/header.php"
    ?>
    <div class="wrapper">
        <div class="fs40fw600">Тренера</div>
        <div>
            <?php
            // Массив тренеров с файлами
            $trainers = [
                'vasiliev' => '../trenera/vasiliev.php',
                'fedorov' => '../trenera/fedorov.php'
            ];
            ?>

            <div class="dropdown">
                <button onclick="toggleDropdown()">Выберите тренера</button>
                <div id="dropdownMenu" class="dropdown-menu">
                    <?php foreach ($trainers as $id => $file): ?>
                        <a href="#" onclick="showInfo('<?php echo $id; ?>')"><?php echo ucfirst($id); ?></a>
                    <?php endforeach; ?>
                </div>
            </div>

            <div id="info">
                <?php foreach ($trainers as $id => $file): ?>
                    <div id="<?php echo $id; ?>" class="info-content">
                        <?php include($file); ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <script>
            // Функция для показа/скрытия выпадающего меню
            function toggleDropdown() {
                const menu = document.getElementById("dropdownMenu");
                menu.style.display = (menu.style.display === "block") ? "none" : "block";
            }

            // Функция для отображения информации о выбранном тренере
            function showInfo(trainerId) {
                // Скрываем все блоки информации
                document.querySelectorAll('.info-content').forEach(element => {
                    element.style.display = 'none';
                });

                // Показываем нужный блок информации
                document.getElementById(trainerId).style.display = 'block';

                // Закрываем выпадающее меню
                document.getElementById("dropdownMenu").style.display = "none";
            }
            </script>
        </div>
    </div>
</body>
</html>

</html>

</html>