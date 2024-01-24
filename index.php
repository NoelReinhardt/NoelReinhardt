<?php 
    include 'header.php';
    require 'connection.php';
?>

    
    <!-- banner -->
    <div id="carousel" class="mt-[130px] mb-16 overflow-hidden w-full mx-auto">
        <div class="flex transition-transform duration-300 ease-in-out">
            <!-- Slide 1 -->
            <div class="w-full flex-shrink-0">
                <img src="img/banner/banner1.png" alt="Slide 1" class="w-full h-full object-cover">
            </div>
            <!-- Slide 2 -->
            <div class="w-full flex-shrink-0">
                <img src="img/banner/banner2.png" alt="Slide 2" class="w-full h-full object-cover">
            </div>
            <!-- Slide 3 -->
            <div class="w-full flex-shrink-0">
                <img src="img/banner/banner3.png" alt="Slide 3" class="w-full h-full object-cover">
            </div>
        </div>
        
        <!-- Tombol Previous -->
        <button onclick="prevSlide()"></button>
        <!-- Tombol Next -->
        <button onclick="nextSlide()"></button>
    </div>

    <!-- gallery -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-6 mx-4">
        <div>
        <img src="img/grid/1.png" alt="">
        </div>
        <div>
        <img src="img/grid/2.png" alt="">
        </div>
        <div>
        <img src="img/grid/3.png" alt="">
        </div>
        <div>
        <img src="img/grid/4.png" alt="">
        </div>
        <div>
        <img src="img/grid/5.png" alt="">
        </div>
    </div>

    <!-- product feature -->
    <h1 class="mt-16 text-7xl font-bold text-center text-gray-900">Featured Product</h1>

    <div class="container mx-auto mt-8 mb-32">
        <div class="grid-product">
            <?php
                /* Initialize Product Queries */
                $query = $db->query("SELECT * FROM tb_product_category ORDER BY RAND() LIMIT 4");

                /* Check if any product has been found on DB */
                if ($db->count($query) > 0) {

                    /* Loop products */
                    while ($data = $db->fetch($query)) {

                        /* Variable handler for product data list */
                        $product_sku            = $data->sku;
                        $product_title          = $data->title;
                        $product_category       = $data->category;
                        $product_description    = $data->description;
                        $product_price          = $data->price;
                        $product_material       = $data->material;
                        $product_keyword        = $data->keyword;
                        $product_url            = $baseUrl . "product_detail.php?sku=" . $product_sku;

                        /* Image path handler */
                        $image_folder   = $baseUrl . "img/product/" . $product_category . "/" . $product_sku . "/";
                        $image_path     = __DIR__ . "img/product/" . $product_category . "/" . $product_sku . "/" . $product_sku . ".jpg";
                        $image_blank    = $baseUrl . "img/blank.jpg";

                        /* Check if image is exists in the folder */
                        $image_url  = $image_folder . $product_sku . ".jpg";

                        ?>
                        <a href="<?=$product_url?>" class="block">
                            <div class="hover:bg-white text-center p-4 rounded-md shadow-lg">
                                <img src="<?=$loader?>" data-src="<?=$image_url?>" class="w-full h-[400px] object-cover rounded-md mb-4 lazy-image" alt="<?=$product_keyword?>">
                                <h3 class="text-lg font-semibold mb-2"><?=$product_title?></h3>
                            </div>
                        </a>
                        <?php
                    }
                } else {
                    /* Handler if product not found */
                    echo "product not found";
                }
                ?>
            </div>
        </div>

    
    <h1 class="mt-16 mb-16 text-center text-5xl font-semibold text-gray-900">Shop At Our Etsy</h1>
    
    <!-- Etsy Direct -->
    <div class="mb-16 flex flex-col items-center justify-center">
        <a href="https://www.etsy.com/shop/EuFemeJewelry" class="text-2xl">
            <i class="fab fa-etsy fa-2xl" style="color: #ff7438;"></i>
        </a>
        <a href="https://www.etsy.com/shop/EuFemeJewelry" class="mt-4 px-4 py-2 shadow-md rounded-sm bg-amber-500 hover:bg-amber-400 text-white">Shop Now!</a>
    </div>



    <!-- carousel slider -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script src="js/carousel.js" defer></script>


    <!-- review Etsy -->
    <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
    <div class="elfsight-app-40c9b66e-57bd-4dec-9b7c-26ca9c39d530" data-elfsight-app-lazy></div>

    
<?php 
    include 'footer.php';
?>


   


