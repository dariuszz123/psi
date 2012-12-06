<div style="text-align: center;"><p class="text-error"><?php echo $msg; ?></p></div>
<form class="form-signin" action="<?php echo base_url();?>main/login" method="POST" style="width: 450px; text-align: center;">
    <h2 class="form-signin-heading">Pranešimų siuntimas</h2>
   <select name="faculty">
        <option>Pasirinkite fakultetą:</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
    </select>
    <select name="studies">
        <option>Pasirinkite studijų kryptį</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
    </select>
    <select name="course">
        <option>Pasirinkite kursą</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
    </select>
    <select name="group">
        <option>Pasirinkite grupę</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
    </select>
    <textarea rows="5" cols="5" name="message"></textarea>
    <button class="btn btn-large btn-primary" type="submit" name="login">Siųsti</button>
    <a href="<?php echo base_url();?>teacher">
       <button class="btn btn-large btn-primary" type="button">Atšaukti</button>
    </a>
</form>
