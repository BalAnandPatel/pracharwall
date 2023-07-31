<style>
    footer a {
        color: inherit;
        text-decoration: none;
    }
</style>

<div style="padding-top:100px;">
    <div class="position-absolute bottom-0 w-100">
        <footer class="px-4 py-2 small" style="background-color: #eee;">

            <!-- <div class="row">
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
        </div> -->


            <div class="d-flex flex-wrap justify-content-between align-items-center px-2 ">
                <p class="col-md-4 mb-0 text-body-secondary">
                    <a class="navbar-brand d-block" href="index.php">
                        <img src="Pracharwall_image/logo.png" class="img-fluid" alt="Pracharwall" width="160"
                            height="40">
                    </a>
                </p>

                <div class="col-md-4 d-flex justify-content-center text-decoration-none" style="font-size:2em;">
                    <a href="" class="p-1 icon-link icon-link-hover"><i class="bi bi-facebook"></i></a>
                    <a href="" class="p-1 icon-link icon-link-hover"><i class="bi bi-twitter"></i></a>
                    <a href="" class="p-1 icon-link icon-link-hover"><i class="bi bi-youtube"></i></a>
                    <a href="" class="p-1 icon-link icon-link-hover"><i class="bi bi-skype"></i></a>
                    <a href="" class="p-1 icon-link icon-link-hover"><i class="bi bi-instagram"></i></a>
                    <a href="" class="p-1 icon-link icon-link-hover"><i class="bi bi-linkedin"></i></a>
                </div>

                <ul class="nav col-md-4 justify-content-end justify-content-sm-center">
                    <li class="nav-item"><a href="index.php" class="nav-link px-2 text-body-secondary">Home</a></li>
                    <li class="nav-item"><a href="register-wall.php" class="nav-link px-2 text-body-secondary">Register
                            Your
                            Wall</a>
                    </li>
                    <li class="nav-item"><a href="faq.php" class="nav-link px-2 text-body-secondary">FAQs</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Terms & Condition</a>
                    </li>
                </ul>
            </div>
            <p class="text-center mt-md-1">
                &copy; 2023
                <a href="https://www.glintel.com/" class="text-decoration-underline">Glintel Technologies</a>, All
                Rights Reserved.
            </p>

        </footer>
    </div>

</div>
<script src="assets/js/lightbox.js"></script>

<script>

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

        breakpoints: {
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
<script>
    function myPreloader() {
        document.getElementById("preloader").style.display = "none";
    }    
</script>

<?php include "searchList.php";?>

</body>

</html>