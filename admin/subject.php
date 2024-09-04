<?php require_once('./adminPartials/Admin_header.php') ?>





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
                            <th><span class="text-lg text-[#309267] font-bold">Subject Id</span></th>
                            <th><span class="text-lg text-[#309267] font-bold">Subject Name</span></th>
                             

                            <th colspan="2"><span class="text-xl text-[#309267] font-bold">Action</span></th>
                        </tr>
                    </thead>
                    <tbody>
                                <tr class="text-center">
                                    <td class="text-lg text-black font-semibold"> </td>
                                    <td class="text-lg text-black font-semibold"> </td>
                                    
                                     
                                    <td class="py-2 w-80">
                                        <form method="post" onsubmit="return confirm('Are You Sure You want to delete?')" action="<?php $_SERVER['PHP_SELF'] ?>">

                                            <div class="group relative inline-block">
                                                <a class="focus:outline-none pr-2" href=" ">
                                                    <i class="fa-solid fa-user-pen text-lg  w-12 h-12  p-2  duration-500 hover:bg-[#17082D] border-2 border-[#17082D] hover:text-white  text-[#17082D] rounded-full"></i>
                                                </a>


                                                <span
                                                    class="absolute -top-11 left-1/2 transform -translate-x-1/2 z-20 px-4 py-2 text-base font-bold text-white bg-[#17082D] rounded-lg shadow-lg transition-transform duration-300 ease-in-out scale-0 group-hover:scale-100">Edit</span>
                                            </div>



                                            <div class="group relative inline-block">

                                                <input name="user_id" type="hidden">
                                                <button name="delete_user" value="delete" class="focus:outline-none pr-2">
                                                    <i class="fa-solid fa-trash text-lg  w-12 h-12  p-2  duration-500 hover:bg-red-700 border-2 border-red-700 hover:text-white  text-red-700 rounded-full"></i>
                                                </button>

                                                <span
                                                    class="absolute -top-11 left-1/2 transform -translate-x-1/2 z-20 px-4 py-2 text-base font-bold text-white bg-red-700 rounded-lg shadow-lg transition-transform duration-300 ease-in-out scale-0 group-hover:scale-100">Delate</span>
                                            </div>


                                            <div class="group relative inline-block ">


                                                <a href=" ">
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
                                <tr>
                                    <td colspan='3'>No Record Found</td>

                                </tr>


                    

                    </tbody>
                </table>


            </div>
        </div>
    </div>





</div>

<!-- /.container-fluid -->
</div>



<?php require_once('./adminPartials/Admin_footer.php') ?>