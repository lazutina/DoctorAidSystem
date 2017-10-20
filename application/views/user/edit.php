<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Edit User</h1>
  </div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      User Information
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-lg-9"></div>
        <div class="col-lg-2">
          <a class="btn btn-primary btn-lg btn-block" href="<?php echo site_url('user/index');?>">&nbsp;&nbsp;&nbsp;&nbsp;Back&nbsp;&nbsp;&nbsp;&nbsp;</a>
        </div>
        <div class="col-lg-1"></div>
      </div>
      <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
          <?php echo form_open('user/save'.'?id='.$id) ?>
              <?php echo validation_errors(); ?>
              <div class="form-group">
                <label for="email">User Email</label>
                <input class="form-control" placeholder="User Name" type="text" name="email" value="<?php echo $email ;?>" id="email">
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" placeholder="Password" type="password" name="password" value="" id="password">
              </div>

              <div class="form-group">
                <label for="passwordconfirmation">Password Confirmation</label>
                <input class="form-control" placeholder="Password Confirmation" type="password" name="password_confirmation" value="" id="passwordconfirmation">
              </div>

              <div class="form-group pull-right">
                <input type="submit" name="commit" value="&nbsp;&nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;&nbsp;" class="btn btn-primary" data-disable-with="&nbsp;&nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;&nbsp;">
                <input type="reset" name="button"  class="btn btn-primary btn-danger" value="&nbsp;&nbsp;&nbsp;&nbsp;Reset&nbsp;&nbsp;&nbsp;&nbsp;"
                >
              </div>
          <?php echo form_close()?>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
