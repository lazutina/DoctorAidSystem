<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Create New Products</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Product Information
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-9"></div>
          <div class="col-lg-2">
            <a class="btn btn-primary btn-lg btn-block" href="<?php echo site_url('product/index');?>">&nbsp;&nbsp;&nbsp;&nbsp;Back&nbsp;&nbsp;&nbsp;&nbsp;</a>
          </div>
          <div class="col-lg-1"></div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-10">
            <?php echo form_open_multipart('product/save');?>
              <div class="form-group">
                <label for="file">Excel File</label>
                <input type="file" name="file" id="file" class="form-control" placeholder="Excel File">
              </div>
              <div class="form-group pull-right">
                <input type="submit" name="commit" value="&nbsp;&nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;&nbsp;" class="btn btn-primary" data-disable-with="&nbsp;&nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;&nbsp;">
                <input type="reset" name="commit" value="&nbsp;&nbsp;&nbsp;&nbsp;Reset&nbsp;&nbsp;&nbsp;&nbsp;" class="btn btn-primary btn-danger" data-disable-with="&nbsp;&nbsp;&nbsp;&nbsp;Reset&nbsp;&nbsp;&nbsp;&nbsp;">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
