<?php
    $error_message = $this->session->flashdata('message_error');
    if ($error_message) {
?>
<div class="alert alert-error">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong><?php echo $error_message; ?></strong>
</div>
<?php
    }
?>