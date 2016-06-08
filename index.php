<?php

$path = $_REQUEST["p"] ? $_REQUEST["p"] : "index";

preg_replace("~[^[:alnum:]/]~u", '', $path);	// Only keep letters, numbers, and slashes in the path.

?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Detachment 890 - Air Force Reserve Officer Training Corps</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta name="author" content="Nik Philipsen, USAF" />
	<meta name="copyright" content="Design copyright Nik Philipsen. Content copyright United State Air Force." />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="all" />
	
	<!-- CSS includes -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Alegreya+SC:400,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Headland+One' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>
	<a href="?p=index">
	<div id="header">
		&nbsp;
	</div>
</a><!-- /#header -->

	<!-- navigation bar -->
    <div class="navbar navbar-inverse navbar-static-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="brand" href="?p=index">Home</a>
			<ul class="nav">
			  <li class="dropdown">
			    <a href="#" class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#">About <b class="caret"></b></a>
			    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
			    	<li><a tabindex="-1" href="?p=about/det890">Detachment 890</a></li>
			    	<li><a tabindex="-1" href="?p=about/welcome">Commander's Welcome</a></li>
			    	<li><a tabindex="-1" href="?p=about/ec">Extracurricular Activities</a></li>
			    </ul><!-- /.dropdown-menu -->
			  </li><!-- /.dropdown -->
			  <li class="dropdown">
			    <a href="#" class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#">Cadre <b class="caret"></b></a>
			    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
			    	<li><a tabindex="-1" href="?p=cadre/hiss">Col Hiss, Commander</a></li>
			    	<li><a tabindex="-1" href="?p=cadre/rourke">Capt Rourke, OFC</a></li>
			    	<li><a tabindex="-1" href="?p=cadre/delawder">Capt Delawder, EFC</a></li>
			    	<li><a tabindex="-1" href="?p=cadre/brown">Capt Brown, RFC</a></li>
			    	<li><a tabindex="-1" href="?p=cadre/bujaiski">Capt Bujaiski, Guest Cadre</a></li>
			    	<li><a tabindex="-1" href="?p=cadre/bryant">TSgt Bryant, NCOIC</a></li>
			    	<li><a tabindex="-1" href="?p=cadre/norris">SSgt Norris, NCOIC Administration</a></li>
			    	<li><a tabindex="-1" href="?p=cadre/walker">SSgt Walker, NCOIC Personnel Support</a></li>
			    </ul><!-- /.dropdown-menu -->
			  </li><!-- /.dropdown -->
			  <li class="dropdown">
			    <a href="#" class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#">Programs <b class="caret"></b></a>
			    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
			    	<li><a tabindex="-1" href="?p=programs/scholarships">Scholarships</a></li>
			    	<li><a tabindex="-1" href="?p=programs/projectgo">Project GO</a></li>
			    	<li><a tabindex="-1" href="?p=programs/af101">Air Force 101</a></li>
				<li><a tabindex="-1" href="?p=programs/faqs">FAQs</a></li>
				

			    </ul><!-- /.dropdown-menu -->
			  </li><!-- /.dropdown -->
			  <li class="dropdown">
			    <a href="#" class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#">Schools <b class="caret"></b></a>
			    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
			    	<li><a tabindex="-1" href="http://www.virginia.edu">University of Virginia</a></li>
			    	<li><a tabindex="-1" href="http://www.jmu.edu">James Madison University</a></li>
			    	<li><a tabindex="-1" href="http://www.liberty.edu">Liberty University</a></li>
			    	<li><a tabindex="-1" href="http://www.pvcc.edu">Piedmont Virginia Community College</a></li>			    	
			    </ul><!-- /.dropdown-menu -->
			  </li><!-- /.dropdown -->
			</ul>
			<ul class="nav pull-right">

			  <li>
<a href="?p=contact">Contact <i class="icon-white icon-envelope"></i></a>

			 </li>	

			  <li>
			  	<a href="https://collab.itc.virginia.edu/portal/site/ed0ea410-2735-4f6b-b375-524c2c253a0b">Cadet Access <i class="icon-white icon-lock"></i></a>
			  </li>
			
		</ul>
        </div>
      </div>
    </div>

    <div class="main container">

<?php

	if(file_exists('pages/'.$path.'.php'))
		include 'pages/'.$path.'.php';
	else
		echo '<div class="content"><div class="alert alert-error"><h2>404: Page not found</h2><p><b>Site currently undergoing revision. Please contact us or check back later.</b></p><p>Sorry, the URL you entered is not valid.</p></div></div>';

?>

     
    <div class="footer">

<a href="http://www.airforce.com"><img src="img/AirForceSymbol.png" align ="right" style="padding-left:10px"></a>

<a href="http://www.af.mil"><img src="img/256px-Seal_of_the_US_Air_Force.svg.png" align ="right" style="padding-left:10px"></a>

<a href="http://www.au.af.mil/au/holmcenter/index.asp"><img src="img/holmcenter-shield.png" align ="right" style="padding-left:10px"></a>

<a href="http://www.afrotc.com/"><img src="img/ShieldAFROTC.png" align ="right" border="10px"></a>




<br />

<div class="row">
	    	<div class="span4">
    	&copy; Air Force ROTC Detachment 890<br/>
 		University of Virginia<br />
		Charlottesville, Virginia 22904<br />
		Current as of 2014. Under Revision. | <a href="?p=legal/privacy">Privacy Policy</a></br>	    
	</div>

	    	<div class="span3">
	     <i class="icon-black icon-user"></i>: (434) 924-6831</br>	    
<i class="icon-black icon-envelope"></i>: <a href="mailto:afrotc@virginia.edu">afrotc@virginia.edu</a>	
	</div>
</div>
    </div><!-- /.footer -->  
    </div> <!-- /.main .container -->


	<!-- Javascript includes -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
	 $(document).scroll(function(){
	    // If has not activated (has no attribute "data-top"
	    if (!$('.navbar').attr('data-top')) {
	        // If already fixed, then do nothing
	        if ($('.navbar').hasClass('header-fixed')) return;
	        // Remember top position
	        var offset = $('.navbar').offset()
	        $('.navbar').attr('data-top', offset.top);
	    }
	
	    if ($('.navbar').attr('data-top') - $('.navbar').outerHeight() <= $(this).scrollTop()) {
	        $('.navbar').addClass('navbar-fixed-top');
	        $('.navbar').removeClass('navbar-static-top');
	    } else {
	        $('.navbar').addClass('navbar-static-top');
	        $('.navbar').removeClass('navbar-fixed-top');
	    }
	}); 
    </script>

</body>

</html>
