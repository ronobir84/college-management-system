<?php require_once("./adminPartials/Admin_header.php") ?>


<?php 

if (isset($_POST['add_teacher'])) {
    $teacher_name = mysqli_real_escape_string($database, $_POST['teacher_name']);
    $teacher_email = mysqli_real_escape_string($database, $_POST['teacher_email']);

    // image uploaded commend
    $file_name = $_FILES['teacher_image']['name'];
    $tmp_name = $_FILES['teacher_image']['tmp_name'];
    $size = $_FILES['teacher_image']['size'];
    $image_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $allow_type = ['jpg', 'png', 'jpeg'];
    $destination = "upload/" . $file_name;

    $category = mysqli_real_escape_string($database, $_POST['category']);
    

     
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

    </div>
    <div class="w-[650px]  bg-white mx-auto relative top-24 p-10 shadow-md shrink rounded-sm ">
        <h2 id="title_font" class="text-2xl font-bold text-[#17082D] text-center ">Add Teacher</h2>
        <form method="post" action="">
            <div class=" pt-3">

                <input name="teacher_name" placeholder="Teacher Name" class=" rounded-md  text-black border-2 border-gray-300 px-4   py-2.5 w-full  focus:ring-1   transition ease-in-out duration-150" type="text">

            </div>
            <div class=" pt-3">

                <input name="teacher_email" placeholder="Teacher Email" class=" rounded-md  text-black border-2 border-gray-300 px-4   py-2.5 w-full  focus:ring-1   transition ease-in-out duration-150" type="email">

            </div>
            <div class="flex justify-between pt-3">
                <input name="teacher_image" type="file" class="w-full p-2.5 border-2 border-gray-300 cursor-pointer px-4 rounded-md">
                <i class="fa-solid fa-user text-3xl pt-2  absolute  right-14  cursor-pointer "></i>
            </div>
            <div class="pt-3">



                <select name="category" class=" border-2 border-gray-300 placeholder:text-gray-600  text-gray-600  rounded-md   py-2.5 w-full  px-4  " id="">
                    <option value="">Select Role</option>
                    <option value="1">Principal</option>
                    <option value="2">Assistant Professor</option>
                    <option value="3">Lecturer</option>
                </select>

            </div>

            <div class="pt-3">


                <button name="add_teacher" class="w-full h-11 bg-[#17082D] text-white text-lg font-semibold hover:bg-[#17082df4] duration-300 rounded-sm">Add Teacher</button>

            </div>
        </form>

    </div>

</div>







<?php require_once("./adminPartials/Admin_footer.php") ?>