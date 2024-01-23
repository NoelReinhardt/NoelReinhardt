<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Eufeme Jewelry | Spiritual Jewelry</title>
    <!-- Flowbite punya body -->
    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
    <script src="https://kit.fontawesome.com/a0a2699a9f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@1.10.0/dist/css/lightgallery.min.css">
    
    <style>
        /* Custom styles for LightGallery toolbar and caption background color */
        .lg-inner {
            background-color: #ffffff !important; /* White background color */
        }
        
        .lg-icon, .lg-toogle-thumb{
            color: #979797 !important;
            background-color: #fee2e2 !important;
        }

        /* Additional styles if needed */
        .lg-thumb-outer, .lg-outer, .lg-toolbar, .lg-caption {
            color: #fee2e2 !important; /* Text color, adjust as needed */
            background-color: #fee2e2 !important;
        }

        img{
            pointer-events: none;
        }
    </style>
</head>
<body>

    <nav class="fixed top-0 left-0 bg-white w-full shadow" style="z-index:1000">
        <div class="container m-auto flex items-center justify-between">
            <a href="index" class="md:mx-auto pl-8 md:left-0"><img src="img/main.png" width="180px" alt=""></a>
            <!-- hamburger Menu -->
            <button id="menuButton" class="block md:hidden py-3 px-4 mx-2 rounded focus:outline-none hover:bg-red-200 group">
                <div class="w-5 h-1 bg-red-600 mb-1"></div>
                <div class="w-5 h-1 bg-red-600 mb-1"></div>
                <div class="w-5 h-1 bg-red-600"></div>
            </button>
        </div>

            <ul id="menuList" class="hidden md:hidden flex-col items-center w-full text-base cursor-pointer pt-10">
                <a href="index"><li class="navbar-resp">HOME</li></a>
                <a href="product"><li class="navbar-resp">PRODUCT</li></a>
                <a href="our-story"><li class="navbar-resp">THE COMPANY</li></a>
                <a href="blog"><li class="navbar-resp">BLOGPOST</li></a>
                <a href="contact"><li class="navbar-resp">CONTACT</li></a>
            </ul>
            <!-- HBGM END -->

      <ul class="justify-center hidden md:flex items-center text-base cursor-pointer bg-red-100">
        <a href="index"><li class="navbar-dsktp">HOME</li></a>
        <a href="product"><li class="navbar-dsktp">PRODUCT</li></a>
        <a href="our-story"><li class="navbar-dsktp">THE COMPANY</li></a>
        <a href="blog"><li class="navbar-dsktp">BLOGPOST</li></a>
        <a href="contact"><li class="navbar-dsktp">CONTACT</li></a>
      </ul>

    </nav>

<script>
    document.getElementById('menuButton').addEventListener('click', function () {
        document.getElementById('menuList').classList.toggle('hidden');
    });
</script>