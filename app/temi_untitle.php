 <?php




    while ($row = mysqli_fetch_assoc($query_lecrosoft)) {
        extract($row);
        echo "<tr>";
        echo "<td name='member_id_array[]' class='member_id_array'>$member_id</td>";

        echo "<td>$first_name  $last_name</td>";
        echo "<td>$phone_number_one</td>";
        echo "<td>$email</td>";

        echo "<td>" . " <div class='form-check form-check-flat form-check-primary mt-1 py-1'>" .
            "<label class='form-check-label'>" .
            " <input type='checkbox' id='$member_id' value='$member_id'  name='check_box_array' class='form-check-input attendance_check_box'>" . " </label>" .
            "</div>" . "</td>";
        echo "</tr>";
    }

    ?>