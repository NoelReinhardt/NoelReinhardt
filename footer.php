

<footer class="shadow">
    <div class="p-10 bg-red-100 text-gray-200">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">
                <div class="mb-5">
                    <h4 class="text-2xl pb-4 text-red-400 font-bold">Company</h4>
                    <p class="t-red5">
                        Jl. Trengguli No. 47 <br>
                        Denpasar, Bali 80237 <br>
                        Indonesia <br><br>
                        <strong>Phone: </strong> +62-851-5712-2289 <br>
                        <strong>Email: </strong> info@eufeme.com <br>
                    </p>
                </div>
                <div class="mb-5">
                   <h4 class="text-2xl pb-4 text-red-400 font-bold">Useful Links</h4>
                   <ul class="t-red5">
                    <li class="pb-4"><i class="fa fa-chevron-right foot-chev"></i><a href="#" class="foot-menu">Home</a></li>
                    <li class="pb-4"><i class="fa fa-chevron-right foot-chev"></i><a href="#" class="foot-menu">About Us</a></li>
                    <li class="pb-4"><i class="fa fa-chevron-right foot-chev"></i><a href="#" class="foot-menu">Services</a></li>
                    <li class="pb-4"><i class="fa fa-chevron-right foot-chev"></i><a href="#" class="foot-menu">Term of Services</a></li>
                    <li class="pb-4"><i class="fa fa-chevron-right foot-chev"></i><a href="#" class="foot-menu">Privacy Policy</a></li>
                   </ul>
                </div>
                <div class="mb-5">
                   <h4 class="text-2xl pb-4 text-red-400 font-bold">Blog Article</h4>
                   <ul class="t-red5">
                    <li class="pb-4"><i class="fa fa-chevron-right foot-chev"></i><a href="#" class="foot-menu">Raw Stones</a></li>
                    <li class="pb-4"><i class="fa fa-chevron-right foot-chev"></i><a href="#" class="foot-menu">Spiritual</a></li>
                    <li class="pb-4"><i class="fa fa-chevron-right foot-chev"></i><a href="#" class="foot-menu">Zodiac</a></li>
                    <li class="pb-4"><i class="fa fa-chevron-right foot-chev"></i><a href="#" class="foot-menu">Calmnes</a></li>
                    <li class="pb-4"><i class="fa fa-chevron-right foot-chev"></i><a href="#" class="foot-menu">Mindfulnes</a></li>
                   </ul>
                </div>
                <div class="mb-5">
                    <h4 class="pb-4 text-red-700 font-bold">Stay updated with us!</h4>
                    <p class="text-red-500 pb-2">Join with 10,000+ others and never miss out our spiritual journey</p>
                    <form action="subscribersProcess" method="post" class="flex flex-row flex-wrap">
                        <input type="text" name="email" class="text-red-500 w-2/3 p-2 focus-border-yellow-500" placeholder="email@example.com">
                        <button type="submit" class="btn-join">Join Us</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="foot-cpr">
        <div class="foot-cpr1">
            <div class="text-center">
                <div class="mb-4">
                    Copyright <strong><span>Eufeme | 2023</span></strong>. All Rights Reserved
                </div>
            </div>

            <div class="text-center text-xl text-white mb-2">
                <a href="https://api.whatsapp.com/send?phone=6285157122289" class="social-icon" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                <a href="https://www.instagram.com/eufemejewelry/" class="social-icon" target="_blank"><i class="fa fa-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="#" class="social-icon" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                <a href="#" class="social-icon" target="_blank"><i class="fa fa-youtube"></i></a>
                <a href="https://www.linkedin.com/company/eufeme-jewelry/posts/?feedView=all" class="social-icon" target="_blank"><i class="fa fa-linkedin"></i></a>
                <a href="https://id.pinterest.com/EufemeJewelry" class="social-icon" target="_blank"><i class="fa fa-pinterest"></i></a>
            </div>
        </div>
    </div>

    <div class="fixed bottom-8 right-8">
        <a href="https://api.whatsapp.com/send?phone=6285157122289" target="_blank" rel="noopener noreferrer" class="bg-green-500 text-white px-4 py-5 rounded-full shadow-md hover:bg-green-600">
            <i class="fa-brands fa-whatsapp fa-2xl"></i>
        </a>
    </div>

</footer>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@1.10.0/dist/js/lightgallery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lg-thumbnail@1.2.1/dist/lg-thumbnail.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lg-fullscreen@1.3.0/dist/lg-fullscreen.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lg-zoom@1.2.0/dist/lg-zoom.min.js"></script>
<script>
    $(document).ready(function () {
        /* Function to check if element is in the viewport */
        function isElementInViewport(el) {
            var rect = el.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        /* Function to lazy load images */
        function lazyLoadImages() {
            $(".lazy-image").each(function () {
                var img = $(this);
                if (isElementInViewport(img[0]) && img.attr("src") !== img.attr("data-src")) {
                    img.attr("src", img.attr("data-src"));
                }
            });
        }

        /* Initial load */
        setTimeout(function(){
            lazyLoadImages();
        },500);

        /* checker handler */
        var window_focus = true;
        $(window).focus(function() {
            window_focus = true;
        }).blur(function() {
            window_focus = false;
        });

        setInterval(function(){
            if(window_focus){
                lazyLoadImages();
            }
        },500);

        /* Lazy load images on Owl Carousel slide change */
        $(".owl-carousel").on("changed.owl.carousel", function (event) {
            if (window_focus) {
                lazyLoadImages();
            }
        });
    });
</script>
</body>
</html>