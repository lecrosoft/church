
<?php

// ============ DEPARTMENT FUNCTION STARTS HERE ==============
function selectDepartment()
{
  global $con;


  $lecrosoft = "SELECT * FROM department";
  $query_lecrosoft = mysqli_query($con, $lecrosoft);

  while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
    $department_id = $row['department_id'];
    $department = $row['department_name'];
    $department_leader = $row['department_leader_name'];
    echo "<tr>";
    echo "<td>$department</td>";
    echo "<td>$department_leader</td>";
    echo "<td class='text-nowrap'><a href='department.php?edit_id=$department_id' data-toggle='tooltip' data-original-title='Edit'> <i class='fa fa-pencil text-inverse m-r-10'></i> </a> <a onClick=\"javascript: return confirm ('Are you sure you want to delete this category?');\" href='department.php?del_id=$department_id'  data-toggle='tooltip' data-original-title='Delete'> <i class='far fa-trash-alt text-danger'></i> </a> </td>";
    echo "</tr>";
  }
}
function
deleteDepartment()

{
  global $con;
  if (isset($_GET['del_id'])) {
    $del_id = $_GET['del_id'];
    $lecrosoft = "DELETE FROM department WHERE department_id = $del_id";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);
  }
}

function addDepartment()
{
  global $con;
  if (isset($_POST['save'])) {

    $department_name = $_POST['department_name'];
    $department_leader = $_POST['department_leader'];
    if (!empty($department_name) && !(empty($department_leader))) {
      $lecrosoft = "INSERT INTO `department`(`department_name`, `department_leader_name`) VALUES ( '$department_name','$department_leader')";
      $query_lecrosoft = mysqli_query($con, $lecrosoft);
      if (!$lecrosoft) {
        die("QUERY ERROR" . mysqli_error($con));
      } else {
        recordSuccessMessage();
        echo '<script type="text/javascript">location="department.php"</script>';
      }
    }
  }
}
// ============ DEPARTMENT FUNCTION END HERE ==============

// ============ MESSAGE ALLERT  FUNCTION STARTS HERE ==============
function
recordSuccessMessage()
{
  echo '<div class="alert alert-success" id="success-alert">
   <button type="button" class="close" data-dismiss="alert">x</button>
   <strong>Success!</strong>
   Record has been added successfully.
</div>';
}
function recordDangerMessage()
{
  echo '<div class="alert alert-danger" id="success-alert">
   <button type="button" class="close" data-dismiss="alert">x</button>
   <strong>Faild!</strong>
   Record Not Added.
</div>';
}

// ============ MESSAGE ALLERT  FUNCTION END HERE ==============


// ============ FAMILY  FUNCTION STARTS HERE ==============


function selectFamily()
{
  global $con;


  $lecrosoft = "SELECT * FROM family";
  $query_lecrosoft = mysqli_query($con, $lecrosoft);

  while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
    $family_id = $row['family_id'];
    $family_name = $row['family_name'];
    $family_leader = $row['family_leader'];
    $family_quantity = $row['family_quantity'];
    $family_contact = $row['family_contact'];
    $address = $row['address'];
    $join_date = $row['join_date'];
    $status = $row['status'];

    $family_leader = $row['family_leader'];
    echo "<tr>";
    echo "<td>$family_name</td>";
    echo "<td>$family_leader</td>";
    echo "<td>$family_quantity</td>";
    echo "<td>$family_contact</td>";
    echo "<td>$address</td>";
    echo "<td>$join_date</td>";
    echo "<td>$status</td>";

    echo "<td class='text-nowrap'><a type='button'  id='$family_id' class='view_data' data-toggle='tooltip' data-original-title='Edit'> <i class='fa fa-pencil text-inverse m-r-10'></i> </a> <a onClick=\"javascript: return confirm ('Are you sure you want to delete this category?');\" href='department.php?del_id=$family_id'  data-toggle='tooltip' data-original-title='Delete'> <i class='fa fa-trash-o text-danger'></i> </a> </td>";
    echo "</tr>";
  }
}
function
deleteFamily()

{
  global $con;
  if (isset($_GET['del_id'])) {
    $del_id = $_GET['del_id'];
    $lecrosoft = "DELETE FROM department WHERE department_id = $del_id";
    $query_lecrosoft = mysqli_query($con, $lecrosoft);
  }
}

function addFamily()
{
  global $con;
  if (isset($_POST['save'])) {

    $department_name = $_POST['department_name'];
    $department_leader = $_POST['department_leader'];
    if (!empty($department_name) && !(empty($department_leader))) {
      $lecrosoft = "INSERT INTO `department`(`department_name`, `department_leader_name`) VALUES ( '$department_name','$department_leader')";
      $query_lecrosoft = mysqli_query($con, $lecrosoft);
      if (!$lecrosoft) {
        die("QUERY ERROR" . mysqli_error($con));
      } else {
        recordSuccessMessage();
        echo '<script type="text/javascript">location="department.php"</script>';
      }
    }
  }
}

// ============ FAMILY  FUNCTION END HERE ==============