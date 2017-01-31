<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0,  maximum-scale=1.0">
	<title>Dappry</title>

	<link href="css/mobile_style.css" rel="stylesheet" type="text/css" />
	<link href="css/styles.css" rel="stylesheet" type="text/css" />
	<link href="css/links.css" rel="stylesheet" type="text/css" />

	<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

	<!--Start Menu-->
	<link type="text/css" rel="stylesheet" href="css/styles_menu.css?v=6" />
	<link type="text/css" rel="stylesheet" href="css/jquery.mmenu.all.css?v=6" />
	<link type="text/css" rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" />


	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="js/jquery.mmenu.all.min.js?v=6"></script>
	<script src="js/exif.js"></script>

	<script type="text/javascript">
		$(function() {
			$("#menu")
				.mmenu({
					searchfield: false,
					navbar: {
						add: true,
						title: "",
					},
					offCanvas: {
						position 	: "bottom",
						zposition	: "front",
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

	<style type="text/css">
		#form-container{ display:none; }
		#wrapper
		{
			float:left;
			width:100%;
			overflow:hidden;
			position:relative;
		}

		#button-area{ text-align: center; width:100%; height: 20%; background-color: #3E3E3E;}

		#img-submit{ cursor: pointer;}

		/*   ------------------------  */
		.rotate-90 {
			-moz-transform: rotate(90deg);
			-webkit-transform: rotate(90deg);
			-o-transform: rotate(90deg);
			transform: rotate(90deg);
		}

		.rotate-180 {
			-moz-transform: rotate(180deg);
			-webkit-transform: rotate(180deg);
			-o-transform: rotate(180deg);
			transform: rotate(180deg);
		}

		.rotate-270 {
			-moz-transform: rotate(270deg);
			-webkit-transform: rotate(270deg);
			-o-transform: rotate(270deg);
			transform: rotate(270deg);
		}

		.flip {
			-moz-transform: scaleX(-1);
			-webkit-transform: scaleX(-1);
			-o-transform: scaleX(-1);
			transform: scaleX(-1);
		}

		.flip-and-rotate-90 {
			-moz-transform: rotate(90deg) scaleX(-1);
			-webkit-transform: rotate(90deg) scaleX(-1);
			-o-transform: rotate(90deg) scaleX(-1);
			transform: rotate(90deg) scaleX(-1);
		}

		.flip-and-rotate-180 {
			-moz-transform: rotate(180deg) scaleX(-1);
			-webkit-transform: rotate(180deg) scaleX(-1);
			-o-transform: rotate(180deg) scaleX(-1);
			transform: rotate(180deg) scaleX(-1);
		}

		.flip-and-rotate-270 {
			-moz-transform: rotate(270deg) scaleX(-1);
			-webkit-transform: rotate(270deg) scaleX(-1);
			-o-transform: rotate(270deg) scaleX(-1);
			transform: rotate(270deg) scaleX(-1);
		}
	</style>

</head>

<body>
<div id="mydiv">

	<!-- HEADER -->
	<div id="header" data-role="header" class="header">
		<div id="header1" class="header1"><a href="dashboard.html"><img src="images/logo_small.jpg" width="100%" border="0"></a></div>
		<div id="header14" class="header14">
			<div id="header2" class="header2">
				<div id="header3" class="header3">
					<div id="header5" class="header5">995,485</div>
				</div>
				<div id="header17" class="header17"><a href="messages.html"><img src="images/message1.png" width="25px" border="0" /></a></div>
				<div id="header6" class="header6"><a href="buy_coins.html" class="link8">
						<div id="header8" class="header8">coin</div></a></div><div class="divClear"></div>
			</div>
			<div class="divClear"></div>
		</div>
		<div class="divClear"></div>
	</div>
	<!-- END HEADER -->

	<!-- MAIN CONTENT -->
	<div class="divClear"></div>

	<div data-role="main" >
		<div>

			<div id="wrapper">
				<div id="form-container">
					<form id="img-form" action="camup.php" method="post" enctype="multipart/form-data">
						<input type="file" accept="image/*;capture=camera" name="archivoImagen" id="fileUpload">
						<input type="submit" value="submit">
					</form>
				</div>

				<div id="image-holder">
				</div>

				<div id="button-area">
					<img id="img-submit" src="images/btn.png" width="50" height="50">
				</div>
			</div>

			<div class="divClear"></div>

		</div>
		<div class="divClear"></div>
	</div>

<script>

	// Opera 8.0+
	var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
	// Firefox 1.0+
	var isFirefox = typeof InstallTrigger !== 'undefined';
	// At least Safari 3+: "[object HTMLElementConstructor]"
	var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
	// Internet Explorer 6-11
	var isIE = /*@cc_on!@*/false || !!document.documentMode;
	// Edge 20+
	var isEdge = !isIE && !!window.StyleMedia;
	// Chrome 1+
	var isChrome = !!window.chrome && !!window.chrome.webstore;
	// Blink engine detection
	var isBlink = (isChrome || isOpera) && !!window.CSS;

	$(function () {

		$("#fileUpload").on('change', function () {

			if (typeof (FileReader) != "undefined") {

				var image_holder = $("#image-holder");

				var maxWidth = image_holder.width();
				var maxHeight = image_holder.height();

				image_holder.empty();

				var reader = new FileReader();

				reader.onload = function (e) {
					$im = $("<img />", {
						"src": e.target.result,
						"width": image_holder.width(),
						"height": (image_holder.height())
					});

					fixExifOrientation($($im),maxWidth,maxHeight);

					$im.appendTo(image_holder);

				}

				image_holder.show();
				reader.readAsDataURL($(this)[0].files[0]);
			} else {
				alert("This browser does not support FileReader.");
			}
		});


		function fixExifOrientation($img) {
			$img.on('load', function(e) {
				EXIF.getData($img[0], function() {
					//alert('Exif=', EXIF.getTag(this, "Orientation"));
					if(!isSafari) {
						switch (parseInt(EXIF.getTag(this, "Orientation"))) {
							case 2:
								$img.addClass('flip');
								break;
							case 3:
								$img.addClass('rotate-180');
								break;
							case 4:
								$img.addClass('flip-and-rotate-180');
								break;
							case 5:
								$img.addClass('flip-and-rotate-270');
								break;
							case 6:
								$img.addClass('rotate-90');
								break;
							case 7:
								$img.addClass('flip-and-rotate-90');
								break;
							case 8:
								$img.addClass('rotate-270');
								break;
						}
					}
				});

			});

		}
	});

	$('#image-holder').on('click tap',function(){  $("#fileUpload").trigger( "click" );   });

	$('#img-submit').on('click tap',function(){  $("#img-form").submit();   });
</script>

</body>

</html>

