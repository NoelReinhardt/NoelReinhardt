<?php 
    include 'header.php';
    require 'connection.php';
?>

<h1 class="header-menu">Blog Post</h1>

<div class="container mx-auto mt-16 mb-32">
    <div class="grid-blog">
        <?php

        // setting start form value
        $start = 0;

        //setting the number of rows to display in 1 page
        $rows_per_page = 8;

        // get the total no of rows
        $records = $db->query("SELECT * FROM tb_article");
        $nr_of_rows = $records->num_rows;

        //calculating the nr(number of rows) of pages
        $pages = ceil($nr_of_rows / $rows_per_page);

        if (isset($_GET['page-nr'])){
            $page = $_GET['page-nr'] - 1;
            $start = $page * $rows_per_page;
        }

        /* Initialize Product Queries */
        $query = $db->query("SELECT * FROM tb_article LIMIT $start, $rows_per_page");



        /* Check if any product has been found on DB*/
        if($db->count($query)>0){

            /* Loop products */
            while($data = $db->fetch($query)){

                /* Variable handler for product data list*/
                $article_title          = $data->title;
                $article_description    = $data->description;
                $article_tag            = $data->tag;
                $article_keyword        = $data->keyword;
                $article_url            = $baseUrl."blog_detail.php?title=".$article_title;
                
                /* Image path handler */
                $image_folder   = $baseUrl."img/article/";
                $image_path     = __DIR__."img/article/".$article_tag."/";
                $image_blank    = $baseUrl."img/blank.jpg";

                /* Check if image is exists in the folder */
                $image_url  = $image_folder.$article_tag.".png";
                //echo $image_url;
                /*
                if(file_exists($image_path)){
                    $image_url  = $image_folder.$product_sku."jpg";
                } else {
                    $image_url  = $image_blank;
                } */

                ?>
                    <div class="blog-card">
                    <a href="<?= $article_url ?>">
                        <img src="<?=$loader?>" data-src="<?=$image_url?>" class="w-full h-auto object-cover rounded-md mb-4 lazy-image" alt="<?=$article_keyword?>">
                        <h3 class="text-4xl font-bold mb-2 line-clamp-2"><?=$article_title?></h3>
                        <div class="mx-auto text-left text-gray-600 mb-2 align-items-center">
                            <p class="text-justify line-clamp-6 indent-[50px] mb-8">
                                <?= $article_description?>
                            </p>
                            <a href="<?= $article_url ?>" class="blog-readmore">Read More</a>
                        </div>
                    </a>
                    </div>
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
    include 'footer.php'
?>