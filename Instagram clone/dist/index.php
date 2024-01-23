<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="graphics/icons/instagram_icon.png">
    <link rel="stylesheet" href="output.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body class="bg-black text-white">
    <?php
        session_start();

        // Check if session is not started and not on the login page
        if (!isset($_SESSION['userId'])) {
            header("Location: login.php");
            exit();
        }
    ?>
    <div class="min-h-screen flex-grow flex">
        <div class="
            w-full 
            md:w-20 
            lg:w-1/6 
            h-16 
            md:h-full 
            fixed 
            bottom-0 
            md:top-0 
            flex 
            justify-center 
            border-r 
            border-r-gray-800 
            border-t-2 
            border-t-gray-500 
            md:border-t-0 
            overflow-hidden 
            bg-black z-50">
            <ul class="w-full md:inline grid grid-flow-col justify-around">
                <li class="mb-6 hidden md:flex">
                    <button onclick="location.href='index.php'" class="mt-1 px-5 py-3 rounded-2xl hover:bg-gray-500 hover:bg-opacity-20 lg:hover:bg-opacity-0 hidden md:flex">
                    <img src="graphics/icons/instagram.png" alt="instagram icon" class="w-8 lg:hidden invert">
                        <span class="text-3xl hidden lg:inline font-lobster">
                            Instagram
                        </span>
                    </button>
                </li>
                <li>
                    <button onclick="profileView()" class="link-buttons">
                        <img src="graphics/icons/home.svg" alt="home icon" class="w-7">
                        <span class="text-1xl hidden lg:inline">
                            Home
                        </span>
                    </button>
                </li>
                <li class="hidden md:flex">
                    <button class="link-buttons">
                        <img src="graphics/icons/search.svg" alt="search icon" class="w-7">
                        <span class="text-1xl hidden lg:inline">
                            Search
                        </span>
                    </button>
                </li>
                <li>
                    <button onclick="exploreView()" class="link-buttons">
                        <img src="graphics/icons/explore.svg" alt="explore icon" class="w-7">
                        <span class="text-1xl hidden lg:inline">
                            Explore
                        </span>
                    </button>
                </li>
                <li>
                    <button class="link-buttons">
                        <img src="graphics/icons/reels.svg" alt="reels icon" class="w-7">
                        <span class="text-1xl hidden lg:inline">
                            Reels
                        </span>
                    </button>
                </li>
                <li>
                    <button class="link-buttons">
                        <img src="graphics/icons/messages.svg" alt="messages icon" class="w-7">
                        <span class="text-1xl hidden lg:inline">
                            Messages
                        </span>
                    </button>
                </li>
                <li class="hidden md:flex">
                    <button class="link-buttons">
                        <img src="graphics/icons/notification.svg" alt="notifications icon" class="w-7">
                        <span class="text-1xl hidden lg:inline">
                            Notifications
                        </span>
                    </button>
                </li>
                <li>
                    <button onclick="createView()" class="link-buttons">
                        <img src="graphics/icons/create.svg" alt="create icon" class="w-7">
                        <span class="text-1xl hidden lg:inline">
                            Create
                        </span>
                    </button>
                </li>
            </ul>
        </div>

        <div id="viewDiv" class="flex justify-center w-full ml-0 md:ml-20 lg:w-5/6 lg:ml-auto overflow-y-auto overflow-x-auto">

        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="app.js"></script>
</body>
</html>