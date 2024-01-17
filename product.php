<?php 
    require 'connection.php';
    include 'header.php';
?>


<h1 class="header-menu">Our Product</h1>

<div class="container mx-auto mt-16 mb-32">
    <div class="grid-product">
        <?php

        // setting start form value
        $start = 0;

        //setting the number of rows to display in 1 page
        $rows_per_page = 24;

        // get the total no of rows
        $records = $db->query("SELECT * FROM tb_product_category");
        $nr_of_rows = $records->num_rows;

        //calculating the nr(number of rows) of pages
        $pages = ceil($nr_of_rows / $rows_per_page);

        if (isset($_GET['page-nr'])){
            $page = $_GET['page-nr'] - 1;
            $start = $page * $rows_per_page;
        }

        /* Initialize Product Queries */
        $query = $db->query("SELECT * FROM tb_product_category LIMIT $start, $rows_per_page");



        /* Check if any product has been found on DB*/
        if($db->count($query)>0){

            /* Loop products */
            while($data = $db->fetch($query)){

                /* Variable handler for product data list*/
                $product_sku            = $data->sku;
                $product_title          = $data->title;
                $product_category       = $data->category;
                $product_description    = $data->description;
                $product_price          = $data->price;
                $product_material       = $data->material;
                $product_keyword        = $data->keyword;
                $product_url            = $baseUrl."product_detail.php?sku=".$product_sku;
                
                /* Image path handler */
                $image_folder   = $baseUrl."img/product/".$product_category."/".$product_sku."/";
                $image_path     = __DIR__."img/product/".$product_category."/".$product_sku."/".$product_sku.".jpg";
                $image_blank    = $baseUrl."img/blank.jpg";

                /* Check if image is exists in the folder */
                $image_url  = $image_folder.$product_sku.".jpg";
                //echo $image_url;
                /*
                if(file_exists($image_path)){
                    $image_url  = $image_folder.$product_sku."jpg";
                } else {
                    $image_url  = $image_blank;
                } */

                ?>
                <a href="<?=$product_url?>" class="block">
                    <div class="hover:bg-white text-center p-4 rounded-md shadow-lg">
                        <img src="<?=$loader?>" data-src="<?=$image_url?>" class="w-full h-[400px] object-cover rounded-md mb-4 lazy-image" alt="<?=$product_keyword?>">
                        <h3 class="text-lg font-semibold mb-2"><?=$product_title?></h3>
                        <!-- <p class="text-gray-600 mb-2">$/<?=$product_price?></p> -->
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

    <!-- displaying the page info text -->
    <div class="mt-16 font-semibold text-2xl text-red-400">
        <?php 

            if(!isset($_GET['page-nr'])){
                $page = 1;
            } else {
                $page = $_GET['page-nr'];
            }

        ?>
        showing <?= $page ?> of <?= $pages ?> pages
    </div>

    <!-- Pagination --> 
    <div class="mx-auto mt-16 flex justify-center gap-2">
        <!-- first page -->
        <a href="?page-nr=1" class="pagination-btn">First</a>

        <!-- previous page -->
        <?php 
            if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1){
                ?>
                    <a href="?page-nr=<?= $_GET['page-nr'] - 1 ?>" class="pagination-btn"><i class="fa-solid fa-angles-left"></i></a>
                <?php
            } else {
                ?>
                    <a href="" class="pagination-btn"><i class="fa-solid fa-angles-left"></i></a>
                <?php
            }
        ?>
        

        <!-- page numbers -->
            <?php 
                for($counter = 1; $counter <= $pages; $counter++){
                    ?>
                        <a href="?page-nr=<?= $counter ?>" class="pagination-btn z-1"><?= $counter ?></a>
                    <?php
                }
            ?>

        <!-- next button -->
        <?php 
            if(!isset($_GET['page-nr'])){
                ?>
                    <a href="?page-nr=2" class="pagination-btn"><i class="fa-solid fa-angles-right"></i></a>
                <?php        
            } else {
                if($_GET['page-nr'] >= $pages) {
                    ?>

                        <a href="" class="pagination-btn"><i class="fa-solid fa-angles-right"></i></a>

                    <?php
                } else {
                    ?>

                        <a href="?page-nr=<?= $_GET['page-nr'] + 1 ?>" class="pagination-btn"><i class="fa-solid fa-angles-right"></i></a>

                    <?php
                }
            }
        ?>
    
        <!-- last page -->
        <a href="?page-nr=<?= $pages ?>" class="pagination-btn">Last</a>
    </div>
</div>


<?php 
    include 'footer.php';
?>