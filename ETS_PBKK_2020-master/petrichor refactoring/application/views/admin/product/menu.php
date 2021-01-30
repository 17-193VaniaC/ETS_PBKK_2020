
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
		<h3>Daftar Menu Hidangan</h3>
		</div><br>
		<a href="<?php echo site_url('admin/menu/add') ?>"><button class="add-button">Tambah Menu</button></a><br>

	<?php foreach ($menus as $menu):?>
									<div class="subsales2">

										<div class="title">
											<?php echo $menu->m_name ?>
										</div>
										<br>
											<img src="<?php echo base_url('upload/product/'.$menu->picture) ?>" style="object-fit: contain;  width:80%; height:150px;" /><br>
									<tr><td>Harga : </td>
										<td>
											<?php echo $menu->price ?></td>
									</tr>									<br>
									<button class="edit-button">
											<a href="<?php echo site_url('admin/menu/edit/'.$menu->id_m) ?>" >Edit</a>
									</button>
									<button class="delete-button">
											<a href="<?php echo site_url('admin/menu/delete/'.$menu->id_m) ?>" >Hapus</a>
									</button><br><br>
									</div>
	<?php  endforeach; ?>

</div>

</body>
</html>
