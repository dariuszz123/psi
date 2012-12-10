<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
<?php echo $_styles?>
<?php echo $_scripts?>
</head>
<body>
    <div class="container">
        <div class="tac"><img src="<?php echo base_url('img/Banner.png'); ?>" /></div>
        <?php echo $center_content; ?>
    </div>
    <div class="tac muted"><small>Užkrauta per {elapsed_time} © 2012 VUMA</small></div>
</body>
</html>