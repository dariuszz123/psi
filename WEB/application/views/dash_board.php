<div class="navbar navbar_vuma">
    <div class="navbar-inner">
        <ul class="nav">
            <?php
                foreach ($nav as $value) {
                    ?>
                    <li <?php echo ($value['is_active'])? 'class="active"':''; ?>>
                        <a href="<?php echo $value['url'];?>"><?php echo $value['name'];?></a>    
                    </li>
                    <?php
                }
            ?>
        </ul> 
    </div>
</div>
<div class="box_border">
      <?php echo $content; ?>
</div>