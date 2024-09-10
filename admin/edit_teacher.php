<?php ob_start() ?>



<?php require_once("./adminPartials/Admin_header.php") ?>

<?php

$id = $_GET['id'];
if (empty($id)) {
    header("Location:teacher.php");
}
if (isset($_POST['update_teacher'])) {
    $teacher_name = mysqli_real_escape_string($database, $_POST['teacher_name']);
    $teacher_email = mysqli_real_escape_string($database, $_POST['teacher_email']);
    $folder = "upload/";
    $image_file = $_FILES['images']['name'];
    $file = $_FILES['images']['tmp_name'];
    $path = $folder . $image_file;
    $target_file = $folder . basename($image_file);
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    if ($file != '') {
        //Set image upload size 
        if ($_FILES["images"]["size"] > 5000000) {
            $error[] = 'Sorry, your image is too large. Upload less than 500 KB in size.';
        }
        //Allow only JPG, JPEG, PNG & GIF 
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';
        }
    }

    $teacher_category = mysqli_real_escape_string($database, $_POST['teacher_category']);
    if (!isset($error)) {
        if ($file != '') {
            $res = mysqli_query($database, "SELECT* from teachers WHERE teacher_id = '$id' limit 1");
            if ($row = mysqli_fetch_array($res)) {
                $delete_image = $row['teacher_image'];
            }
            unlink($folder . $delete_image);
            move_uploaded_file($file, $target_file);
            $result = mysqli_query($database, "UPDATE teachers SET  teacher_name='$teacher_name', teacher_email='$teacher_email',   teacher_image ='$image_file',   teacher_category='$teacher_category'  WHERE teacher_id = '$id'");
        } else {
            $result = mysqli_query($database, "UPDATE teachers SET teacher_name ='$teacher_name', teacher_email='$teacher_email',   teacher_category='$teacher_category'  WHERE teacher_id = '$id'");
        }
        if ($result) {
            $_SESSION['teacher_succ'] = "Teacher Data Updated Successful";
            header("location:teacher.php?action=saved");
        } else {
            $_SESSION['teacher_error'] = 'Something went wrong';
        }
    }
}


if (isset($error)) {

    foreach ($error as $error) {
        $_SESSION['type_error'] = $error;
    }
}
$res = mysqli_query($database, "SELECT * FROM teachers   WHERE teacher_id = '$id' ");
if ($row = mysqli_fetch_array($res)) {
    $teacher_image = $row['teacher_image'];
    $teacher_name = $row['teacher_name'];
    $teacher_email = $row['teacher_email'];
    $teacher_category = $row['teacher_category'];
}
?>

<?php

if (isset($update_succ)) {
    $_SESSION['update_succ'] = 'Image Updated successfully';

    header("Location:teacher.php");
} else {
    // $_SESSION['update_error'] = "Failed Please Try Again";
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
        if (isset($_SESSION['type_error'])) {
            $type_error = $_SESSION['type_error'];
            echo "<span class='text-xl font-semibold text-red-700  absolute  left-[35%]  top-4'>$type_error</span>";
            unset($_SESSION['update_error']);
        }


        ?>


    </div>
    <div class="w-[650px]  bg-white mx-auto relative top-16 p-10 shadow-md shrink rounded-sm ">
        <h2 id="title_font" class="text-2xl font-bold text-[#17082D] text-center ">Update Teacher</h2>
        <form method="post" action="" enctype="multipart/form-data">
            <div class=" pt-3">

                <input name="teacher_name" value="<?php echo $teacher_name ?>" class=" rounded-md  text-black border-2 border-gray-300 px-4   py-2.5 w-full  focus:ring-1   transition ease-in-out duration-150" type="text">

            </div>
            <div class=" pt-3">

                <input name="teacher_email" value="<?php echo $teacher_email ?>" class=" rounded-md  text-black border-2 border-gray-300 px-4   py-2.5 w-full  focus:ring-1   transition ease-in-out duration-150" type="email">

            </div>
            <div class="flex justify-between pt-3">
                <input name="images" type="file" class="w-full p-2.5 border-2 border-gray-300 cursor-pointer px-4 rounded-md focus:ring-1   transition ease-in-out duration-150">
                <img class="w-[52px] h-[52px] rounded-md absolute  right-12 p-2" src="upload/<?php echo $teacher_image ?>" alt="">
            </div>
             
            <div class="pt-3">
                <?php

                $sql = "SELECT teacher_category FROM  teachers WHERE teacher_id = '$id'";
                $query = mysqli_query($database, $sql);

                if (isset($_POST['update_teacher'])) {

                    $category = mysqli_real_escape_string($database, $_POST['subject_category']);
                    $sql3 = "UPDATE teachers SET teacher_category = '$category' WHERE teacher_id = '$id'";

                    $query3 = mysqli_query($database, $sql3);
                }




                ?>


                <select name="teacher_category" class=" border-2 border-gray-300 placeholder:text-gray-600  text-gray-600  rounded-md   py-2.5 w-full  px-4 focus:ring-1   transition ease-in-out duration-150" id="">
                    <?php
                    while ($category = mysqli_fetch_array($query)) {



                    ?>
                        <option value="<?php echo $category['teacher_category'] ?>">
                            <?php
                            if ($category['teacher_category'] == 1) {
                                echo "Principal";
                            } elseif ($category['teacher_category'] == 2) {
                                echo "Assistant Professor";
                            } elseif ($category['teacher_category'] == 3) {
                                echo "Lecturer";
                            }


                            ?>


                        </option>

                    <?php  } ?>
                    <option value="1">Principal</option>
                    <option value="2">Assistant Professor</option>
                    <option value="3">Lecturer</option>
                </select>

            </div>



            <div class="pt-3">


                <button name="update_teacher" class="w-full h-11 bg-[#17082D] text-white text-lg font-semibold hover:bg-[#17082df4] duration-300 rounded-sm">Update Teacher</button>

            </div>
        </form>

    </div>

</div>









<?php require_once("./adminPartials/Admin_footer.php") ?>