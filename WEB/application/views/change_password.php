<form action="<?php echo base_url();?>" method="POST">
    <h2 class="form-signin-heading">Slaptadžodžio keitimas</h2>
    <?php $this->load->view("errors/message_error"); ?>
    <input type="password" class="input-block-level" placeholder="Senas slaptažodis" name="oldpass">
    <input type="password" class="input-block-level" placeholder="Naujas slaptažodis" name="pass1">
    <input type="password" class="input-block-level" placeholder="Pakartokite slaptažodis" name="pass2">
    <button class="btn btn-large btn-primary fl" type="submit" name="change">Keisti</button>
</form>