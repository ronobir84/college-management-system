<?php ob_start() ?>
<?php require_once("./adminPartials/Admin_header.php") ?>




<?php

$subject_id = $_GET['id'];

if (empty($subject_id)) {
    header("Location: subject.php");
}

$sql = "SELECT * FROM subjects WHERE subject_id = '$subject_id'";

$query = mysqli_query($database, $sql);

$result = mysqli_fetch_assoc($query);



?>
<div class="group absolute ml-[7%] mt-9 inline-block  ">
    <a href="subject.php">
        <button class="focus:outline-none  ">

            <i class="fa-solid fa-arrow-left text-lg  w-12 h-12  p-2  duration-500 hover:bg-[#17082D] border-2 border-[#17082D] hover:text-white  text-[#17082D] rounded-full"></i>


        </button>
    </a>
    <button
        class="absolute -top-11 left-1/2 transform -translate-x-1/2 z-20  w-24 h-10 text-base font-bold text-white bg-[#17082D] rounded shadow-lg transition-transform duration-300 ease-in-out scale-0 group-hover:scale-100">Go Back</button>

</div>


<div class="relative    mx-auto top-16 ">
    <!-- Modal content -->
    <div class="relative bg-[#17082D] rounded-sm w-[600px] h-[450px] mx-auto  shadow  ">
        <!-- Modal header -->

        <!-- Modal body -->
        <div class="py-12">
            <div class=" space-y-5 w-[350px] h-[300px]  top-7 shadow-sm rounded-sm mx-auto relative pt-5 bg-gradient-to-tr from-emerald-800 via-green-400 to-indigo-900">
                <div class="text-center">
                    <h3 id="title_font" class="text-3xl font-bold text-[#17082D] text-center relative t">
                        Subject Details
                    </h3>

                </div>

                <div class="space-y-1 text-center pt-4">
                    <h2 class="text-2xl font-bold text-[#17082D]"><span>Subject Code</span> : <?php echo $result['subject_id'] ?> </h2>
                    <h2 class="text-2xl font-bold text-[#17082D]"><span>Subject Name</span> : <?php echo $result['subject_name'] ?></h2>




                </div>


            </div>
        </div>
        <!-- Modal footer -->

    </div>
</div>








<?php require_once("./adminPartials/Admin_footer.php") ?>