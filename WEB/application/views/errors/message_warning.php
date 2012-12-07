<?php
    $warning_message = $this->session->flashdata('message_warnning');
    if ($warning_message) {
?>
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong><?php echo $warning_message; ?></strong>
</div>
<?php
    }
?>