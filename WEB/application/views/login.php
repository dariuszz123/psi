<form class="form-signin" action="<?php echo base_url();?>main/login" method="POST">
    <h2 class="form-signin-heading">Prisijungimas</h2>
    <input type="text" class="input-block-level" placeholder="El. paštas" name="username">
    <input type="password" class="input-block-level" placeholder="Slaptažodis" name="password">
    <label class="radio">
        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
        Dėstytojas
    </label>
    <label class="radio">
        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
        Administratorius
    </label>
    <button class="btn btn-large btn-primary" type="submit" name="login">Prisijungti</button>
    <a href="<?php echo base_url();?>reg">
       <button class="btn btn-large" type="button">Registruotis</button>
    </a>
</form>
