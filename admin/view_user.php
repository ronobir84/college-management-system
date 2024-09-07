<?php include "./adminPartials/Admin_header.php" ?>




<?php
$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE user_id = '$id'";
$query = mysqli_query($database, $sql);
$row = mysqli_fetch_assoc($query);



?>





<div class="group absolute ml-[10%] mt-8 inline-block  ">
    <a href="user.php">
        <button class="focus:outline-none  ">

            <i class="fa-solid fa-arrow-left text-lg  w-12 h-12  p-2 relative  duration-500 hover:bg-[#17082D] border-2 border-[#17082D] hover:text-white  text-[#17082D] rounded-full"></i>


        </button>
    </a>
    <button
        class="absolute -top-11 left-1/2 transform -translate-x-1/2 z-20  w-24 h-10 text-base font-bold text-white bg-[#17082D] rounded shadow-lg transition-transform duration-300 ease-in-out scale-0 group-hover:scale-100">Go Back</button>

</div>



<div class="relative    mx-auto top-16 ">
    <!-- Modal content -->
    <div class="relative bg-[#17082D] rounded-sm w-[600px] h-[550px] mx-auto  shadow  ">
        <!-- Modal header -->

        <!-- Modal body -->
        <div class="py-12">
            <div class=" space-y-5 w-[350px] h-[400px]  top-7 shadow-sm rounded-sm mx-auto relative pt-5 bg-gradient-to-tr from-emerald-800 via-green-400 to-indigo-900">
                <div class="text-center">
                    <h3 id="title_font" class="text-3xl font-bold text-[#17082D] text-center relative t">
                        User Details
                    </h3>

                </div>
                <div>
                    <img class="w-24 h-24 mx-auto" src=".././images/profile-circle-icon-2048x2048-cqe5466q.png" alt="">
                    <div>
                        <h2 class="text-xl text-white font-bold pt-2 text-center"><span class="text-slate-200 font-semibold">Sr.No :</span>000<?php echo $row['user_id'] ?></h2>
                    </div>
                </div>
                <div class="space-y-1 text-center">
                    <h2 class="text-xl font-semibold text-white"><span class="text-slate-200 font-semibold">Name : </span><?php echo $row['user_name'] ?></h2>
                    <h2 class="text-xl font-semibold text-white"><span class="text-slate-200 font-semibold">Email : </span><?php echo $row['user_email'] ?></h2>
                    <h2 class="text-xl font-semibold text-white"><span class="text-slate-200 font-semibold">Role :</span> <?php
                                                                                                                            if ($row['role'] == 1) {
                                                                                                                                echo "Admin";
                                                                                                                            } elseif ($row['role'] == 2) {
                                                                                                                                echo "Teacher";
                                                                                                                            } elseif ($row['role'] == 3) {
                                                                                                                                echo "Student";
                                                                                                                            }


                                                                                                                            ?></h2>
                </div>


            </div>
        </div>
        <!-- Modal footer -->

    </div>
</div>











<?php include "./adminPartials/Admin_footer.php" ?>