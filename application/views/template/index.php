<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('template/head'); ?>
<?php $this->load->view('template/script'); ?>
    <body id="page-top">
        <?php $this->load->view('template/header'); ?>
            <?php $this->load->view($content); ?>       
    </body>
</html>