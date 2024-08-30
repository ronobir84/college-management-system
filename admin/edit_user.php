<?php ob_start() ?>

<?php include "./adminPartials/Admin_header.php" ?>


<?php

include '../database.php';




$id = $_GET['id'];


$sql = "SELECT * FROM users WHERE  user_id  = '$id'";
$query = mysqli_query($database, $sql);
$row = mysqli_fetch_assoc($query);





?>


<?php


if (isset($_POST['update_user'])) {
    $username = mysqli_real_escape_string($database, $_POST['username']);
    $email = mysqli_real_escape_string($database, $_POST['email']);
    $password = mysqli_real_escape_string($database, $_POST['password']);
    $role = mysqli_real_escape_string($database, $_POST['role']);

    $sql2 = "UPDATE users SET  user_name='$username', user_email='$email', user_password ='$password', `role`='$role' WHERE user_id = '$id' ";
    $query2 = mysqli_query($database, $sql2);
    if ($query2) {
        $_SESSION['sms'] = "Data Updated Successful";
        header("Location:user.php");
    } else {
        $_SESSION['error_sms'] = "Failed Please try again";
    }
}



?>




<div class="group absolute ml-[7%] mt-9 inline-block  ">
    <a href="user.php">
        <button class="focus:outline-none  ">

            <i class="fa-solid fa-arrow-left text-lg  w-12 h-12  p-2  duration-500 hover:bg-[#17082D] border-2 border-[#17082D] hover:text-white  text-[#17082D] rounded-full"></i>


        </button>
    </a>
    <button
        class="absolute -top-11 left-1/2 transform -translate-x-1/2 z-20  w-24 h-10 text-base font-bold text-white bg-[#17082D] rounded shadow-lg transition-transform duration-300 ease-in-out scale-0 group-hover:scale-100">Go Back</button>

</div>
 
<div class="w-[800px] h-[600px] bg-[#17082D] mx-auto relative top-10 overflow-hidden ">
    <div class="pt-[90px]">

    </div>
    <div class="w-[650px]  bg-white mx-auto relative top- p-10 shadow-md shrink rounded-sm ">
        <h2 id="title_font" class="text-2xl font-bold text-[#17082D] text-center ">Update User</h2>
        <form method="post" action=" ">
            <div class=" pt-3">

                <input name="username" value="<?php echo $row['user_name'] ?>" placeholder="username" class=" rounded-md  text-black border-2 border-gray-300 px-4   py-2.5 w-full  focus:ring-1 focus:ring-purple-400 transition ease-in-out duration-150" type="text">

            </div>
            <div class=" pt-3">

                <input name="email" value="<?php echo $row['user_email'] ?>" placeholder="user email" class=" rounded-md  text-black border-2 border-gray-300 px-4   py-2.5 w-full  focus:ring-1 focus:ring-purple-400 transition ease-in-out duration-150" type="email">

            </div>
            <div class=" pt-3">


                <div class="" x-data="{ show: true }">

                    <div class="relative">
                        <input name="password" value="<?php echo $row['user_password'] ?>" placeholder="" :type="show ? 'password' : 'text'" class=" rounded-md  text-black border-2 border-gray-300 px-4   py-2.5 w-full  focus:ring-1 focus:ring-purple-400 transition ease-in-out duration-150">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                            <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                                :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
                                viewbox="0 0 640 512">
                                <path fill="currentColor"
                                    d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                </path>
                            </svg>

                            <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                                :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
                                viewbox="0 0 576 512">
                                <path fill="currentColor"
                                    d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                </path>
                            </svg>



                        </div>
                    </div>
                </div>





            </div>

            <div class="pt-3">

                <?php

                $sql2 = "SELECT role FROM users WHERE user_id = '$id'";
                $query3 =  mysqli_query($database, $sql2)





                ?>

                <select value="" name="role" class=" border-2 border-gray-300 placeholder:text-gray-600  text-gray-600    py-2.5 w-full  px-3  " id="">
                    <?php while ($roles = mysqli_fetch_assoc($query3)) {
                        # code...
                    ?>
                        <option value="<?php echo $roles['role'] ?>"><?php

                                                                    if ($roles['role'] == 1) {
                                                                        echo "Admin";
                                                                    } elseif ($roles['role'] == 2) {
                                                                        echo "Teacher";
                                                                    } elseif ($roles['role'] == 3) {
                                                                        echo "Student";
                                                                    }
                                                                    ?></option>

                    <?php } ?>
                    <option value="1">Admin</option>
                    <option value="2">Teacher</option>
                    <option value="3">Student</option>








                </select>

            </div>
            <div class="pt-3">


                <button name="update_user" class="w-full h-11 bg-[#17082D] text-white text-lg font-semibold hover:bg-[#17082df4] duration-300 rounded-sm">Update</button>

            </div>
        </form>

    </div>

</div>













<?php include "./adminPartials/Admin_footer.php" ?>