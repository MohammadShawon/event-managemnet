<?php


$ses_msg = Session::has('success');
if (!empty($ses_msg)) {
    ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <p><i class="fa fa-bell-o fa-fw"></i> <?php echo Session::get('success'); ?></p>
    </div>
    <?php
}// 
$ses_msg = Session::has('error');
if (!empty($ses_msg)) {
    ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <p><i class="fa fa-bell-o fa-fw"></i> <?php echo Session::get('error'); ?></p>
    </div>
<?php

}// ?>
<?php if($errors->any()){ ?>

<ul class="alert alert-danger fade in animated slideInRight alert-dismissable" style="width:100%">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close"><i  class="fa fa-times" aria-hidden="true"></i></a>
    @foreach($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
</ul>
<?php } ?>
