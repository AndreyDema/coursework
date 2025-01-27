<?php
require_once('../db/db.php');
                    
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

$query = "SELECT * FROM fedorov ";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '
        <div class="container">
            <hr class="line">
            <div class="container_1">
                <img class ="image" src="' . htmlspecialchars($row['image_url']) . '" alt="">
                <div class="right_block_1">
                    <div class="top_right_block">
                        <div class="fs24fw600">' . htmlspecialchars($row['section']) . '</div>
                        <div class="fs24fw600"> <div>Тренер:</div>' . htmlspecialchars($row['trener']) . '</div>
                        <div class="fs24fw600"> <div>Квалификация:</div>' . htmlspecialchars($row['qualification']) . '</div>
                        <div class="fs24fw600"> <div>Опыт:</div>' . htmlspecialchars($row['experience']) . '</div>
                    </div>
                    <a><button>Записаться на пробную тренировку</button></a>
                    <div class="fs24fw600">' . htmlspecialchars($row['club']) . '</div>
                </div>
            </div>
            <hr class="line">
        </div>';
    }
} else {
    echo "Нет новостей";
}
?>

