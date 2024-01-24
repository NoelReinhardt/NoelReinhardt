<?php 
    require 'connection.php';
    include 'header.php';
?>

<div class="container mx-auto w-1/2 mt-[180px]">
    <?php
    /* get title */
    $article_title    = $input->escape($input->get("title"));

    /* Initialize article Queries */
    $query          = $db->query("SELECT * FROM tb_article WHERE title = '$article_title'");

    if($db->count($query)>0){

        /* Loop article */
        while($data = $db->fetch($query)){

            /* Variable handler for article data list*/
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
    ?>

            <div class="">
                <img src="<?= $image_url ?>" alt="<?php $article_keyword ?>">
            </div>

    <?php
        }

    } else {
        /* Handler if artticle not found */
        echo "article not found!";
    }
     ?>
        <!-- article detail -->
                <article class="w-full px-8">
                    <h1 class="mt-8 text-3xl font-bold mb-4 text-left tracking-tight font-second"><?=$article_title?></h1>
                    <p class="mt-8 text-gray-700 mb-16 text-justify text-3xl indent-[50px] tracking-wide whitespace-break-spaces font-second"><?=$article_description?></p>
                </article>

            <!-- button back -->
            <h1 class="mb-16"><a href="blog.php" class="px-4 py-2 text-xl text-white shadow-md round-sm bg-red-400 hover:bg-red-500"> Back to Menu </a></h1>
</div>


<?php
    include 'footer.php';
?>