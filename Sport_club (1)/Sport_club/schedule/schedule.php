<?php
require_once('../db/db.php');

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

$date_id = $_GET['date_id'] ?? 0;

$query = "SELECT * FROM schedule WHERE date_id = ?";
$stmt = $conn->prepare($query);

if (!$stmt) {
    die("Ошибка в запросе: " . $conn->error);
}

$stmt->bind_param("i", $date_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '
        <div class="schedule-item" onclick="loadDetails(' . $row['id'] . ')">
            <div>' . htmlspecialchars($row['title']) . '</div>
            <div class="under_block">
                <div>' . htmlspecialchars($row['time']) . '</div>
                <div>' . htmlspecialchars($row['location']) . '</div>
            </div>
        </div>';
    }
} else {
    echo "Нет расписания для выбранной даты";
}
$stmt->close();
?>
