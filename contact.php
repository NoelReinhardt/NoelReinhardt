<?php

    include 'header.php';
    require 'connection.php';
?>


    <h1 class="header-menu">Contact Us</h1>
    <h2 class="mt-4 mb-4 text-center text-4xl">We're Here to Help You!</h2>
    <p class="text-center mb-4">Feel free to ask any inquiry about our product, we also accept custom order</p>

<section class="mt-8 mb-32 flex flex-col lg:flex-row justify-center items-center">
    <!-- Formulir -->
    <form action="#" method="post" class="lg:w-[40%] mx-4 mb-8 lg:mb-0">
        <!-- Nama -->
        <div class="mb-4">
            <label for="name" class="block text-gray-600">Name:</label>
            <input type="text" id="name" name="name" required class="mt-1 p-2 w-full border rounded-md">
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-gray-600">Email:</label>
            <input type="email" id="email" name="email" required class="mt-1 p-2 w-full border rounded-md">
        </div>

        <!-- Pesan -->
        <div class="mb-6">
            <label for="message" class="block text-gray-600">Message:</label>
            <textarea id="message" name="message" rows="6" required class="mt-1 p-2 w-full border rounded-md"></textarea>
        </div>

        <!-- Tombol Submit -->
        <button type="submit" class="bg-red-500 text-white p-2 rounded-sm hover:bg-red-600 w-full">Send Message</button>
    </form>

    <!-- Informasi Kontak -->
    <div class="lg:w-[20%] lg:ml-32">
        <h1 class="font-semibold text-xl"><i class="fa-solid fa-user mr-4"></i>Shie Nareswari</h1>
        <p><i class="fa-solid fa-phone mr-4"></i>+62 851-5712-2289</p>
        <p><i class="fa-regular fa-envelope mr-4"></i>info@eufeme.com</p>
    </div>
</section>




















<?php

    include 'footer.php';

?>