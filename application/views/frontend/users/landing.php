<?php  $this->view('templates/frontend/header.php');?>

<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-default">
        <div class="panel-body text-cente">Previous Contests</div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-default">
        <div class="panel-body text-cente">Current Contest</div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-body text-cente">Contests List</div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-body text-cente"><a href="<?php  base_url();?>/user/profile">Profile</div>
        </div>
    </div>
</div>
<?php  $this->view('templates/frontend/footer.php');?>