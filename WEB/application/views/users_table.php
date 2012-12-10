<table class="table table-striped">
<thead>
  <tr>
    <th>#</th>
    <th>El. paštas</th>
    <th>Vartotojo tipas</th>
    <th>Veiksmai</th>
  </tr>
</thead>
<tbody>
 <?php
 $i = 1;
 foreach ($user as $value) {
    ?>
    <tr>
     <td><?php echo $i; ?></td>
     <td><?php echo $value['user_email']; ?></td>
     <td><?php 
        if($value['user_type'] == USER_STUDENT) {
            echo "Studentas";
        }else if($value['user_type'] == USER_TEACHER) {
            echo "Dėstytojas";
        }else if($value['user_type'] == USER_ADMIN) {
            echo "Administratorius";
        }
    ?></td>
     <td>
        <a href="<?php echo base_url('user/change_user_data').'/'.$value['id']; ?>" title="Redaguoti" class="mr5"><i class="icon-pencil"></i></a>
        <a href="<?php echo base_url('user/del_user').'/'.$value['id']; ?>" title="Delete" class="mr5"><i class="icon-trash"></i></a>
        <a href="<?php echo base_url('user/del_user').'/'.$value['id']; ?>" title="Siųsti pranešimą"><i class="icon-envelope"></i></a>
    </td>
   </tr>
    <?php
    $i++;
} ?>
</tbody>
</table>
<div class="pagination tac">
    <ul>
        <li><a href="#"><<</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">>></a></li>
    </ul>
</div>
