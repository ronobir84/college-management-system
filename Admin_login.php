 <?php include "./partials/Header.php" ?>;

 <?php
    if (isset($_SESSION['user_data'])) {
        echo "<script>window.location.href='http://localhost/Collage/admin/index.php'</script>";
    }


    ?>

 <?php
    if (isset($_POST['login'])) {
        $email = mysqli_real_escape_string($database, $_POST['email']);
        $password = mysqli_real_escape_string($database, $_POST['password']);
        $sql = "SELECT * FROM users WHERE user_email = '$email' AND user_password = '$password'";
        $query = mysqli_query($database, $sql);
        $data = mysqli_num_rows($query);
        if ($data) {
            $result = mysqli_fetch_assoc($query);
            $user_data = array($result['user_id'], $result['user_name'], $result['user_role']);
            $_SESSION['user_data'] = $user_data;
            echo "<script>window.location.href='./admin/index.php'</script>";
        } else {
            $_SESSION['error'] = 'Invalid Email/Password!!';
            "<script>window.location.href='Admin_login.php'</script>";
        }
    }
    ?>


 <div class="w-[800px] h-[500px] bg-[#17082D] mx-auto relative top-8  overflow-hidden ">
     <div class="">
         <?php
            if (isset($_SESSION['error'])) {
                $error = $_SESSION['error'];
                echo $error;
            }

            ?>
            

     </div>
     <div class="w-[650px] h-[350px]  bg-white mx-auto relative top-20 p-10 shadow-md shrink rounded-sm ">
         <h2 id="title_font" class="text-2xl font-bold text-[#17082D] text-center ">Admin Login</h2>
         <form class="space-y-4 pt-6" method="post" action="">

             <div class=" pt-3">

                 <input name="email" placeholder="user email" class=" rounded-md  text-black border-2 border-gray-300 px-4   py-2.5 w-full  focus:ring-1 focus:ring-purple-400 transition ease-in-out duration-150 " type="email">

             </div>

             <div class=" pt-3">

                 <div class="" x-data="{ show: true }">

                     <div class="relative">
                         <input name="password" placeholder="Password" :type="show ? 'password' : 'text'" class=" rounded-md  text-black border-2 border-gray-300 px-4   py-2.5 w-full  focus:ring-1 focus:ring-purple-400 transition ease-in-out duration-150">
                         <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                             <svg class="h-6 text-gray-700 cursor-pointer " fill="none" @click="show = !show"
                                 :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
                                 viewbox="0 0 640 512">
                                 
                                 <path fill="currentColor"
                                     d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                 </path>
                             </svg>

                             <svg class="h-6 text-gray-700 cursor-pointer" fill="none" @click="show = !show"
                                 :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
                                 viewbox="0 0 576 512">

                                 
                                 <path fill="currentColor"
                                     d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                 </path>
                             </svg>



                         </div>
                     </div>
                 </div>

             </div>

             <div class="pt-3">


                 <button name="login" class="w-full h-11 bg-[#17082D] text-white text-lg font-semibold hover:bg-[#17082df4] duration-300 rounded-sm">Login</button>

             </div>
         </form>

     </div>

 </div>












 <?php include "./partials/Footer.php" ?>