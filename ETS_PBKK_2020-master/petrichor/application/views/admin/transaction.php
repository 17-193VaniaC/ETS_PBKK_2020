
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
		// if(!isset($_SESSION["loggedin"])){
		echo "Logout";
		$total=0;
#		echo "<img style="width: 20px; height: 20px;padding-left: 30px;" src="https://www.iconsdb.com/icons/preview/white/logout-xxl.png">
		// }
		// else{// echo "Login";}?>
	</a></div>
</div>


<?php
$total=0;
$conn = new PDO("mysql:host=localhost;dbname=petrichor", 'root', '');		
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$action = isset($_GET['action'])?$_GET['action']:"";
if($action=='cart' && $_SERVER['REQUEST_METHOD']=='POST') {
	
	$query = "SELECT * FROM menu WHERE id_m=:id_m";
	$stmt = $conn->prepare($query);
	$stmt->bindParam('id_m', $_POST['id_m']);
	$stmt->execute();
	$smenu = $stmt->fetch();
	$currentQty = $_SESSION['products'][$_POST['id_m']]['qnty']+1; //Incrementing the product qty in cart
	$_SESSION['products'][$_POST['id_m']] =array('id_m'=>$smenu['id_m'], 'qnty'=>$currentQty,'name'=>$smenu['m_name'],'price'=>$smenu['price']);
	$smenu='';
	header("Location:admin");
}

if($action=='cancel') {
	$_SESSION['products'] =array();
	header("Location:admin");	
}

if($action=='remove') {
	$id_m = $_GET['id_m'];
	$ssmenu = $_SESSION['products'];
	unset($ssmenu[$id_m]);
	$_SESSION['products']= $ssmenu;
	header("Location:admin");	
}
if($action=='save'){
		$db = mysqli_connect("localhost","root","","petrichor");
	$itter=1;
	foreach ($_SESSION['products'] as $items):
		$sql="Select id_trans from transaction where trans_date=current_date() order by id_trans desc limit 1";
		$sth= $db->query($sql);
		$result=mysqli_fetch_array($sth);
		if($itter==1){
		$lastid=$result["id_trans"]+1;
		$itter=2;}
		$keyy=key($items);
		$sql = "INSERT INTO transaction (id_trans, trans_date, trans_time, item_id, quantity, price_per_item) values('$lastid',current_date(), localtime() , ".$items["id_m"].", ".$items["qnty"].", ".$items["price"].")";
		$hupla = mysqli_query($db, $sql);
	endforeach;
	$_SESSION['products'] =array();
	header("Location:admin");	
	}
$query = "SELECT * FROM menu";
$stmt = $conn->prepare($query);
$stmt->execute();
$ssmenu = $stmt->fetchAll();


?>

<!-- SIDEBAR -->
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


<!-- DAFTAR MENU -->
<div class="sales">
	<div class="title">
		<h3 style="text-align: center;" ">Menu Hidangan</h3>
	
	</div>
    <div class="container" style="width:600px;">
<?php if (isset($hupla)){print $hupla;} ?>
	
<?php foreach ($menus as $menu):?>


								<div class="subsales">										
									<?php echo $menu->m_name; ?><br>
										<img src="<?php echo base_url('upload/product/'.$menu->picture); ?>" width="80%" height="70%" style="object-fit: fill;" /><br>
									<tr>
										<td><?php echo $menu->price; ?></td>
									</tr><br>
										<form method="post" action="<?php echo site_url('admin?action=cart')?>">
											<button type="submit" class="add-to-cart-button">Tambah</button>
											 <input type="hidden" name="id_m" value="<?php print $menu->id_m?>"></form>
										</form>

									<br><br><br>
								</div>
	<?php endforeach; ?>
</div>
</div>

<!-- CARTNYA -->
<div class="sales2">
	<div class="title">
	<h3 style="text-align: center;">
	Keranjang
	</h3>
	</div>

<table class="hupla" cellspacing="1">
	<tbody>
	<tr>
		<th style="text-align:left;" >Nama</th>
		<th style="text-align:right;" width="5%">Quantity</th>
		<th style="text-align:center;" width="20%">Unit Price</th>
		<th style="text-align:right;" width="10%">Price</th>
		<th style="text-align:center;" width="5%">Remove</th>
	</tr>	

<!-- MULAIDISINI -->
<?php if(!empty($_SESSION['products'])): foreach ($_SESSION['products'] as $idmenu => $menux):?>
	<tr>
		<?php  
		echo "<td>";
		echo $menux["name"];
		echo "</td><td width='5%''>";
		echo  $menux["qnty"];
		echo "</td><td width='20%'>";
		echo $menux["price"];
		echo "</td><td width='10%'>";
		$hhupla = $menux['price']*$menux['qnty'];
		echo $hhupla;
		echo "</td>";
		?>
		<td><a class='remove-link' style="color: red;" href='admin?action=remove&id_m=<?php print $idmenu?>'> X </a></td>
	</tr>
	<?php $total= $total+$hhupla;?>
<?php endforeach;
endif;?>
<tr style="background-color: pink;">
	<td style="font-size: 17px;">
		<b> Total </b>
	</td><td></td><td></td>
	<td style="font-size: 17px;""><?php if(isset($total))echo $total; ?></td>
</tr>
<tr><td>	
<form action="admin?action=save" method="post" ><button type="submit" class="save-button">Pay</button></form>
</td>
<td></td><td></td><td><button class="cancel-button"><a href="<?php echo site_url('admin?action=cancel')?>">CANCEL</a></button></td>

</tr>
	</tbody>
<tabel>


</div>

</body>
</html>
