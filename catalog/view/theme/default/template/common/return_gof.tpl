<?php echo $header; ?><?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content"><?php echo $content_top; ?>
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <h1><?php echo $about_order;?></h1>
  <!--<h2><?php echo $gof_message;//$heading_title; ?></h2>-->
  
  
  
  <?php 
         if($form==1)
         echo'<p>Your order # is:'.$gof_OrderId.'</p>
         <p>Transaction # is:'.$gof_TransactionId.'</p>';
           
  ?>
  <?php echo $text_message; ?>
  <div class="buttons">
    <div class="right"><a href="<?php echo $continue; ?>" class="button"><?php echo $button_continue; ?></a></div>
  
    <div class="left"><a href="<?php echo $account; ?>" class="button"><?php echo $button_account; ?></a></div>
  </div>
  <?php echo $content_bottom; ?></div>
<?php echo $footer; ?>