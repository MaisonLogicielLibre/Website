<div class="row">
    <div class="users form col-lg-12 col-md-12 columns">
        <?php
        $this->element('Users/sidebar');
        if ($you)
            echo $this->fetch('sidebarYou');
        else
            echo $this->fetch('sidebar');
        ?>
    </div>
</div>
