<div class="container_popular_tovars_con">
    <div class="slider-container">
        <div class="slider-wrapper">
            <div class="blocks_pop_tov_con">
                <?php
                    require_once('../db/db.php');
                    
                    if ($conn->connect_error) {
                        die("Ошибка подключения: " . $conn->connect_error);
                    }

                    $query = "SELECT * FROM news ";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="news_block">
                        <div class="container">
                            <div class="fs40fw600">' . htmlspecialchars($row['name']) . '</div>
                            <div class="top_block_conatiner">
                                <img class ="image" src="' . htmlspecialchars($row['image_url']) . '" alt="">
                                <div class="fs32fw500">' . htmlspecialchars($row['text']) . '</div>
                            </div>
                        </div>';
                        }
                    } else {
                        echo "Нет новостей";
                    }
                ?>
            </div>
        </div>
    </div>
</div>
