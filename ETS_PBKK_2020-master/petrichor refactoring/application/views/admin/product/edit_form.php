
<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">
</head>
<body>
<div class="head">
	<div class="upper-menu">
		Petrichor
	</div>
	<div class="loggout"><a href="logout.php">


		<?php
		// session_start();
		// if(!isset($_SESSION["loggedin"])){
		echo "Logout";
#		echo "<img style="width: 20px; height: 20px;padding-left: 30px;" src="https://www.iconsdb.com/icons/preview/white/logout-xxl.png">
		// }
		// else{
		// echo "Login";
		// }


		?>
	</a>
	</div>
</div>


<div class="left-bar">
	<div class="sm-c-bar">
	<div class="sm-c">
		<a href="<?php echo site_url('admin') ?>">
		Transaksi
		</a>
		</div>
	</div>
	<div class="sm-c-bar">
		<div class="sm-c">
			<a href="<?php echo site_url('admin/menu') ?>">
		Kelola Menu
			</a>
		</div>
	</div>

</div>

<br><br><br><br>

<div class="sales3">
	<div class="title">	
	<h2>Ubah Menu</h2>
	</div>
	<div class="new-form">

			<table style="margin: 8%;">
					<form action="" method="post" enctype="multipart/form-data" >
					<input type="hidden" name="id_m" value="<?php echo $menu->id_m?>" />
					<tr>
					<td style="margin-left: 3px; width: 20%; padding:10px;">
								<label for="m_name">Name*</label>
					</td><td style="margin-left: 3px; width: 30%; padding:10px;">
						
								<input class="form-control <?php echo form_error('m_name') ? 'is-invalid':'' ?>"
								 type="text" name="m_name" placeholder="Product name" value="<?php echo $menu->m_name ?>" />
					</td>
									<?php echo form_error('m_name') ?>

					</tr><tr>
						<td style="margin-left: 3px; width: 20%; padding:10px;">
								<label for="price">Price*</label>
						</td><td style="margin-left: 3px; width: 30%; padding:10px;">
								<input class="form-control <?php echo form_error('price') ? 'is-invalid':'' ?>"
								 type="number" name="price" min="0" placeholder="Product price" value="<?php echo $menu->price ?>" />
									<?php echo form_error('price') ?>
						</td>
					</tr><tr>
						<td style="margin-left: 3px; width: 20%; padding:10px;">
								<label for="picture">Photo</label>
						</td><td style="margin-left: 3px; width: 30%; padding:10px;">
								<input class="form-control-file <?php echo form_error('picture') ? 'is-invalid':'' ?>"
								 type="file" name="picture" value="<?php echo $menu->picture ?>" />
								 <input type="hidden" name="old_image" value="<?php echo $menu->picture ?>" />
									<?php echo form_error('picture') ?>
						</td>
					</tr><tr>
						<td style="margin-left: 3px; width: 20%; padding:10px;">
								<label for="available">Available</label>
							</td>
						<td>
							Curently : <?php 
								if($menu->available==0){
									echo "<b>Out of Stock</b>";
								}
								else{
									echo "<b>Available</b>";
								}?><p>
								<input style="float: left;" type="radio" name="available" placeholder="Available" value="1"/><label>Available</label><br></p>
									<p><input style="float: left; " type="radio" name="available" placeholder="Available" value="0"/><label>Out of Stock</label></p>
									<input type="hidden" name="old_available" value="<?php echo $menu->available; ?>" />
									<?php echo form_error('available') ?>
						</td>
					</tr>

					<tr><td style="margin-left: 3px; width: 30%; padding:10px;"></td>
						<td style="margin-left: 3px; width: 20%; padding:10px;">
							<input type="submit" name="btn" value="Save" class="save-button" />
						</td>
					</tr>
					</form>
			</table>
					<div class="card-footer small text-muted">
						* required fields
					</div>
		</div>

</div>

</body>
</html>
