<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="utf-8">
    <title>Abstrak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php 
	echo HTML::script('js/jquery-1.10.1.min.js'); 
	echo HTML::script('js/jquery-ui.js');
	echo HTML::script('js/jquery-ui-i18n.js'); 
	echo HTML::script('js/jquery.dataTables.js'); 
	echo HTML::script('js/bootstrap.js'); 
	echo HTML::script('js/general.js'); 
	echo HTML::script('js/jquery.passstrength.min.js'); 
	//echo HTML::script('js/general.js'); 
	//echo HTML::script('js/jquery.dataTables.js');
	//echo HTML::script('js/bootstrap.min.js');
	
	
	echo HTML::style('css/jquery-ui.min.css'); 
	
	echo HTML::style('css/jquery.dataTables.css'); 
	//echo HTML::style('css/jquery.dataTables_themeroller.css');
	//echo HTML::style('css/bootstrap.min.css');
	//echo HTML::style('css/bootstrap-responsive.min.css');
	//echo HTML::style('css/real-world.css');
	
	echo HTML::style('css/bootstrap-fromtheme.css'); 
	echo HTML::style('css/bootstrap-responsive-fromtheme.css'); 
	echo HTML::style('css/docs.css'); 
	echo HTML::style('css/general.css'); 
	  ?>
      
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    </head>
    <body>
    <div class="header-container">
    	<div class="header center"> 
        	<div class="logo">
            </div>
           
        </div>
        
    </div>
    <!-- NAVBAR -->
    @include('pages.menu')
    <!-- /NAVBAR -->
    
    <!-- MAINCONTENT -->
    <div class="container-fluid maincontent-container">
      <div class="row-fluid">
      <div class="span3"> @include('pages.sidebar')</div>
       <div class="span9 well">  @yield('content')</div>
     
      </div>
      <div class="row-fluid">
      <hr>
      <footer>
        <p>&copy; UITM 2013</p>
      </footer>
      </div>
      </div>
    </body>
</html>