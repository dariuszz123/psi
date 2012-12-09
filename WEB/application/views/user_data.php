<table class="table table-striped">
<thead>
  <tr>
    <th>El. paštas</th>
    <th>Vartotojo tipas</th>
    <th>Atsijungti</th>
  </tr>
</thead>
<tbody>
    <tr>
     <td><?php echo $user['user_email']; ?></td>
     <td><?php echo $user['user_type']; ?></td>
     <td><a href="<?php echo base_url(); ?>user/logout" class="btn btn-link">Atsijungti</a></td>
   </tr>
</tbody>
</table>