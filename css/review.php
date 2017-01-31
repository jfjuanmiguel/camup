<?php
if (!is_https()) { header('Location:https://dappry.com/ambassadors/ambas_review2'); exit(0); }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
<meta name="viewport" content="width=device-width, minimum-scale=1.0,  maximum-scale=1.0">
<title>Dappry</title>

<!--Start Menu-->
<link type="text/css" rel="stylesheet" href="css/styles_menu.css?v=6" />
<link type="text/css" rel="stylesheet" href="css/jquery.mmenu.all.css?v=6" />
<link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" />

<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="js/jquery.mmenu.all.min.js?v=6"></script>
<script src="js/common.js"></script>
<script src="js/creditcard.js"></script>

<link href="css/mobile_style.css" rel="stylesheet" type="text/css" />
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href="css/styles_pages.css" rel="stylesheet" type="text/css" />
<link href="css/links.css" rel="stylesheet" type="text/css" />
<link href="css/text_areas.css" rel="stylesheet" type="text/css" />
<link href="css/styles_scc.css" rel="stylesheet" type="text/css" />

<!--[if lt IE 9]>
    <script src="https://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

<link rel="stylesheet" type="text/css" href="zebra/public/css/default/zebra_dialog.css" />
<script type="text/javascript" src="zebra/public/javascript/zebra_dialog.src.js"></script>

<script type="text/javascript">
    $(function() {
	$("#menu")
	    .mmenu({
		extensions: ["fullscreen"],
		searchfield: false,
		navbar: {
		add: true,
		title: "",
		},
		offCanvas: {
		    position 	: "bottom",
		    zposition	: "front"
		}
	    }).on( 'click',
		'a[href^="#/"]',
		function() {
		    alert( "Thank you for clicking, but that's a demo link." );
		    return false;
		}
	    );
    });
</script>
<!--End Menu-->

<script type="text/javascript">
    $(document).ready(function() {
	$("#place_but").click(function() {
	    $("#reviewform1").attr("action", "<?php echo base_url('/ambas_order'); ?>"); $("#reviewform1").submit();
	    return false;
	});
    });
</script>

</head>

<body>
    <div id="mydiv" data-role="page">
	
	<!-- MENU BAR -->
	<?php include("menu.php"); ?>
	<!-- END MENU BAR -->
	
	<!-- TOP BAR -->
	<?php include("topbar.php"); ?>
	<!-- END TOP BAR -->
	
	<!-- MAIN CONTENT -->
	<div data-role="main" class="ui-content" style="padding-top: 0px;">
	    <form id="reviewform1" name="reviewform1" method="post" action="" onsubmit="">
<?php
print_r($records);
$basepath = base_url();
$imgpath = $basepath.'products/'.$items[0]->category_id.'/'.$items[0]->subcategory_id.'/'.$items[0]->product_sku.'-4.jpg?';

$msrp = $items[0]->product_price * 1.3;
$subtotal = $items[0]->product_price;
$total = $subtotal;
$you = $top['ambas_coin'] / $rates[0]->rate;
$maxcoin = $subtotal * $rates[0]->maxcoin;
$youcoin = $maxcoin * $rates[0]->rate;
if ($you > $maxcoin) { $you = $maxcoin; }
$total = $subtotal - $you;
$tax = 0;
$temp = 0;
if ($records[0]->order_billing_state == 'FL') {
    $temp = $subtotal - $you;
    $tax = $temp * 0.06;
    $total = $subtotal - $you + $tax;
}
$fmsrp = number_format($msrp,2);
$fyou = number_format($you,2);
$fsubtotal = number_format($subtotal,2);
$ftax = number_format($tax,2);
$ftemp = number_format($temp,2);
$ftotal = number_format($total,2);
$cc = $records[0]->order_cc_number;
$cc = '************'.substr($cc,12);
?>
	    <div class="linea_div1" id="linea_div1"><hr /></div>
		<div id="main1" class="main1">
		<div class="login1" id="login1" style="margin-top:0px;"><img src="images/checkout4.jpg" width="100%"></div>
		<div id="stats_description1" class="stats_description1" style="margin-top: 20px;">Review Your Order</div>
		<div class="cart" id="cart">
		    <div id="cart_image" class="cart_image"><img src="<?php echo $imgpath; ?>" width="100%" border="0"></div>
			<div id="cart4" class="cart4">Product Title</span>
			  <div class="divClear"></div>
		  </div>
			<div id="cart13" class="cart13"><?php echo $items[0]->product_name; ?></span>
			  <div class="divClear"></div>
		  </div>
		    <div class="divClear"></div>
		</div>
		<div class="divClear"></div>
		<div id="login3" class="login3"><center><hr class="center"></center></div>
		<div id="cart7" class="cart7" style="margin-top:20px;">
		    <div id="cart8" class="cart8">MSRP:</div>
		    <div id="cart9" class="cart9"><span id="msrp">$ <?php echo $fmsrp; ?></span></div>
		</div>
		<div id="cart7" class="cart7">
		    <div id="cart8" class="cart8">Ambassador Price:</div>
		    <div id="cart9" class="cart9"><span id="subtotal">$ <?php echo $fsubtotal; ?></span></div>
		</div>
		<div id="cart7" class="cart7">
		    <div id="cart8" class="cart8">- Coin Discount:</div>
		    <div id="cart9" class="cart9"><span id="coin">$ <?php echo $fyou; ?></span></div>
		</div>
