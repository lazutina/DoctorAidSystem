<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">User Management</h1>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        User List
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Email</th>
              <th>Admin</th>
              <th>Create Time</th>
              <th>Update Time</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $index => $user): ?>
                  <tr class="<?php echo $index % 2 == 0 ? 'success' : 'info' ?>">
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo $user->email; ?></td>
                    <td><button type="button" class="btn btn-block"><?php echo ($user->admin ? 'Admin' : 'User'); ?></button></td>
                    <td><?php echo $user->created_at; ?></td>
                    <td><?php echo $user->updated_at; ?></td>
                    <td>
                      <?php if(!$user->admin) :?>
                        <a class="btn btn-primary btn-sm" href="<?php echo site_url('user/admin').'?id='.$user->id ; ?>">Admin</a>
                      <?php endif; ?>
                      <a class="btn btn-success btn-sm" href="<?php echo site_url('user/edit').'?id='.$user->id ; ?>">Update</a>
                      <a class="btn btn-danger btn-sm" href="<?php echo site_url('user/delete').'?id='.$user->id ; ?>">Delete</a>
                    </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->
        <div class="col-lg-3 pull-right">
          <a class="btn btn-primary btn-lg btn-block" href="<?php echo site_url('user/create');?>">Create New User</a>
        </div>
      </div>
      <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
  </div>
</div>
