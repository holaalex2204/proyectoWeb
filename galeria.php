<?php
	session_start();
	$user=null;
	$session=false;
	if(isset($_SESSION["id"])){
		$session=true;
		$user=$_SESSION["nom"];
	}
	include("design.php");
	drawHeader("Galeria",null,1,$user);
?>
 <link rel="stylesheet" type="text/css" media="screen" href="css/skin-2.css">
 <link rel="stylesheet" type="text/css" media="screen" href="css/jquery.fancybox-1.3.4.css">
 <link rel="stylesheet" type="text/css" media="screen" href="css/tabs.css">
 <script src="js/jquery.jcarousel.min.js"></script>
 <script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
 <script src="js/tabs.js"></script>
 <script>
		$(document).ready(function(){
			jQuery('#mycarousel-1, #mycarousel-2, #mycarousel-3, #mycarousel-4, #mycarousel-5, #mycarousel-6, #mycarousel-7').jcarousel({
				horisontal: true,
				wrap:'circular',
				scroll:1,
				easing:'easeInOutBack',
				animation:1200
			});
			$("a.plus").fancybox({
				'transitionIn'	:	'elastic',
				'transitionOut'	:	'elastic',
				'speedIn'		:	600, 
				'speedOut'		:	200, 
				'overlayShow'	:	true
			})
		});
	</script>
	<!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
      </div>
    <![endif]-->
    <!--[if lt IE 9]>
   		<script type="text/javascript" src="js/html5.js"></script>
    	<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
	<![endif]-->
	<section id="content"><div class="ic"></div>
    	<div class="page3-row1 pad-2 tabs">
        	<div class="col-8">
            	<h2 class="h2 p2">Categorias:</h2>
                <ul class="list-1 nav">
                	<li class="selected"><a href="#tab-1">Pequeños</a></li> 
                    <li><a href="#tab-4">Grandes</a></li>
                    <li><a href="#tab-5">SUV's</a></li>
                    <li><a href="#tab-6">Ejecutivos</a></li>
                    <li><a href="#tab-7">Premium</a></li>
                </ul>
            </div>
            <div class="col-9">
            	<h3 class="h3-2">Autos Disponibles:</h3>
                <div id="tab-1" class="tab-content gallery-photo">
                   <div class="inner">
                        <ul id="mycarousel-1" class="jcarousel-skin-tango">
                            <li><a class="plus"     href="images/portfolio-1-big.jpg"><img src="images/portfolio-1.jpg" alt=""></a><a class="plus"     href="images/portfolio-2-big.jpg"><img src="images/portfolio-2.jpg" alt=""></a><a class="plus"     href="images/portfolio-3-big.jpg"><img src="images/portfolio-3.jpg" alt=""></a><a class="plus"     href="images/portfolio-4-big.jpg"><img src="images/portfolio-4.jpg" alt=""></a></li>
                            <li><a class="plus"     href="images/portfolio-5-big.jpg"><img src="images/portfolio-5.jpg" alt=""></a><a class="plus"     href="images/portfolio-6-big.jpg"><img src="images/portfolio-6.jpg" alt=""></a><a class="plus"     href="images/portfolio-7-big.jpg"><img src="images/portfolio-7.jpg" alt=""></a><a class="plus"     href="images/portfolio-8-big.jpg"><img src="images/portfolio-8.jpg" alt=""></a></li>
                            <li><a class="plus"     href="images/portfolio-9-big.jpg"><img src="images/portfolio-9.jpg" alt=""></a><a class="plus"     href="images/portfolio-10-big.jpg"><img src="images/portfolio-10.jpg" alt=""></a><a class="plus"     href="images/portfolio-11-big.jpg"><img src="images/portfolio-11.jpg" alt=""></a><a class="plus"     href="images/portfolio-1-big.jpg"><img src="images/portfolio-1.jpg" alt=""></a></li>
                            <li><a class="plus"     href="images/portfolio-12-big.jpg"><img src="images/portfolio-12.jpg" alt=""></a><a class="plus"     href="images/portfolio-13-big.jpg"><img src="images/portfolio-13.jpg" alt=""></a><a class="plus"     href="images/portfolio-14-big.jpg"><img src="images/portfolio-14.jpg" alt=""></a><a class="plus"     href="images/portfolio-2-big.jpg"><img src="images/portfolio-2.jpg" alt=""></a></li>
                        </ul>
                    </div>
                </div>

                <div id="tab-4" class="tab-content gallery-photo">
                   <div class="inner">
                        <ul id="mycarousel-4" class="jcarousel-skin-tango">
                        	<li><a class="plus"     href="images/portfolio-12-big.jpg"><img src="images/portfolio-12.jpg" alt=""></a><a class="plus"     href="images/portfolio-13-big.jpg"><img src="images/portfolio-13.jpg" alt=""></a><a class="plus"     href="images/portfolio-14-big.jpg"><img src="images/portfolio-14.jpg" alt=""></a><a class="plus"     href="images/portfolio-2-big.jpg"><img src="images/portfolio-2.jpg" alt=""></a></li>
                             <li><a class="plus"     href="images/portfolio-1-big.jpg"><img src="images/portfolio-1.jpg" alt=""></a><a class="plus"     href="images/portfolio-2-big.jpg"><img src="images/portfolio-2.jpg" alt=""></a><a class="plus"     href="images/portfolio-3-big.jpg"><img src="images/portfolio-3.jpg" alt=""></a><a class="plus"     href="images/portfolio-4-big.jpg"><img src="images/portfolio-4.jpg" alt=""></a></li>
                            <li><a class="plus"     href="images/portfolio-5-big.jpg"><img src="images/portfolio-5.jpg" alt=""></a><a class="plus"     href="images/portfolio-6-big.jpg"><img src="images/portfolio-6.jpg" alt=""></a><a class="plus"     href="images/portfolio-7-big.jpg"><img src="images/portfolio-7.jpg" alt=""></a><a class="plus"     href="images/portfolio-8-big.jpg"><img src="images/portfolio-8.jpg" alt=""></a></li>
                            <li><a class="plus"     href="images/portfolio-9-big.jpg"><img src="images/portfolio-9.jpg" alt=""></a><a class="plus"     href="images/portfolio-10-big.jpg"><img src="images/portfolio-10.jpg" alt=""></a><a class="plus"     href="images/portfolio-11-big.jpg"><img src="images/portfolio-11.jpg" alt=""></a><a class="plus"     href="images/portfolio-1-big.jpg"><img src="images/portfolio-1.jpg" alt=""></a></li>
                        </ul>
                    </div>
                </div>
                <div id="tab-5" class="tab-content gallery-photo">
                   <div class="inner">
                        <ul id="mycarousel-5" class="jcarousel-skin-tango">
                        	 <li><a class="plus"     href="images/portfolio-1-big.jpg"><img src="images/portfolio-1.jpg" alt=""></a><a class="plus"     href="images/portfolio-2-big.jpg"><img src="images/portfolio-2.jpg" alt=""></a><a class="plus"     href="images/portfolio-3-big.jpg"><img src="images/portfolio-3.jpg" alt=""></a><a class="plus"     href="images/portfolio-4-big.jpg"><img src="images/portfolio-4.jpg" alt=""></a></li>
                            <li><a class="plus"     href="images/portfolio-5-big.jpg"><img src="images/portfolio-5.jpg" alt=""></a><a class="plus"     href="images/portfolio-6-big.jpg"><img src="images/portfolio-6.jpg" alt=""></a><a class="plus"     href="images/portfolio-7-big.jpg"><img src="images/portfolio-7.jpg" alt=""></a><a class="plus"     href="images/portfolio-8-big.jpg"><img src="images/portfolio-8.jpg" alt=""></a></li>
                            <li><a class="plus"     href="images/portfolio-9-big.jpg"><img src="images/portfolio-9.jpg" alt=""></a><a class="plus"     href="images/portfolio-10-big.jpg"><img src="images/portfolio-10.jpg" alt=""></a><a class="plus"     href="images/portfolio-11-big.jpg"><img src="images/portfolio-11.jpg" alt=""></a><a class="plus"     href="images/portfolio-1-big.jpg"><img src="images/portfolio-1.jpg" alt=""></a></li>
                            <li><a class="plus"     href="images/portfolio-12-big.jpg"><img src="images/portfolio-12.jpg" alt=""></a><a class="plus"     href="images/portfolio-13-big.jpg"><img src="images/portfolio-13.jpg" alt=""></a><a class="plus"     href="images/portfolio-14-big.jpg"><img src="images/portfolio-14.jpg" alt=""></a><a class="plus"     href="images/portfolio-2-big.jpg"><img src="images/portfolio-2.jpg" alt=""></a></li>
                        </ul>
                    </div>
                </div>
                <div id="tab-6" class="tab-content gallery-photo">
                   <div class="inner">
                       <ul id="mycarousel-6" class="jcarousel-skin-tango">
                            <li><a class="plus"     href="images/ejecutivos/a7.jpg"><img src="images/ejecutivos/a7p.jpg" alt=""></a><a class="plus"     href="images/ejecutivos/a6.jpg"><img src="images/ejecutivos/a6 - copia.jpg" alt=""></a><a class="plus"     href="images/ejecutivos/a8.jpg"><img src="images/ejecutivos/a8 - copia.jpg" alt=""></a><a class="plus"     href="images/ejecutivos/lincolnmks.jpg"><img src="images/ejecutivos/lincolnmks - copia.jpg" alt=""></a></li>
                            <li><a class="plus"     href="images/ejecutivos/c300.jpg"><img src="images/ejecutivos/c300 - copia.jpg" alt=""></a><a class="plus"     href="images/ejecutivos/cls63.jpg"><img src="images/ejecutivos/cls63 - copia.jpg" alt=""></a><a class="plus"     href="images/ejecutivos/mkz.jpg"><img src="images/ejecutivos/mkz - copia.jpg" alt=""></a><a class="plus"     href="images/ejecutivos/s350.jpg"><img src="images/ejecutivos/s350 - copia.jpg" alt=""></a></li>
                            <li><a class="plus"     href="images/ejecutivos/serie6.jpg"><img src="images/ejecutivos/serie6 - copia.jpg" alt=""></a><a class="plus"     href="images/ejecutivos/c200.jpg"><img src="images/ejecutivos/c200 - copia.jpg" alt=""></a><a class="plus"     href="images/ejecutivos/serie7.jpg"><img src="images/ejecutivos/serie7 - copia.jpg" alt=""></a></li>
                            <li><a class="plus"     href="images/ejecutivos/q50.jpg"><img src="images/ejecutivos/q50 - copia.jpg" alt=""></a><a class="plus"     href="images/ejecutivos/ats.jpg"><img src="images/ejecutivos/ats - copia.jpg" alt=""></a><a class="plus"     href="images/ejecutivos/cts.jpg"><img src="images/ejecutivos/cts - copia.jpg" alt=""></a></li>
                        </ul>
                    </div>
                </div>
                <div id="tab-7" class="tab-content gallery-photo">
                   <div class="inner">
                        <ul id="mycarousel-7" class="jcarousel-skin-tango">
                            <li><a class="plus"     href="images/portfolio-5-big.jpg"><img src="images/portfolio-5.jpg" alt=""></a><a class="plus"     href="images/portfolio-6-big.jpg"><img src="images/portfolio-6.jpg" alt=""></a><a class="plus"     href="images/portfolio-7-big.jpg"><img src="images/portfolio-7.jpg" alt=""></a><a class="plus"     href="images/portfolio-8-big.jpg"><img src="images/portfolio-8.jpg" alt=""></a></li>
                            <li><a class="plus"     href="images/portfolio-9-big.jpg"><img src="images/portfolio-9.jpg" alt=""></a><a class="plus"     href="images/portfolio-10-big.jpg"><img src="images/portfolio-10.jpg" alt=""></a><a class="plus"     href="images/portfolio-11-big.jpg"><img src="images/portfolio-11.jpg" alt=""></a><a class="plus"     href="images/portfolio-1-big.jpg"><img src="images/portfolio-1.jpg" alt=""></a></li>
                            <li><a class="plus"     href="images/portfolio-12-big.jpg"><img src="images/portfolio-12.jpg" alt=""></a><a class="plus"     href="images/portfolio-13-big.jpg"><img src="images/portfolio-13.jpg" alt=""></a><a class="plus"     href="images/portfolio-14-big.jpg"><img src="images/portfolio-14.jpg" alt=""></a><a class="plus"     href="images/portfolio-2-big.jpg"><img src="images/portfolio-2.jpg" alt=""></a></li>
                            <li><a class="plus"     href="images/portfolio-1-big.jpg"><img src="images/portfolio-1.jpg" alt=""></a><a class="plus"     href="images/portfolio-2-big.jpg"><img src="images/portfolio-2.jpg" alt=""></a><a class="plus"     href="images/portfolio-3-big.jpg"><img src="images/portfolio-3.jpg" alt=""></a><a class="plus"     href="images/portfolio-4-big.jpg"><img src="images/portfolio-4.jpg" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>      
        </div>
    </section> 
<?php
	drawFooter();
?>