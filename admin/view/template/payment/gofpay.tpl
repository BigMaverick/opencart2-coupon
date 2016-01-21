<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-gofpay" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-gofpay" class="form-horizontal">
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-websiteid"><?php echo $entry_websiteid; ?></label>
            <div class="col-sm-10">
              <input type="text" name="gofpay_websiteid" value="<?php echo $gofpay_websiteid; ?>" placeholder="<?php echo $entry_websiteid; ?>" id="input-websiteid" class="form-control" />
              <?php if ($error_websiteid) { ?>
              <div class="text-danger"><?php echo $error_websiteid; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-secretkey"><?php echo $entry_secretkey; ?></label>
            <div class="col-sm-10">
              <input type="text" name="gofpay_secretkey" value="<?php echo $gofpay_secretkey; ?>" placeholder="<?php echo $entry_secretkey; ?>" id="input-secretkey" class="form-control" />
              <?php if ($error_secretkey) { ?>
              <div class="text-danger"><?php echo $error_secretkey; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-gateway"><?php echo $entry_gateway; ?></label>
            <div class="col-sm-10">
              <input type="text" name="gofpay_gateway" value="<?php echo $gofpay_gateway; ?>" placeholder="<?php echo $entry_gateway; ?>" id="input-gateway" class="form-control" />
              <?php if ($error_gateway) { ?>
              <div class="text-danger"><?php echo $error_gateway; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-mode"><?php echo $entry_mode; ?></label>
            <div class="col-sm-10">
              <select name="gofpay_mode" id="input-mode" class="form-control">
                <?php if ($gofpay_mode == 'Api') { ?>
                <option value="Api" selected="selected"><?php echo "Api"; ?></option>
                <?php } else { ?>
                <option value="Api"><?php echo "Api"; ?></option>
                <?php } ?>
                <?php if ($gofpay_mode == 'Redirect') { ?>
                <option value="Redirect" selected="selected"><?php echo "Redirect"; ?></option>
                <?php } else { ?>
                <option value="Redirect"><?php echo "Redirect"; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-order-status"><?php echo $entry_order_status; ?></label>
            <div class="col-sm-10">
              <select name="gofpay_order_status_id" id="input-order-status" class="form-control">
                <?php foreach ($order_statuses as $order_status) { ?>
                <?php if ($order_status['order_status_id'] == $gofpay_order_status_id) { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-order-notifystatus"><?php echo $entry_order_notifystatus; ?></label>
            <div class="col-sm-10">
              <select name="gofpay_order_notifystatus_id" id="input-order-notifystatus" class="form-control">
                <?php foreach ($order_statuses as $order_status) { ?>
                <?php if ($order_status['order_status_id'] == $gofpay_order_notifystatus_id) { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
            <div class="col-sm-10">
              <select name="gofpay_status" id="input-status" class="form-control">
                <?php if ($gofpay_status) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-status"><?php echo $coupon_status; ?></label>
            <div class="col-sm-10">
              <select name="gofpay_coupon_status" id="input-coupon-status" class="form-control">
                <?php if ($gofpay_coupon_status) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-sort-order"><?php echo $entry_sort_order; ?></label>
            <div class="col-sm-10">
              <input type="text" name="gofpay_sort_order" value="<?php echo $gofpay_sort_order; ?>" placeholder="<?php echo $entry_sort_order; ?>" id="input-sort-order" class="form-control" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php echo $footer; ?> 