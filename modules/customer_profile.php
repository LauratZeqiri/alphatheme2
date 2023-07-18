<?php
if (have_rows('personal_information')) :
    while (have_rows('personal_information')) :
        the_row();
        $first_name = get_sub_field('first_name');
        $last_name = get_sub_field('last_name');
        $email = get_sub_field('email');
        $date_of_birth = get_sub_field('date_of_birth');
        $description = get_sub_field('description');
?>
        <div class="customer">
            <div class="container">
                <table class="customer-table">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th>Description</th>
                    </tr>
                    <tr>
                        <td><?php echo $first_name; ?></td>
                        <td><?php echo $last_name; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $date_of_birth; ?></td>
                        <td><?php echo $description; ?></td>
                    </tr>
                </table>
            </div>
        </div>
<?php
    endwhile;
endif;
?>
