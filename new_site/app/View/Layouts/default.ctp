
<!DOCTYPE html>
<html>
<head>
	
	<title>Detachment 890 - Air Force Reserve Officer Training Corps</title>
	<?php echo $this->Html->charset(); ?>
	<!-- <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> -->
	<meta name="author" content="Nik Philipsen, USAF" />
	<meta name="copyright" content="Design copyright Nik Philipsen. Content copyright United State Air Force." />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="all" />
	
	<!-- CSS includes -->
	<?php
		// echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('style');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script src="http://code.jquery.com/jquery-latest.js"></script>

    <link href='http://fonts.googleapis.com/css?family=Alegreya+SC:400,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Headland+One' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>
	<a href="">
	<div id="header">
		&nbsp;
	</div>
</a><!-- /#header -->

	<!-- navigation bar -->
    <div class="navbar navbar-inverse navbar-static-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="brand" href="<?php echo $basePath; ?>home">Home</a>
			<ul class="nav">
			  <li class="dropdown">
			    <a href="#" class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#">About <b class="caret"></b></a>
			    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
			    	<li><a tabindex="-1" href="<?php echo $basePath; ?>about/det890">Detachment 890</a></li>
			    	<li><a tabindex="-1" href="<?php echo $basePath; ?>about/welcome">Commander's Welcome</a></li>
			    	<li><a tabindex="-1" href="<?php echo $basePath; ?>about/ec">Extracurricular Activities</a></li>
			    </ul><!-- /.dropdown-menu -->
			  </li><!-- /.dropdown -->
			  <li class="dropdown">
			    <a href="#" class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#">Cadre <b class="caret"></b></a>
			    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
			    	<li><a tabindex="-1" href="<?php echo $basePath; ?>cadre/hiss">Col Hiss, Commander</a></li>
			    	<li><a tabindex="-1" href="<?php echo $basePath; ?>cadre/kamorski">Lt Col Kamorski, DO</a></li>
			    	<li><a tabindex="-1" href="<?php echo $basePath; ?>cadre/hubal">Capt Hubal, COC</a></li>
			    </ul><!-- /.dropdown-menu -->
			  </li><!-- /.dropdown -->
			  <li class="dropdown">
			    <a href="#" class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#">Programs <b class="caret"></b></a>
			    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
			    	<li><a tabindex="-1" href="http://www.afrotc.com/scholarships/">Scholarships</a></li>
			    	<li><a tabindex="-1" href="http://www.rotcprojectgo.org">Project GO</a></li>
			    	<li><a tabindex="-1" href="<?php echo $basePath; ?>programs/af101">Air Force 101</a></li>
					<li><a tabindex="-1" href="<?php echo $basePath; ?>programs/faqs">FAQs</a></li>

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
<a href="<?php echo $basePath; ?>pages/contact">Contact <i class="icon-white icon-envelope"></i></a>

			 </li>	

			  <li <?php if (isset($loggedIn)) echo 'class="dropdown"'?> >
			  	<!-- <a href="https://collab.itc.virginia.edu/portal/site/ed0ea410-2735-4f6b-b375-524c2c253a0b">Cadet Access <i class="icon-white icon-lock"></i></a> -->
			  	<?php
			  		if (isset($loggedIn)) {
			  			echo '<a href="#" class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#">' . $user['Cadet']['first_name'] . ' ' . $user['Cadet']['last_name'] . ' <b class="caret"></b></a>';
			  			// echo $this->Html->link($cadet['Cadet']['first_name'] . ' ' . $cadet['Cadet']['last_name'], '/cadets/index');
			  			echo '<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">';
			  			foreach ($userMenu as $itemName => $itemHref) {
			  				if ($itemName=='Manage Attendance' && $user['Cadet']['attendance']==false)
			  					continue;
			  				if ($itemName=='Account Settings')
			  					echo '<li class="divider"></li>';
			  				echo '<li><a tabindex="-1" href="' . $basePath . $itemHref . '">' . $itemName . '</a></li>';
			  			}
		    	
						echo '</ul>';
			  		}
			  		else
			  			echo '<a href="' . $basePath . 'cadets/login">Cadet Access <i class="icon-white icon-lock"></i></a>';//echo $this->Html->link('Cadet Access ', '/cadets/login');
			  	?>
			  </li>
			
		</ul>
        </div>
      </div>
    </div>

    <div class="main container">

<?php

	echo $this->Session->flash();
	echo $this->fetch('content');

?>

     
    <div class="footer">
<?php
	// echo $this->Html->link(
	// 	$this->Html->image('AirForceSymbol.png',
	// 		array(
	// 			'alt' => '',
	// 			'border' => '0',
	// 			'align' => 'right',
	// 			'style' => 'padding-left:10px'
	// 			)),
	// 	'http://www.airforce.com/',
	// 	array(
	// 		'target' => '_blank',
	// 		'escape' => false
	// 		)
	// );
?>

<a href="http://www.airforce.com"><?php echo $this->Html->image('AirForceSymbol.png', array('align' => 'right', 'style' => 'padding-left:10px'));?><!-- <img src="/img/AirForceSymbol.png" align ="right" style="padding-left:10px"> --></a>

<a href="http://www.af.mil"><?php echo $this->Html->image('256px-Seal_of_the_US_Air_Force.svg', array('align' => 'right', 'style' => 'padding-left:10px'));?><!-- <img src="/img/256px-Seal_of_the_US_Air_Force.svg.png" align ="right" style="padding-left:10px"> --></a>

<a href="http://www.au.af.mil/au/holmcenter/index.asp"><?php echo $this->Html->image('holmcenter-shield.png', array('align' => 'right', 'style' => 'padding-left:10px'));?><!-- <img src="/img/holmcenter-shield.png" align ="right" style="padding-left:10px"> --></a>

<a href="http://www.afrotc.com/"><?php echo $this->Html->image('ShieldAFROTC.png', array('align' => 'right', 'border' => '10px'));?><!-- <img src="/img/ShieldAFROTC.png" align ="right" border="10px"> --></a>




<br />

<div class="row">
	    	<div class="span4">
    	&copy; Air Force ROTC Detachment 890<br/>
 		University of Virginia<br />
		Charlottesville, Virginia 22904<br />
		Current as of 16 July 2014 | <a href="/legal/privacy">Privacy Policy</a></br>	    
	</div>

	    	<div class="span3">
	     <i class="icon-black icon-user"></i>: (434) 924-6834</br>	    
<i class="icon-black icon-envelope"></i>: <a href="mailto:afrotc@virginia.edu">afrotc@virginia.edu</a>	
	</div>
</div>
    </div><!-- /.footer -->  
    </div> <!-- /.main .container -->


	<!-- Javascript includes -->
    <?php
    	echo $this->Html->script('bootstrap.min');
    ?>
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
