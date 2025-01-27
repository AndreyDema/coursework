<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Расписание тренировок</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        include "../header/header.php"
    ?>

    <?php require_once('../db/db.php'); ?>

    <div class="Wrapper">
        <div class="fs48fw700">Расписание групповых занятий</div>

        <div class="date-container">
            <?php 
            $query = "SELECT * FROM dates";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="date-item" onclick="loadSchedule(' . $row['id'] . ')">' . htmlspecialchars($row['date']) . '</div>';
                }
            } else {
                echo "Нет доступных дат";
            }
            ?>
        </div>
        <div class="blocks">
            <div id="schedule-container" class="schedule-container"></div>
            <div id="details-container" class="details-container"></div>
        </div>
    </div>
    <script>
    function loadSchedule(dateId) {
        fetch(`schedule.php?date_id=${dateId}`)
            .then(response => response.text())
            .then(data => {
                document.getElementById('schedule-container').innerHTML = data;
                document.getElementById('details-container').innerHTML = ''; // Очищаем детали
            })
            .catch(error => console.log('Error:', error));
    }

    function loadDetails(detailId) {
        fetch(`details.php?id=${detailId}`)
            .then(response => response.text())
            .then(data => {
                document.getElementById('details-container').innerHTML = data;
            })
            .catch(error => console.log('Error:', error));
    }
</script>

</body>
</html>
