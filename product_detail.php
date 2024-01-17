<?php
    require 'connection.php';
    include 'header.php';
?>

<div class="container mx-auto mt-64 mb-32 max-w-screen-lg">
    <?php
    /* get SKU */
    $product_sku    = $input->escape($input->get("sku"));

    /* Initialize Product Queries */
    $query          = $db->query("SELECT * FROM tb_product_category WHERE sku = '$product_sku'");

    /* Check if any product has been found */
    if($db->count($query)>0){

        /* Loop products */
        while($data = $db->fetch($query)){

            /* Variable handler for product data list*/
            $product_sku            = $data->sku;
            $product_category       = $data->category;
            $product_title          = $data->title;
            $product_description    = $data->description;
            $product_price          = $data->price;
            $product_etsy_rdr       = $data->etsy_rdr;
            $product_keyword        = $data->keyword;
            $product_url            = $baseUrl."product_detail.php?sku=".$product_sku;
            
            /* Image path handler */
            $image_folder           = $baseUrl."img/product/".$product_category."/".$product_sku."/";
            $image_path             = __DIR__."/img/product/".$product_category."/".$product_sku."/";
            $image_blank            = $baseUrl."img/blank.jpg";

            /* handler for multiple image */
            $files                  = scandir($image_path);
            ?>
            
            <div class="flex flex-col md:flex-row mb-8">
                <div class="w-full md:w-1/2">
                    <div class="owl-carousel owl-theme border" id="imageCarousel">
                        <?php
                        /* Files handler */
                        if (!empty($files)) {
                            $number     = 1;
                            foreach ($files as $index => $file) {
                                /* Filter for image only */
                                if (is_file($image_path . $file) && in_array(pathinfo($file, PATHINFO_EXTENSION), array('jpg', 'jpeg', 'png', 'gif'))) {
                                ?>
                                    <a href="<?=$image_folder.$file?>" class="item" data-lg-size="1600-1200">
                                        <img src="<?=$loader?>" data-src="<?=$image_folder.$file?>" alt="<?=$product_keyword?> - Image <?=$number?>" class="rounded-lg shadow-lg lazy-image">
                                    </a>
                                <?php
                                    $number++;
                                }
                            }
                        } else {
                        ?>
                            <div class="item"><img src="<?=$image_blank?>" alt="Product Image Blank" class="rounded-lg shadow-lg"></div>
                        <?php } ?>
                    </div>
                </div>

                <div class="w-full md:w-1/2 px-8">
                    <h1 class="text-3xl font-bold mb-4"><?=$product_title?></h1>
                    <p class="text-gray-700 mb-4"><?=$product_description?></p>
                    <button class="px-4 py-2 bg-orange-500 text-white rounded-sm hover:bg-orange-400"><a href="<?= $product_etsy_rdr ?>" target="_blank"><i class="fa-brands fa-etsy fa-2xl mr-4"></i>Shop on Etsy</a></button>
                </div>
                
            </div>
            <?php

        }

    } else {
        /* Handler if product not found */
        echo "product not found";
    }
    ?>
</div>

<?php 
    include 'footer.php';
?>


<script>
    $(document).ready(function(){
        /* Initialize for owl carousel */
        $(".owl-carousel").owlCarousel({
            items: 1,
            loop: false,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true
        });

        /* Initialize lightGallery */
        $("#imageCarousel").lightGallery({
            selector: '.item',
            thumbnail: true,
            download: false,
            zoom: true,
            fullScreen: false
        });
    });
</script>

