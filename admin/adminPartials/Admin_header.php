 <?php
    session_start();
    $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);
    include "../database.php";

    if (!isset($_SESSION['user_data'])) {
        header("location:http://localhost/Collage/Admin_login.php");
    }



    ?>







 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">
     <title>Collage Admin</title>
     <link href="vendor/css/sb-admin-2.css" rel="stylesheet">

     <script src="https://cdn.tailwindcss.com"></script>
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

     <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

     <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

 </head>


 <style>
     body {
         font-family: "Karla", sans-serif;
     }

     #title_font {
         font-family: "Cormorant", serif;
     }

     .active {
         background-color: #309267;
     }





      
 </style>

 <body id="page-top">
     <!-- Page Wrapper -->
     <div id="wrapper">
         <!-- Sidebar -->
         <div class="bg-[#17082D] w-[350px]  relative shadow-md  min-h-screen  py-14">
             <div>
                 <div class="flex items-center gap-3   py-2 px-3 absolute  top-0">
                     <img class="w-16" src="https://i.ibb.co/x3VMSS3/Screenshot-2024-07-30-111139-processed-1.png" alt="">
                     <h2 id="title_font" class="text-lg font-bold text-white">Joynel Abedin College</h2>

                 </div>

             </div>
             <ul class=" " id="">
                 <!-- Sidebar - Brand -->


                 <div class="relative top-10 space-y-4 px-4">

                     <li>
                         <a class="   flex hover:bg-[#309267]   gap-3 px-2 items-center  py-1.5  text-white rounded-sm  duration-500] duration-500    w-40  mt-4  <?= $page == "index.php" ? 'active' : '' ?>" href="index.php">
                             <i class="fa-solid fa-house"></i>
                             <button class="text-lg font-semibold ">Dashboard </button>
                         </a>
                     </li>


                     <li>
                         <a class="flex  gap-3 px-2 items-center  py-1.5  text-white rounded-sm hover:bg-[#309267] duration-500] duration-500  w-44 " href="">
                             <i class="fa-solid fa-circle-exclamation"></i>
                             <button class="text-lg font-semibold ">Notice Board</button>
                         </a>
                     </li>
                     <li>
                         <details class="group">

                             <summary class="flex  gap-3 px-2 items-center  py-1.5 rounded-sm   hover:bg-[#309267] duration-500] duration-500  w-40  text-lg  font-semibold text-white marker:content-none hover:cursor-pointer ">
                                 <i class="fa-solid fa-users"></i>

                                 <span>
                                     Students
                                 </span>
                                 <svg class="w-5 h-5  text-white font-semibold   transition group-open:rotate-90" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                     <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                     </path>
                                 </svg>
                             </summary>

                             <article class="px-4 pb-4">

                                 <ul class="flex flex-col gap-4 pl-2 mt-4">

                                     <li>
                                         <details class="group">

                                             <summary class="flex items-center   duration-500 w-36  gap-3 text-base px-2   text-white  font-semibold  marker:content-none hover:cursor-pointer">
                                                 <i class="fa-solid fa-users"></i>
                                                 <span>
                                                     Eleven
                                                 </span>
                                                 <svg class="w-5 h-5  text-white font-semibold   transition group-open:rotate-90" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                     <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                                     </path>
                                                 </svg>
                                             </summary>

                                             <article class="px-4 pt-2">
                                                 <ul class="flex flex-col gap-1 pl-2 text-white space-y-2">
                                                     <li class="text-base font-semibold text-white hover:text-[#309267] duration-500 flex gap-2 items-center"><i class="fa-solid fa-user"></i><a class="" href="">Science</a></li>
                                                     <li class="text-base font-semibold text-white hover:text-[#309267] duration-500 flex gap-2 items-center"><i class="fa-solid fa-user"></i><a href="">Humanities</a></li>
                                                     <li class="text-base font-semibold text-white hover:text-[#309267] duration-500 flex gap-2 items-center"><i class="fa-solid fa-user"></i><a href="">Business</a></li>

                                                 </ul>
                                             </article>

                                         </details>
                                     </li>


                                     <li>
                                         <details class="group">

                                             <summary class="flex items-center hover:text-[#309267] rounded-sm duration-500 w-36  gap-3 text-base px-2   text-white  font-semibold  marker:content-none hover:cursor-pointer">
                                                 <i class="fa-solid fa-users"></i>
                                                 <span>
                                                     Twelve
                                                 </span>
                                                 <svg class="w-5 h-5 text-white transition group-open:rotate-90" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                     <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                                     </path>
                                                 </svg>
                                             </summary>

                                             <article class="px-4 pt-2">
                                                 <ul class="flex flex-col gap-1 pl-2 text-white space-y-2">
                                                     <li class="text-base font-semibold text-white hover:text-[#309267] duration-500 flex gap-2 items-center"><i class="fa-solid fa-user"></i><a class="" href="">Science</a></li>
                                                     <li class="text-base font-semibold text-white hover:text-[#309267] duration-500 flex gap-2 items-center"><i class="fa-solid fa-user"></i><a href="">Humanities</a></li>
                                                     <li class="text-base font-semibold text-white hover:text-[#309267] duration-500 flex gap-2 items-center"><i class="fa-solid fa-user"></i><a href="">Business</a></li>

                                                 </ul>
                                             </article>

                                         </details>
                                     </li>










                                 </ul>

                             </article>

                         </details>
                     </li>
                     <li>
                         <a class="flex  gap-3 px-2 items-center  py-1.5  text-white rounded-sm hover:bg-[#309267]  duration-500 w-36 <?= $page == "teacher.php" ? 'active' : ''; ?>" href="teacher.php">
                             <i class="fa-solid fa-user-tie"></i>
                             <button class="text-lg font-semibold ">Teachers</button>
                         </a>
                     </li>
                     <li>
                         <a class="flex  gap-3 px-2 items-center  py-1.5  text-white rounded-sm hover:bg-[#309267] duration-500] duration-500   w-36 <?= $page == "subject.php" ? 'active' : ''; ?>" href="subject.php">
                             <i class="fa-solid fa-book-open"></i>
                             <button class="text-lg font-semibold ">Subjects</button>
                         </a>
                     </li>

                     <li>
                         <a class="flex  gap-3 px-2 items-center  py-1.5  text-white rounded-sm hover:bg-[#309267] duration-500] duration-500   w-36  " href="">
                             <i class="fa-solid fa-person-cane"></i>
                             <button class="text-lg font-semibold ">Staffs</button>
                         </a>
                     </li>
                     <li>
                         <a class="flex  gap-3 px-2 items-center  py-1.5  text-white rounded-sm hover:bg-[#309267] duration-500] duration-500   w-36 <?= $page == "user.php" ? 'active' : ''; ?>" href="user.php">
                             <i class="fa-solid fa-user"></i>
                             <button class="text-lg font-semibold ">Users</button>
                         </a>
                     </li>
                     <li>
                         <a class="flex  gap-3 px-2 items-center  py-1.5  text-white rounded-sm hover:bg-[#309267] duration-500] duration-500   w-36  " href="">
                             <i class="fa-solid fa-user"></i>
                             <button class="text-lg font-semibold ">Attendance</button>
                         </a>
                     </li>
                     <li>
                         <a class="flex  gap-3 px-2 items-center  py-1.5  text-white rounded-sm hover:bg-[#309267] duration-500] duration-500    w-40" href="">
                             <i class="fa-solid fa-user"></i>
                             <button class="text-lg font-semibold ">Academic</button>
                         </a>
                     </li>





                 </div>
             </ul>
         </div>

         <div id="content-wrapper" class="d-flex flex-column">
             <!-- Main Content -->
             <div id="content">
                 <!-- Topbar -->
                 <nav class="navbar navbar-expand navbar-light bg-[#17082D] topbar  static-top shadow-md ">


                     <!-- Topbar Navbar -->
                     <ul class="navbar-nav ml-auto">


                         <li>
                             <!-- 1 -->
                             <div class="flex gap-4 items-center relative right-4">
                                 <h3 class="text-lg text-white  font-semibold">
                                     <?php
                                        if (isset($_SESSION['user_data'])) {
                                            echo $_SESSION['user_data'][1];
                                        }

                                        ?>

                                 </h3>
                                 <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="flex text-sm bg-gray-800 rounded-full md:me-0 " type="button">
                                     <img class="w-12 h-12 rounded-full " src="https://i.ibb.co/98W6xRQ/new.png" alt="">
                                 </button>
                             </div>

                             <!-- Dropdown menu -->
                             <div id="dropdownAvatar" class="z-10 hidden bg-[#17082D]  absolute    divide-gray-100  shadow-md w-44 h-40">


                                 <ul class="py-3  font-semibold text-lg text-white text-center">
                                     <li>
                                         <a href="#" class="block px-4 py-2 hover:bg-[#309267]  duration-500">Profile</a>
                                     </li>
                                     <li>
                                         <a href="#" class="block px-4 py-2 hover:bg-[#309267]  duration-500  ">Settings</a>
                                     </li>
                                     <li>
                                         <a href="Logout.php" class="block px-4 py-2 hover:bg-[#309267]  duration-500  ">Logout</a>
                                     </li>
                                 </ul>

                             </div>

                         </li>
                     </ul>
                 </nav>