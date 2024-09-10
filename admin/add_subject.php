<?php ob_start() ?>
<?php require_once("./adminPartials/Admin_header.php") ?>



<?php

if (isset($_POST['add_subject'])) {
    $subject = mysqli_real_escape_string($database, $_POST['subject']);
    $teacher_id = mysqli_real_escape_string($database, $_POST['teacher_id']);
    $sql = "SELECT * FROM subjects WHERE subject_name = '$subject'";
    $query = mysqli_query($database, $sql);
    $row = mysqli_num_rows($query);
    if ($row) {
        $_SESSION['error_sub'] = "Subject Name Already Exist";
    } else {
        $sql2 = "INSERT INTO subjects(`subject_name`, `teacher_id`) VALUES ('$subject', '$teacher_id')";
        $query2 = mysqli_query($database, $sql2);
        if ($query2) {
            $_SESSION['succ_message'] = "Subject Added Successfully";
            header("Location:subject.php");
        } else {
            $_SESSION['error_sub'] = "Failed Please try again";
        }
    }
}


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




<div class="w-[800px] h-[400px] bg-[#17082D] mx-auto relative top-24 overflow-hidden ">
    <div class="">

    </div>
    <div class="w-[650px]  bg-white mx-auto relative top-14 p-10 shadow-md shrink rounded-sm ">
        <h2 id="title_font" class="text-2xl font-bold text-[#17082D] text-center ">Add Subject</h2>
        <form method="post" action="">
            <div class=" pt-3">

                <input required name="subject" placeholder="Subject Name" class=" rounded-md  text-black border-2 border-gray-300 px-4   py-2.5 w-full  focus:ring-1 focus:ring-purple-400 transition ease-in-out duration-150" type="text">

            </div>

            <div class="pt-3">

                <?php
                $sql2 = "SELECT teacher_id, teacher_name FROM teachers";
                $query2 = mysqli_query($database, $sql2);
                $rows = mysqli_num_rows($query2);

                ?>
                <select name="teacher_id" class=" border-2 border-gray-300 placeholder:text-gray-600  text-gray-600  rounded-md   py-2.5 w-full  px-4 focus:ring-1   transition ease-in-out duration-150" id="">
                    <option value="">Select Teacher Name</option>
                    <?php
                    if ($rows) {
                        while ($row  = mysqli_fetch_array($query2)) {



                    ?>



                            <option value="<?php echo $row['teacher_id'] ?>"><?php echo $row['teacher_name'] ?></option>


                    <?php  }
                    } ?>

                </select>
            </div>



            <div class="pt-3">


                <button name="add_subject" class="w-full h-11 bg-[#17082D] text-white text-lg font-semibold hover:bg-[#17082df4] duration-300 rounded-sm">Add Subject</button>

            </div>
        </form>

    </div>

</div>

<?php require_once("./adminPartials/Admin_footer.php") ?>