<?php
if ($records[0]->order_billing_state == 'FL') {
?>
		<div id="cart7" class="cart7">
		    <div id="cart8" class="cart8">Subtotal:</div>
		    <div id="cart9" class="cart9">$<?php echo $ftemp; ?></div>
		</div>
		<div id="cart7" class="cart7">
		    <div id="cart8" class="cart8">+ Tax:</div>
		    <div id="cart9" class="cart9">$<?php echo $ftax; ?></div>
		</div>
<?php
}
?>
		<div id="cart7" class="cart7">
		    <div id="cart8" class="cart8"><strong>Total:</strong></div>
		    <div id="cart9" class="cart9"><span id="total"><strong>$ <?php echo $ftotal; ?></strong></span></div>
		</div>
		<div class="divClear"></div>
		<div id="cart7" class="cart7" style="margin-bottom:40px;">
		    <div id="cart8" class="cart8">SHIPPING:</div>
		    <div id="cart9" class="cart9">FREE</div>
		</div>

		<div class="login1" id="login1"><strong>Billing Details</strong></div>
		<div class="login2" id="login2">
		    <?php echo $records[0]->order_first.' '.$records[0]->order_last; ?><br>
		    <?php echo $records[0]->order_billing_address1.' '.$records[0]->order_billing_address2; ?><br>
		    <?php echo $records[0]->order_billing_city.', '.$records[0]->order_billing_state.' '.$records[0]->order_billing_zip; ?><br>
		    Ph: <?php echo $records[0]->order_billing_phone; ?>
		</div>
		<div id="login1" class="login1">
		    <div align="right"><a href="<?php echo base_url('/ambas_billing2'); ?>">Edit Billing Details</a> </div>
		</div>

		<div class="login1" id="login1"><strong>Shipping Details</strong></div>
		<div class="login2" id="login2">
		    <?php echo $records[0]->order_shipping_first.' '.$records[0]->order_shipping_last; ?><br>
		    <?php echo $records[0]->order_shipping_address1.' '.$records[0]->order_shipping_address2; ?><br>
		    <?php echo $records[0]->order_shipping_city.', '.$records[0]->order_shipping_state.' '.$records[0]->order_shipping_zip; ?><br>
		    Ph: <?php echo $records[0]->order_shipping_phone; ?>
		</div>
		<div id="login1" class="login1">
		    <div align="right"><a href="<?php echo base_url('/ambas_shipping2'); ?>">Edit Shipping Details</a> </div>
		</div>

		<div id="login1" class="login1"><strong>Payment Details</strong></div>
		<div id="login2" class="login2">
		    Name: <?php echo $records[0]->order_cc_name; ?><br>
		    Number: <?php echo $cc; ?><br>
		    Exp. Date: <?php echo $records[0]->order_cc_month.'/'.$records[0]->order_cc_year; ?><br>
		    CVV Code: <?php echo $records[0]->order_cc_cvv; ?><br>
		</div>
		<div id="login2" class="login7">
		    <div align="right"><a href="<?php echo base_url('/ambas_payment2'); ?>">Edit Payment Details</a></div>
		</div>

		<div id="login4" class="login4"><center><hr class="center"></center></div>
		<div id="search4" class="contact1" style="text-align:center; font-weight:bold; font-size:18px; margin-bottom:30px; margin-top:20px;">
		    <a id="place_but" href="javascript:void(0); style="color:#000;">Place Your Order</a>
		</div>
		<input type="hidden" id="subtotal" name="subtotal" value="<?php echo $fsubtotal; ?>">
		<input type="hidden" id="coindolar" name="coindolar" value="<?php echo $fyou; ?>">
		<input type="hidden" id="coin" name="coin" value="<?php echo $youcoin; ?>">
		<input type="hidden" id="tax" name="tax" value="<?php echo $ftax; ?>">
		<input type="hidden" id="total" name="total" value="<?php echo $ftotal; ?>">
	    </form>
