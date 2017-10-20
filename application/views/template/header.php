<!DOCTYPE html>
<html>
<head>
	<title>Doctor Aid System</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="DA System">
	<meta name="author" content="Lapin">

	<link href="<?php echo base_url();?>assets/plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/plugin/metisMenu/metisMenu.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/admin.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/plugin/morrisjs/morris.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/plugin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
</head>
<body>
	<div id="wrapper">
		
		<?php  $this->load->view('template/navbar.php'); ?>

        <div id="page-wrapper">

       	<?php if( $this->session->flashdata('flash') ) : ?>
	   		<div class="alert alert-success" style="margin-top:20px"><?php echo $this->session->flashdata('flash'); ?></div>
	   	<?php endif; ?>