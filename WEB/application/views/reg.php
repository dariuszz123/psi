<form class="form-signin" action="<?php echo base_url();?>" method="POST">
    <?php $this->load->view("errors/message_error"); ?>
    <h2 class="form-signin-heading">Registracija</h2>
    <input type="text" class="input-block-level" placeholder="El. paštas" name="username">
    <input type="password" class="input-block-level" placeholder="Slaptažodis"name="password">
    <input type="password" class="input-block-level" placeholder="Pakartokite slaptažodį"name="password2">
    <button class="btn btn-large btn-primary" type="submit" name="reg">Registruotis</button>
    <a href="<?php echo base_url();?>">
        <button class="btn btn-large btn fr" type="button" >Atšaukti</button>
    </a>
</form>