<form class="form-signin" action="<?php echo base_url();?>" method="POST">
    <?php $this->load->view("errors/message_error"); ?>
>>>>>>> 1f17cbdf6c503db66262e37adb64297c5fbf8dc9
    <h2 class="form-signin-heading">Prisijungimas</h2>
    <input type="text" class="input-block-level" placeholder="El. pa�tas" name="email">
    <input type="password" class="input-block-level" placeholder="Slaptažodis" name="password">
    <button class="btn btn-large btn-primary fl" type="submit" name="login">Prisijungti</button>
    <a href="<?php echo base_url();?>reg">
       <button class="btn btn-large fr" type="button">Registruotis</button>
    </a>
    <div class="clearfix"><!-- --></div>
    <p class="muted mt10 mb0"><small>Prisijungimas tik dėstytojams ir administratoriams</small></p>
</form>