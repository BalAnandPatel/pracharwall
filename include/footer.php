<style>
    footer a {
        color: inherit;
        text-decoration: none;
    }
</style>


<div style="background-color: #eee;">
    <footer class="p-4 small">

        <div class="row">
            <h6>POPULAR LINKS</h6>
            <div class="col">
                <p>
                    <a href="" class="mx-2 link-body-emphasis">Link</a>
                    <a href="" class="mx-2 link-body-emphasis">Link</a>
                    <a href="" class="mx-2 link-body-emphasis">Link</a>
                    <a href="" class="mx-2 link-body-emphasis">Link</a>
                    <a href="" class="mx-2 link-body-emphasis">Link</a>
                    <a href="" class="mx-2 link-body-emphasis">Link</a>
                </p>
            </div>
        </div>
        <hr>
        <div class="row">
            <h6>POPULAR LINKS</h6>
            <div class="col">
                <p>
                    <a href="" class="mx-2 link-body-emphasis">Link</a>
                    <a href="" class="mx-2 link-body-emphasis">Link</a>
                    <a href="" class="mx-2 link-body-emphasis">Link</a>
                    <a href="" class="mx-2 link-body-emphasis">Link</a>
                    <a href="" class="mx-2 link-body-emphasis">Link</a>
                    <a href="" class="mx-2 link-body-emphasis">Link</a>
                </p>
            </div>
        </div>
        <hr>
        <div class="row">
            <h6>POPULAR LINKS</h6>
            <div class="col">
                <p>
                    <a href="" class="mx-2 link-body-emphasis">Link</a>
                    <a href="" class="mx-2 link-body-emphasis">Link</a>
                    <a href="" class="mx-2 link-body-emphasis">Link</a>
                    <a href="" class="mx-2 link-body-emphasis">Link</a>
                    <a href="" class="mx-2 link-body-emphasis">Link</a>
                    <a href="" class="mx-2 link-body-emphasis">Link</a>
                </p>
            </div>
        </div>


        <div class="d-flex flex-wrap justify-content-between align-items-center px-2 py-3 border-top">
            <p class="col-md-4 mb-0 text-body-secondary">&copy; 2023 <a href="https://www.glintel.com/"
                    class="text-decoration-underline">Glintel Technologies</a>, All Rights Reserved.</p>

            <div class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto text-decoration-none"
                style="font-size:2em;">
                <i class="bi bi-facebook"></i>
                <i class="bi bi-twitter"></i>
                <i class="bi bi-youtube"></i>
                <i class="bi bi-skype"></i>
                <i class="bi bi-instagram"></i>
                <i class="bi bi-linkedin"></i>
            </div>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="index.php" class="nav-link px-2 text-body-secondary">Home</a></li>
                <li class="nav-item"><a href="register-wall.php" class="nav-link px-2 text-body-secondary">Register Your
                        Wall</a>
                </li>
                <li class="nav-item"><a href="faq.php" class="nav-link px-2 text-body-secondary">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Terms & Condition</a></li>
            </ul>
        </div>



    </footer>
</div>



<script>

    // const slider = tns({
    //     container: '.my-slider',
    //     loop: true,
    //     items: 1,
    //     slideBy: 'page',
    //     nav: false,
    //     autoplay: true,
    //     speed: 400,
    //     autoplayButtonOutput: false,
    //     mouseDrag: true,
    //     lazyload: true,
    //     controlsContainer: "#customize-controls",
    //     responsive: {
    //         640: {
    //             items: 2,
    //         },
    //         768: {
    //             items: 3,
    //         }
    //     }
    // });

    var swiper = new Swiper(".slide-content", {
    slidesPerView: 3,
    spaceBetween: 25,
    loop: true,
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },

    breakpoints:{
        0: {
            slidesPerView: 1,
        },
        520: {
            slidesPerView: 2,
        },
        950: {
            slidesPerView: 3,
        },
    },
    autoplay: {
      delay: 3000,
    },
  });
</script>



</body>

</html>