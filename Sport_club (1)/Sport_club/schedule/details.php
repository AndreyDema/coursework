<?php
require_once('../db/db.php');

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

$detail_id = $_GET['id'] ?? 0;

$query = "SELECT * FROM detail WHERE schedule_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $detail_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo '
    <div class="blocks_details">
        <div class="details">
            <div>' . htmlspecialchars($row['section']) . '</div>
            <div>Тренер: ' . htmlspecialchars($row['trainer']) . '</div>
            <div>' . htmlspecialchars($row['description']) . '</div>
            <div>Уровень подготовки: ' . htmlspecialchars($row['level']) . '</div>
            <div>Местоположение: ' . htmlspecialchars($row['location']) . '</div>
        </div>
        <img class="image_datails" src="' . htmlspecialchars($row['image_url']) . '" alt="Image">
    </div>';
} else {
    echo "Нет данных для выбранного занятия";
}
$stmt->close();
?>
