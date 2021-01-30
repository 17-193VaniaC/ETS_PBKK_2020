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
		
	<h2>Tambah Menu</h2>
	</div>
	

	<div class="new-form">

			<table style="margin: 8%;">
					<tr>
						<form action="<?php echo site_url('admin/menu/add') ?>" method="post" enctype="multipart/form-data" >
					<td style="margin-left: 3px; width: 20%; padding:10px;">
								<label for="m_name">Name*</label>
					</td><td style="margin-left: 3px; width: 30%; padding:10px;">
						
								<input class="form-control <?php echo form_error('m_name') ? 'is-invalid':'' ?>"
								 type="text" name="m_name" placeholder="Product name" />
									<small style="color: red;"><?php echo form_error('m_name') ?></small>
					</td>

					</tr><tr>
						<td style="margin-left: 3px; width: 20%; padding:10px;">
								<label for="price">Price*</label>
						</td><td style="margin-left: 3px; width: 30%; padding:10px;">
								<input class="form-control <?php echo form_error('price') ? 'is-invalid':'' ?>"
								 type="number" name="price" min="0" placeholder="Product price" />
									<small style="color: red;"><?php echo form_error('price') ?></small>
						</td>
					</tr><tr>
						<td style="margin-left: 3px; width: 20%; padding:10px;">
								<label for="picture">Photo</label>
						</td><td style="margin-left: 3px; width: 30%; padding:10px;">
								<input class="form-control-file <?php echo form_error('picture') ? 'is-invalid':'' ?>"
								 type="file" name="picture" />
						</td>
					</tr><tr>
						<td style="margin-left: 3px; width: 20%; padding:10px;">
								<label for="available">Available</label>
						</td><td style="margin-left: 3px; width: 30%; padding:10px;">
								<input class="form-control <?php echo form_error('available') ? 'is-invalid':'' ?>"
								 type="checkbox" name="available" placeholder="Available" width="300px" value="1"/>
						</td>
					</tr>

					<tr><td style="margin-left: 3px; width: 30%; padding:10px;"></td>
						<td style="margin-left: 3px; width: 20%; padding:10px;">
							<input type="submit" name="btn" value="Save" class="save-button" />
						</td>
					</tr>
					</form>
					<div class="card-footer small text-muted">
						* required fields
					</div>
			</table>
		</div>

</div>

</body>
</html>
