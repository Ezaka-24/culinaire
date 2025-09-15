
<!--swiper-->
<div class="p-4 swiper mySwiper w-full h-screen max-w-4xl mx-auto mt-10 rounded overflow-hidden shadow-lg">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img src="image/laura-barry-zXNk-1xX5Gw-unsplash (1).jpg" class="w-full h-full object-cover" />
        </div>
        <div class="swiper-slide">
            <img src="image/pexels-pedrofurtadoo-33674422.jpg" class="w-full h-full object-cover" />
        </div>
        <div class="swiper-slide">
            <img src="image/pexels-monica-tran-2153311664-33673716.jpg" class="w-full h-full object-cover" />
        </div>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

<script>
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        autoplay: {
            delay: 3500, // Le temps en millisecondes entre chaque glissement
            disableOnInteraction: false, // Continue le glissement même si l'utilisateur interagit
        },
    });
</script>