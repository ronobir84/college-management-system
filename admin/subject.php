<?php ob_start(); ?>
<?php require_once('./adminPartials/Admin_header.php') ?>

<?php

if (isset($_POST['delete_subject'])) {
    $subject_id = $_POST['subject_id'];
    $sql2 = "DELETE FROM subjects WHERE subject_id = '$subject_id' ";
    $query2 = mysqli_query($database, $sql2);
    if ($query2) {
        $_SESSION['delete_succ'] = "Subject Has Been Deleted Successful";
    } else {
        $_SESSION['delete_error'] = "Failed Please Try Again";
    }
}


if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
$limit = 4;

$offset = ($page - 1) * $limit;
echo $offset;


?>





<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow relative top-10">
        <div class="card-header py-3 d-flex justify-content-between ">

            <a href="add_subject.php">
                <button
                    type="button"
                    class="bg-white text-center w-48 rounded-sm shadow   h-14 relative font-sans text-black text-xl font-semibold group">
                    <div
                        class="bg-[#17082D] rounded-sm  h-12 w-1/4 flex items-center justify-center absolute left-1 top-[4px] group-hover:w-[184px] z-10 duration-500">
                        <i class="fa-solid fa-arrow-right w-6 h-6 text-white"></i>
                    </div>
                    <p class="translate-x-4">Add Subject</p>
                </button>
            </a>
            <!-- alert -->

            <?php



            if (isset($_SESSION['succ_subject'])) {
                $succ_subject = $_SESSION['succ_subject'];
                echo "<span class='text-xl font-semibold text-green-700 relative  top-2'>$succ_subject</span>";
                unset($_SESSION['succ_subject']);
            }


            ?>



            <!-- alert -->

            <form action="">
                <div class="relative">
                    <input
                        placeholder="Search User...."
                        class="input shadow  border-gray-300 px-4 py-3  w-64 transition-all  focus:w-72 outline-none"
                        name="search"
                        type="search" />
                    <button class="py-[13px] px-4 text-white font-semibold bg-[#17082D] relative right-1 text-lg">Search</button>

                </div>
            </form>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th><span class="text-lg text-[#309267] font-bold">Subjects Id</span></th>
                            <th><span class="text-lg text-[#309267] font-bold">Subjects Name</span></th>
                            <th><span class="text-lg text-[#309267] font-bold">Teachers Name</span></th>


                            <th colspan="2"><span class="text-xl text-[#309267] font-bold">Actions</span></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sql = "SELECT * FROM subjects LEFT JOIN teachers ON subjects.teacher_id = teachers.teacher_id LIMIT $offset , $limit";
                        $query = mysqli_query($database, $sql);
                        $rows = mysqli_num_rows($query);

                        if ($rows) {
                            while ($row = mysqli_fetch_assoc($query)) {





                        ?>
                                <tr class="text-center">
                                    <td class="text-lg text-black font-semibold"> <?php echo $row['subject_id'] ?></td>
                                    <td class="text-lg text-black font-semibold"><?php echo $row['subject_name'] ?> </td>




                                    <td class="text-lg text-black font-semibold">
                                        <?php echo $row['teacher_name'] ?>
                                    </td>


                                    <td class="py-2 w-80">
                                        <form method="post" onsubmit="return confirm('Are You Sure You want to delete?')" action="<?php $_SERVER['PHP_SELF'] ?>">

                                            <div class="group relative inline-block">
                                                <a class="focus:outline-none pr-2" href="edit_subject.php?id=<?php echo $row['subject_id'] ?>">
                                                    <i class="fa-solid fa-user-pen text-lg  w-12 h-12  p-2  duration-500 hover:bg-[#17082D] border-2 border-[#17082D] hover:text-white  text-[#17082D] rounded-full"></i>
                                                </a>


                                                <span
                                                    class="absolute -top-11 left-1/2 transform -translate-x-1/2 z-20 px-4 py-2 text-base font-bold text-white bg-[#17082D] rounded-lg shadow-lg transition-transform duration-300 ease-in-out scale-0 group-hover:scale-100">Edit</span>
                                            </div>



                                            <div class="group relative inline-block">

                                                <input name="subject_id" value="<?php echo $row['subject_id'] ?>" type="hidden">
                                                <button name="delete_subject" value="delete" class="focus:outline-none pr-2">
                                                    <i class="fa-solid fa-trash text-lg  w-12 h-12  p-2  duration-500 hover:bg-red-700 border-2 border-red-700 hover:text-white  text-red-700 rounded-full"></i>
                                                </button>

                                                <span
                                                    class="absolute -top-11 left-1/2 transform -translate-x-1/2 z-20 px-4 py-2 text-base font-bold text-white bg-red-700 rounded-lg shadow-lg transition-transform duration-300 ease-in-out scale-0 group-hover:scale-100">Delate</span>
                                            </div>


                                            <div class="group relative inline-block ">


                                                <a href="view_subject.php?id=<?php echo $row['subject_id'] ?>">
                                                    <button class="" type="button">

                                                        <i class="fa-solid fa-eye text-lg  w-12 h-12  p-2  duration-500 hover:bg-[#309267] border-2 border-[#309267] hover:text-white  text-[#309267] rounded-full"></i>

                                                    </button>
                                                </a>


                                                <span
                                                    class="absolute -top-11 left-1/2 transform -translate-x-1/2 z-20 px-4 py-2 text-base font-bold text-white bg-[#309267] rounded-lg shadow-lg transition-transform duration-300 ease-in-out scale-0 group-hover:scale-100">View</span>

                                            </div>



                                        </form>
                                    </td>

                                </tr>

                            <?php
                            }
                        } else {
                            ?>

                            <tr>
                                <td colspan='3'>No Record Found</td>

                            </tr>
                        <?php
                        }
                        ?>








                    </tbody>
                </table>


            </div>

            <!-- pagination   -->
            <?php
            $pagination = "SELECT * FROM subjects";
            $run_q = mysqli_query($database, $pagination);
            $total_post = mysqli_num_rows($run_q);
            $pages = ceil($total_post / $limit);
            if ($total_post > $limit) {



            ?>
                <div class="absolute left-[40%] mt-12">
                    <div class="">
                        <?php
                        for ($i = 1; $i <= $pages; $i++) {

                            if ($i == $page) {
                                echo "<button class ='w-12 h-12 rounded-full  shadow-xl shadow-[#17082D]  border-2 border-[#17082D]  text-xl font-bold  bg-[#17082D] text-white duration-500 ml-2'>$i</button>";
                            } else {
                                echo "<a href='subject.php?page=$i'><button class ='w-12 h-12 border-2 rounded-full  border-[#17082D] shadow-xl shadow-[#17082D]   text-xl font-bold text-[#17082D]   hover:bg-[#17082D] hover:text-white duration-500 ml-2'>$i</button></a>";
                            };
                        }

                        ?>



                    </div>

                </div>
            <?php  } ?>
            <!-- ------------------ -->

        </div>
    </div>





</div>

<!-- /.container-fluid -->
</div>



<?php require_once('./adminPartials/Admin_footer.php') ?>