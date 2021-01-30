
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
		session_start();

		if(!isset($_SESSION["loggedin"])){
		echo "Logout";
		echo "<img style="width: 20px; height: 20px;padding-left: 30px;" src="https://www.iconsdb.com/icons/preview/white/logout-xxl.png">
		}
		else{
		echo "Login";
		}


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
	<div class="sm-c-bar"><br>
				<div class="sm-c">
			<a href="<?php echo site_url('admin/report') ?>">
		Catatan Transaksi
		</a>
		</div>
	</div>
</div>

<br><br><br><br>
<?php foreach ($menu as $menu): ?>
									<tr>
										<td width="150">
											<?php echo $menu->m_name ?>
										</td>
										<td>
											<?php echo $menu->price ?>
										</td>
										<td>
											<img src="<?php echo base_url('upload/product/'.$name->image) ?>" width="64" />
										</td>
										<td class="small">
											<?php echo substr($name->available, 0, 120) ?>...</td>
										<td width="250">
											<a href="<?php echo site_url('admin/products/edit/'.$product->product_id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/product/delete/'.$menu->id_m) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
<?php endforeach; ?>
<div class="sales">
<h3 style="text-align: center;" ">
	Menu Hidangan	
</h3>
<div class="subsales"></div>
<div class="subsales"></div>
<div class="subsales"></div>
<div class="subsales"></div>
<div class="subsales"></div>
</div>



<div class="sales2">
	<h3 style="text-align: center;">
	Keranjang
	</h3>

<table class="hupla" cellspacing="1">
	<tbody>
	<tr>
		<th style="text-align:left;" >Nama</th>
		<th style="text-align:right;" width="5%">Quantity</th>
		<th style="text-align:center;" width="20%">Unit Price</th>
		<th style="text-align:right;" width="10%">Price</th>
		<th style="text-align:center;" width="5%">Remove</th>
	</tr>	
	<tr>
		<td>
		NAMA
		</td>
			<td>
		1
		</td>
			<td>
		20000
		</td>
			<td>
		20000
		</td>
			<td>
		X
		</td>
	</tr>
	</tbody>
<tabel>


</div>

</body>
</html>