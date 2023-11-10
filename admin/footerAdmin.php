<script>
	$(document).ready(function () {
		var navoffeset = $(".header-main").offset().top;
		$(window).scroll(function () {
			var scrollpos = $(window).scrollTop();
			if (scrollpos >= navoffeset) {
				$(".header-main").addClass("fixed");
			} else {
				$(".header-main").removeClass("fixed");
			}
		});

	});
</script>
<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	<p><a href="" target="_blank">buybio</a>  </p>
</div>
<!--COPY rights end here-->
</div>
</div>
<!--//content-inner-->
<!--/sidebar-menu-->
<div class="sidebar-menu">
	<header class="logo1">
		<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>
	</header>
	<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
	<div class="menu">
		<ul id="menu">
			<li><a href="dashboard.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span>
					<div class="clearfix"></div>
				</a></li>
			<li><a href="categorie.php"><i class="fa fa-list-ul" aria-hidden="true"></i><span>Gestion
						Catalogues</span>
					<div class="clearfix"></div>
				</a></li>
				<li><a href="produit.php"><i class="fa fa-list-ul" aria-hidden="true"></i><span>Gestion
				Produits</span>
					<div class="clearfix"></div>
				</a></li>
			
			<li><a href="commande.php"><i class="fa fa-file-text-o" aria-hidden="true"></i><span>Gestion
			      Commandes</span>
					<div class="clearfix"></div>
				</a></li>

		</ul>
	</div>
</div>
<div class="clearfix"></div>
</div>
<script>
	var toggle = true;

	$(".sidebar-icon").click(function () {
		if (toggle) {
			$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
			$("#menu span").css({ "position": "absolute" });
		}
		else {
			$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
			setTimeout(function () {
				$("#menu span").css({ "position": "relative" });
			}, 400);
		}

		toggle = !toggle;
	});
</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- /Bootstrap Core JavaScript -->
<!-- morris JavaScript -->
<script src="js/raphael-min.js"></script>
<script src="/js/morris.js"></script>
<script>
	$(document).ready(function () {
		//BOX BUTTON SHOW AND CLOSE
		jQuery('.small-graph-box').hover(function () {
			jQuery(this).find('.box-button').fadeIn('fast');
		}, function () {
			jQuery(this).find('.box-button').fadeOut('fast');
		});
		jQuery('.small-graph-box .box-close').click(function () {
			jQuery(this).closest('.small-graph-box').fadeOut(200);
			return false;
		});

		//CHARTS
		function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}

		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
			behaveLikeLine: true,
			gridEnabled: false,
			gridLineColor: '#dddddd',
			axes: true,
			resize: true,
			smooth: true,
			pointSize: 0,
			lineWidth: 0,
			fillOpacity: 0.85,
			data: [
				{ period: '2014 Q1', iphone: 2668, ipad: null, itouch: 2649 },
				{ period: '2014 Q2', iphone: 15780, ipad: 13799, itouch: 12051 },
				{ period: '2014 Q3', iphone: 12920, ipad: 10975, itouch: 9910 },
				{ period: '2014 Q4', iphone: 8770, ipad: 6600, itouch: 6695 },
				{ period: '2015 Q1', iphone: 10820, ipad: 10924, itouch: 12300 },
				{ period: '2015 Q2', iphone: 9680, ipad: 9010, itouch: 7891 },
				{ period: '2015 Q3', iphone: 4830, ipad: 3805, itouch: 1598 },
				{ period: '2015 Q4', iphone: 15083, ipad: 8977, itouch: 5185 },
				{ period: '2016 Q1', iphone: 10697, ipad: 4470, itouch: 2038 },
				{ period: '2016 Q2', iphone: 8442, ipad: 5723, itouch: 1801 }
			],
			lineColors: ['#ff4a43', '#a2d200', '#22beef'],
			xkey: 'period',
			redraw: true,
			ykeys: ['iphone', 'ipad', 'itouch'],
			labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});


	});
</script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

</body>

</html>