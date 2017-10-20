<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Product Management</h1>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Product List
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <div class="row" style="margin-bottom: 15px">
          <div class="col-lg-3 pull-right">
            <a class="btn btn-primary btn-lg btn-block" href="<?php echo site_url('product/create');?>">Create New Product</a>
          </div>
        </div>
        <div class="table-responsive">
          <?php if (isset($links)) { ?>
            <?php echo $links ?>
          <?php } ?>
          <!-- <%= will_paginate @products, renderer: BootstrapPagination::Rails %> -->
          <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Image</th>
              <th>Account Unit</th>
              <th>Account</th>
              <th>Sub Account</th>
              <th>Vendor</th>
              <th>Lawson/Item Number</th>
              <th>Description</th>
              <th>MFG Code</th>
              <th>MFG Nbr</th>
              <th>PO Date</th>
              <th>PO Number</th>
              <th>PO Line</th>
              <th>Qty</th>
              <th>UOM</th>
              <th>Unit Cost</th>
              <th>Total Cost</th>
            </tr>
            </thead>
            <tbody>
              <?php foreach ($products as $index => $product): ?>
                <tr class="<?php echo $index % 2 == 0 ? 'success' : 'info' ?>">
                  <td><?php echo $index + 1; ?></td>
                  <td><img src="<?php echo base_url();?>assets/img/image<?php echo $index % 4;?>.png" height="60" width="60"></td>
                  <td><?php echo $product->account_unit; ?></td>
                  <td><?php echo $product->account; ?></td>
                  <td><?php echo $product->sub_account; ?></td>
                  <td><?php echo $product->vendor; ?></td>
                  <td><?php echo $product->lawson_item_number; ?></td>
                  <td><?php echo $product->description; ?></td>
                  <td><?php echo $product->mfg_code; ?></td>
                  <td><?php echo $product->mfg_nbr; ?></td>
                  <td><?php echo $product->po_date; ?></td>
                  <td><?php echo $product->po_number; ?></td>
                  <td><?php echo $product->po_line; ?></td>
                  <td><?php echo $product->qty; ?></td>
                  <td><?php echo $product->uom; ?></td>
                  <td><?php echo $product->unit_cost; ?></td>
                  <td><?php echo $product->total_cost; ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->
      </div>
      <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
  </div>
</div>
