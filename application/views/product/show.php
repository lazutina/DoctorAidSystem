<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Product Information</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Saved Products
      </div>
      <div class="panel-body">
        <div class="row" style="margin-bottom:15px">
          <div class="col-lg-9"></div>
          <div class="col-lg-2">
            <a class="btn btn-primary btn-lg btn-block" href="<?php echo site_url('product/index');?>">&nbsp;&nbsp;&nbsp;&nbsp;Back&nbsp;&nbsp;&nbsp;&nbsp;</a>
          </div>
          <div class="col-lg-1"></div>
        </div>
          <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
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
                  <td><?php echo $product['account_unit'] ?></td>
                  <td><?php echo $product['account'] ?></td>
                  <td><?php echo $product['sub_account'] ?></td>
                  <td><?php echo $product['lawson_item_number'] ?></td>
                  <td><?php echo $product['vendor'] ?></td>
                  <td><?php echo $product['description'] ?></td>
                  <td><?php echo $product['mfg_code'] ?></td>
                  <td><?php echo $product['mfg_nbr'] ?></td>
                  <td><?php echo $product['po_date'] ?></td>
                  <td><?php echo $product['po_number'] ?></td>
                  <td><?php echo $product['po_line'] ?></td>
                  <td><?php echo $product['qty'] ?></td>
                  <td><?php echo $product['uom'] ?></td>
                  <td><?php echo $product['unit_cost'] ?></td>
                  <td><?php echo $product['total_cost'] ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>
