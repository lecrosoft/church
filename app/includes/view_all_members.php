<div class="row">
    <div class="col-lg-12">
        <!-- <button id="text_btn" class="btn btn-success">click me</button> -->
        <div class="white-box">
            <!-- <h3 class="box-title m-b-0">Row Toggler</h3> -->
            <!-- <p class="text-muted m-b-20">
                Create your table with Toggle Footable
            </p> -->


            <div class="table-responsive">
                <table id="members" class="table display table-bordered table-striped">
                    <!-- <table id="myTable" class="table table-striped toggle-circle table-hover"> -->
                    <thead>
                        <tr class="bg-gradient-primary">

                            <th data-toggle="true"> Photo</th>
                            <th data-toggle="true"> Title</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>phone</th>
                            <th>DOB</th>

                            <th>Status</th>
                            <th>Actions</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $lecrosoft = "SELECT * FROM members ORDER BY last_name DESC";
                        $query_lecrosoft = mysqli_query($con, $lecrosoft);
                        while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
                            extract($row);
                            // $title = $row['title'];
                            // images/faces-clipart/pic-1.png
                            //$first_name = $row['first_name'];
                            //$last_name = $row['last_name'];
                            //$family = $row['family'];
                            //$title = $row['title'];
                            //$title = $row['title'];
                            //$title = $row['title'];
                            //$status = $row['status'];



                            $realdate = date("d M Y", strtotime($date_of_birth));
                            echo "<tr>";
                            echo "<td class='py-1'>
                            <img
                              src='./assets/images/users/$photo'
                              alt='image'
                            />
                          </td>";
                            echo "<td>$title</td>";
                            echo "<td>$last_name</td>";
                            echo "<td>$first_name</td>";
                            echo "<td>$phone_number_one</td>";
                            echo "<td> $realdate </td>";

                            echo " <td>
                            <label class='badge badge-gradient-info'>$status</label>
                        </td>";
                            echo " <td class='text-nowrap'><a href='members.php?source=member-profile&id=$member_id' data-toggle='tooltip' data-original-title='View'> <i class='mdi mdi-eye text-inverse m-r-10'></i> </a> <a href='members.php?source=edit&id=$member_id' data-toggle='tooltip' data-original-title='Edit'> <i class='mdi mdi-border-color text-warning m-r-10'></i> </a> <a class='delete_member' id='$member_id' data-toggle='tooltip' data-original-title='Delete'> <i class='mdi mdi-delete-forever text-danger'></i> </a> </td>";


                            echo "</tr>";
                        };

                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- ================CODE TO DELETE MEMBERS ========================= -->

    <?php

    if (isset($_POST['userId'])) {
        $user_id = $_POST['userId'];

        $sql = "DELETE FROM members WHERE  member_id = $user_id";
        $query_sql = mysqli_query($con, $sql) or die(mysqli_error($con));

        if ($query_sql) {
            echo "deleted";
        } else {
            echo "ERROR";
        }
    }
    ?>
</div>
<!-- /.row -->
<?php include('includes/external_js.php') ?>



<script>
    $(document).ready(function() {

        $('#example').DataTable();


    });
    $(document).ready(function() {

        $('#text_btn').click(function() {

            alert('good coder');


        });


    });
</script>

<script>
    $(document).ready(function() {
        $('.delete_member').click(function(e) {
            e.preventDefault();
            let memberId = $(this).attr('id');


            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-gradient-primary',
                    cancelButton: 'btn btn-gradient-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "includes/delete_members.php",
                        method: "post",
                        data: {
                            userId: memberId

                        },
                        success: function(data) {
                            swalWithBootstrapButtons.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            location = window.location.href
                        }

                    })

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })
        })
    })
</script>