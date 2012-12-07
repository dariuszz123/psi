<form class="form-signin" action="<?php echo current_url(); ?>" method="POST">
    <?php $this->load->view("errors/message_error"); ?>
    <h2 class="form-signin-heading">Registracija</h2>
    <input type="text" class="input-block-level" placeholder="El. paštas" name="email">
    <input type="password" class="input-block-level" placeholder="Slaptažodis"name="password">
    <input type="password" class="input-block-level" placeholder="Pakartokite slaptažodį"name="password_repeat">
    <button class="btn btn-large btn-primary" type="submit" name="reg">Registruotis</button>
    <a href="<?php echo base_url();?>">
        <button class="btn btn-large btn fr" type="button" >Grįžti</button>
    </a>
</form>