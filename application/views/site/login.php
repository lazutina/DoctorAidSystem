<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="DA System">
  <meta name="author" content="Lapin">
  <title>Doctor Aid System</title>
  <link href="<?php echo base_url();?>assets/plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/plugin/metisMenu/metisMenu.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/admin.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/plugin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo form_open('site/logincheck') ?>
                          <?php if( isset($error)): ?>
                            <div class="alert alert-success" style="margin-top:10px"><?php echo $error ?></div>
                          <?php endif ?>
                          <?php echo validation_errors(); ?>
                          <fieldset>
                              <div class="form-group">
                                  <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus value="<?php echo set_value('email');?>">
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Password" name="password" type="password" value="<?php echo set_value('password');?>">
                              </div>
                              <input type="submit" name="commit" value="Login" class="btn btn-lg btn-success btn-block" data-disable-with="Login">
                          </fieldset>
                        <?php echo form_close()?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url();?>assets/plugin/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugin/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugin/metisMenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/admin.js"></script>
</body>

</html>
