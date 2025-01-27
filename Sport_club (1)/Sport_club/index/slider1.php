<div class="container_popular_tovars_con">
    <div class="slider-container">
        <button class="prev">‹</button>
        <div class="slider-wrapper">
            <div class="blocks_pop_tov_con">
                <?php
                    require_once('../db/db.php');
                    
                    if ($conn->connect_error) {
                        die("Ошибка подключения: " . $conn->connect_error);
                    }

                    $query = "SELECT * FROM slider_news ";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="block_pop_tov">
                                <img src="' . htmlspecialchars($row['image']) . '" alt="">
                                <p>' . htmlspecialchars($row['name']) . '</p> </a>
                                <a href="' . htmlspecialchars($row['link']) . '">Подробнее</a>
                            </div>';
                        }
                    } else {
                        echo "Нет новостей";
                    }
                ?>
            </div>
        </div>
        <button class="next">›</button>
    </div>
</div>

<script>
    const sliderWrapper = document.querySelector('.blocks_pop_tov_con');
const prevButton = document.querySelector('.prev');
const nextButton = document.querySelector('.next');
let currentSlide = 0;
const cardsToShow = 4;
const cardWidth = 300 + 75;

nextButton.addEventListener('click', () => {
    const totalSlides = document.querySelectorAll('.block_pop_tov').length;
    const maxSlide = totalSlides - cardsToShow; 

    if (currentSlide < maxSlide) {
        currentSlide++;
        sliderWrapper.style.transform = `translateX(-${currentSlide * cardWidth}px)`; 
    }
});

prevButton.addEventListener('click', () => {
    if (currentSlide > 0) {
        currentSlide--;
        sliderWrapper.style.transform = `translateX(-${currentSlide * cardWidth}px)`; 
    }
});


</script>

