<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <div class="min-h-screen">
        <div class="grid grid-cols-1 md:grid md:grid-cols-3 sm:grid sm:grid-cols-2 gap-1 w-auto md:w-5/6 sm:w-5/6 mx-auto">
            <?php
                session_start();

                require "postsArray.php";
                for ($i = count($pictureArrayAll) - 1; $i >= 0; $i--) {
                        echo "<div class='relative group'>";
                        echo "<img src='uploads/$pictureArrayUser[$i]' alt='$descriptionArrayUser[$i]' class='hover:brightness-75 w-80 h-64 cursor-pointer' style='object-fit: cover'>";
                        echo "<div class='flex justify-center items-center absolute cursor-pointer inset-0 bg-black opacity-0 group-hover:opacity-70 transition-opacity duration-100 z-0' onclick='openImageInNewTab(this.previousElementSibling)'>";
                        echo "<img src='graphics/icons/heart.png' class='w-5 invert'>";
                        echo "<span class='text-white font-bold mx-2'>0</span>";
                        echo "<img src='graphics/icons/comment.png' class='w-5 invert ml-5'>";
                        echo "<span class='text-white font-bold mx-2'>0</span>";
                        echo "</div>";
                        echo "</div>";
                }
            ?>
        </div>
    </div>
</body>
</html>