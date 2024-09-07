<?php ob_start() ?>


<?php require_once('./adminPartials/Admin_header.php') ?>

<?php

$subject_id = $_GET['id'];
if (empty($subject_id)) {
    header("Location:subject.php");
}
$sql = "SELECT * FROM `subjects` WHERE subject_id = '$subject_id'";
$query = mysqli_query($database, $sql);
$row = mysqli_fetch_assoc($query);

?>


<?php 
if (isset($_POST['update_subject'])) {
    $subject_name = mysqli_real_escape_string($database, $_POST['subject_name']);
    $sql2 = "UPDATE subjects SET subject_name = '$subject_name' WHERE subject_id = '$subject_id'";
    $query2 = mysqli_query($database, $sql2);
    if ($query2) {
        $_SESSION['succ_subject'] = "Subject Has Been Updated Successful";
        header("Location:subject.php");
    }else{
        $_SESSION['error_subject'] = "Failed Please try Again";
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
    <div class="w-[650px]  bg-white mx-auto relative top-20 p-10 shadow-md shrink rounded-sm ">
        <h2 id="title_font" class="text-2xl font-bold text-[#17082D] text-center ">Update Subject</h2>
        <form method="post" action="">
            <div class=" pt-3">

                <input required name="subject_name" value="<?php echo $row['subject_name']?>" class=" rounded-md  text-black border-2 border-gray-300 px-4   py-2.5 w-full  focus:ring-1 focus:ring-purple-400 transition ease-in-out duration-150" type="text">

            </div>



            <div class="pt-3">


                <button name="update_subject" class="w-full h-11 bg-[#17082D] text-white text-lg font-semibold hover:bg-[#17082df4] duration-300 rounded-sm">Update Subject</button>

            </div>
        </form>

    </div>

</div>




<?php require_once('./adminPartials/Admin_footer.php') ?>