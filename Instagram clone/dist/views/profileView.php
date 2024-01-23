<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <?php
        session_start();
    ?>
    <div class="min-h-screen">
        <div class="pt-6 h-auto md:flex">
            <div class="py-5 w-full md:w-2/6 md:px-0 mr-8 flex justify-center md:justify-end">
                <img src="uploads/<?php echo $_SESSION['imgName']?>" alt="profile picture" class="rounded-full w-40 h-40" style="object-fit: cover">
            </div>
            <div class="pt-4 pl-0 lg:pl-16 text-center md:text-left">
                <?php
                    echo $_SESSION['username'];
                ?>

                <button class="ml-4 bg-gray-500 bg-opacity-50 px-3 py-1 rounded-md hover:bg-opacity-30">Edit profile</button>
                <button class="ml-1 bg-gray-500 bg-opacity-50 px-3 py-1 rounded-md hover:bg-opacity-30 hidden lg:inline">View archive</button>
                <a href="logout.php" class="ml-1 bg-red-400 bg-opacity-50 px-3 py-1 rounded-md hover:bg-opacity-30">Log Out</a>
                
                <div class="mt-5 font-roboto">
                    <span class="mr-8"><?php echo $_SESSION['postsCount']; ?> Posts</span>
                    <span class="mr-8"><?php echo $_SESSION['followers']; ?> Followers</span>
                    <span><?php echo $_SESSION['following']; ?> Following</span>
                </div>
                <div class="block mt-3">
                    <span class="font-bold">
                        <?php
                            echo $_SESSION['name'];
                        ?>
                    </span>
                </div>
                <div class="mt-3 hidden md:inline">
                    <?php
                        echo "<p>";
                        echo $_SESSION['bio'];
                        echo "</p>";
                    ?>
                </div>
            </div>
        </div>
        <div class="flex flex-1 justify-center border-t border-t-gray-800 w-auto mx-5 mt-28">
            <div class="py-4 px-2 mx-1 md:mx-8 border-t flex">
                <img src="graphics/icons/mdi_grid.svg" alt="" class="mx-4 sm:mx-1">
                <button><span class="hidden sm:inline">POSTS</span></button>
            </div>
            <div class="py-4 px-2 mx-1 md:mx-14 flex">
                <img src="graphics/icons/bookmark.svg" alt="" class="mx-4 sm:mx-1">
                <button><span class="hidden sm:inline">SAVED</span></button>
            </div>
            <div class="py-4 px-2 mx-1 md:mx-8 flex">
                <img src="graphics/icons/la_portrait.svg" alt="" class="mx-4 sm:mx-1">
                <button><span class="hidden sm:inline">TAGGED</span></button>
            </div>
        </div>
        <div class="grid grid-cols-2 md:grid md:grid-cols-3 sm:grid sm:grid-cols-2 gap-1 w-auto mx-5">
                <?php
                    require "postsArray.php";
    
                    for ($i = count($pictureArrayUser) - 1; $i >= 0; $i--) {
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
    <script src="views/views.js"></script>
</body>
</html>