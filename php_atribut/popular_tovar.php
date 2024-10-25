<div class="container_popular_tovars_con">
    <div class="zagolovok_pop_tov_con">
        <h1>Популярное оборудование:</h1>
    </div>
    <div class="slider-container">
        <button class="prev">‹</button>
        <div class="slider-wrapper">
            <div class="blocks_pop_tov_con">
                <?php
                    require_once('../include_data/db.php');
                    
                    if ($conn->connect_error) {
                        die("Ошибка подключения: " . $conn->connect_error);
                    }

                    $query = "SELECT * FROM tovars WHERE id_prime = 1";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="block_pop_tov">
                                <a href="../php_pages/tovar_page.php?id=' . htmlspecialchars($row['id']) . '">
                                <img src="' . htmlspecialchars($row['image_url']) . '" alt="">
                                <p>' . htmlspecialchars($row['name']) . '</p> </a>
                            </div>';
                        }
                    } else {
                        echo "Товаров нет. Распродали)";
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