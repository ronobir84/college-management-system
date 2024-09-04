<?php ob_start() ?>

<?php require_once("./adminPartials/Admin_header.php") ?>


<?php
include "../database.php";
if (isset($_POST['add_teacher'])) {
    $teacher_name = mysqli_real_escape_string($database, $_POST['teacher_name']);
    if (strlen($teacher_name) < 4 || strlen($teacher_name) > 100) {
        $name_error = "User Name Must  4 Character";
        $_SESSION['name_sms'] = $name_error;
    }
    $teacher_email = mysqli_real_escape_string($database, $_POST['teacher_email']);

    $file_name = $_FILES['images']['name'];
    $tmp_name = $_FILES['images']['tmp_name'];
    $size = $_FILES['images']['size'];
    $image_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $allow_type = ['jpg', 'png', 'jpeg'];
    $destination = "upload/" . $file_name;

    $category = mysqli_real_escape_string($database, $_POST['category']);
    $subject = mysqli_real_escape_string($database, $_POST['subject']);

    if (in_array($image_ext, $allow_type)) {
        if ($size <= 2000000) {


            move_uploaded_file($tmp_name, $destination);
            $sql = "INSERT INTO teachers(teacher_name,  teacher_email, teacher_image, teacher_category, teacher_subject) VALUES ('   $teacher_name',' $teacher_email','$file_name','$category', $subject)";
            $query = mysqli_query($database, $sql);

            if ($query) {

                $_SESSION['error_sms'] = "Teacher Added Successfully";
                header("Location:teacher.php");
            } else {
                $_SESSION['error_mes'] = 'Failed Please Try Agin';
                header("Location:add_teacher.php");
            }
        } else {
            $_SESSION['error_img'] = "image size should be 2mb";
            // header("Location:add_teacher.php");
        }
    } else {
        $_SESSION['error_file'] = "File type is not allow";
        // header("Location:add_teacher.php");
    }
}


?>



<div class="group absolute ml-[7%] mt-9 inline-block  ">
    <a href="teacher.php">
        <button class="focus:outline-none  ">

            <i class="fa-solid fa-arrow-left text-lg  w-12 h-12  p-2  duration-500 hover:bg-[#17082D] border-2 border-[#17082D] hover:text-white  text-[#17082D] rounded-full"></i>


        </button>
    </a>
    <button
        class="absolute -top-11 left-1/2 transform -translate-x-1/2 z-20  w-24 h-10 text-base font-bold text-white bg-[#17082D] rounded shadow-lg transition-transform duration-300 ease-in-out scale-0 group-hover:scale-100">Go Back</button>

</div>



<div class="w-[800px] h-[600px] bg-[#17082D] mx-auto relative top-10 overflow-hidden ">
    <div class="">
        <?php
        if (isset($_SESSION['error_file'])) {
            $error_file = $_SESSION['error_file'];
            echo "<span class='text-xl font-semibold text-red-700  absolute  left-[35%]  top-4'>$error_file</span>";
            unset($_SESSION['error_file']);
        }

        if (isset($_SESSION['name_sms'])) {
            $name_sms = $_SESSION['name_sms'];
            echo "<span class='text-xl font-semibold text-red-700  absolute  left-[35%]  top-4'>$name_sms</span>";
            unset($_SESSION['name_sms']);
        }
        if (isset($_SESSION['error_img'])) {
            $error_img = $_SESSION['error_img'];
            echo "<span class='text-xl font-semibold text-red-700  absolute  left-[35%]  top-4'>$error_img</span>";
            unset($_SESSION['error_img']);
        }

        ?>

    </div>
    <div class="w-[650px]  bg-white mx-auto relative top-16 p-10 shadow-md shrink rounded-sm ">
        <h2 id="title_font" class="text-2xl font-bold text-[#17082D] text-center ">Add Teacher</h2>
        <form method="post" action="" enctype="multipart/form-data">
            <div class=" pt-3">

                <input name="teacher_name" placeholder="Teacher Name" class=" rounded-md  text-black border-2 border-gray-300 px-4   py-2.5 w-full  focus:ring-1   transition ease-in-out duration-150" type="text">

            </div>
            <div class=" pt-3">

                <input name="teacher_email" placeholder="Teacher Email" class=" rounded-md  text-black border-2 border-gray-300 px-4   py-2.5 w-full  focus:ring-1   transition ease-in-out duration-150" type="email">

            </div>
            <div class="flex justify-between pt-3">
                <input name="images" type="file" class="w-full p-2.5 border-2 border-gray-300 cursor-pointer px-4 rounded-md focus:ring-1   transition ease-in-out duration-150">
                <i class="fa-solid fa-user text-3xl pt-2  absolute  right-14  cursor-pointer "></i>
            </div>
            <div class="pt-3">



                <select name="category" class=" border-2 border-gray-300 placeholder:text-gray-600  text-gray-600  rounded-md   py-2.5 w-full  px-4 focus:ring-1   transition ease-in-out duration-150" id="">
                    <option value="">Select Category</option>
                    <option value="1">Principal</option>
                    <option value="2">Assistant Professor</option>
                    <option value="3">Lecturer</option>
                </select>

            </div>
            <?php
            $sql2 = "SELECT * FROM subjects";
            $query2 = mysqli_query($database, $sql2);

            ?>
            <div class="pt-3">
                <select name="subject" class=" border-2 border-gray-300 placeholder:text-gray-600  text-gray-600  rounded-md   py-2.5 w-full  px-4 ">
                    <option value="">Select Subject</option>
                    <?php
                    while ($sub = mysqli_fetch_assoc($query2)) {

                    ?>
                        <option value="<?php echo $sub['subject_id'] ?>"><?php echo $sub['subject_name'] ?></option>


                    <?php  } ?>
                </select>

            </div>

            <div class="pt-3">


                <button name="add_teacher" class="w-full h-11 bg-[#17082D] text-white text-lg font-semibold hover:bg-[#17082df4] duration-300 rounded-sm">Add Teacher</button>

            </div>
        </form>

    </div>

</div>







<?php require_once("./adminPartials/Admin_footer.php") ?>