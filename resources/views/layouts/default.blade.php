<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="/images/small-logo-01.png">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="/bower_resources/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bower_resources/font-awesome/css/font-awesome.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/mystyle.css">
    @stack('stylesheet')
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
  </head>
  <body>
    <div id="notification">
      
    </div>

    <!-- HEADER -->
    @include('layouts.parts.header')
    
    <!-- NAVBAR -->

    <div id="wrapper-navbar">
  		<div class="navbar object">
    		<div id="wrapper-sorting">
          @yield('breadcrumb')
        </div>
        <div id="wrapper-bouton-icon">
        	<div id="bouton-ai"><img src="/images/icon-ai.svg" alt="illustrator" title="Illustrator" height="28" width="28"></div>
        	<div id="bouton-psd"><img src="/images/icon-psd.svg" alt="photoshop" title="Photoshop" height="28" width="28"></div>
        	<div id="bouton-theme"><img src="/images/icon-themes.svg" alt="theme" title="Theme" height="28" width="28"></div>
        	<div id="bouton-font"><img src="/images/icon-font.svg" alt="font" title="Font" height="28" width="28"></div>
        	<div id="bouton-photo"><img src="/images/icon-photo.svg" alt="photo" title="Photo" height="28" width="28"></div>
        	<div id="bouton-premium"><img src="/images/icon-premium.svg" alt="premium" title="Premium" height="28" width="28"></div>
  			</div>
    	</div>
    </div>


    <!-- MENU -->	

  	<div id="main-container-menu" class="object">
    	<div class="container-menu">
        <div id="main-cross">
        	<div id="cross-menu"></div>
        </div>
            
        <div id="main-small-logo">
        	<div class="small-logo"></div>
        </div>
        
        <div id="main-premium-ressource">
            <div class="premium-ressource"><a href="#">Premium resources</a></div>
        </div>
        
        <div id="main-themes">
            <div class="themes"><a href="#">Latest themes</a></div>
        </div>
        
        <div id="main-psd">
            <div class="psd"><a href="#">PSD goodies</a></div>
        </div>
            
        <div id="main-ai">
            <div class="ai"><a href="#">Illustrator freebies</a></div>
        </div>
        
        <div id="main-font">
            <div class="font"><a href="#">Free fonts</a></div>
        </div>
        
        <div id="main-photo">
            <div class="photo"><a href="#">Free stock photos</a></div>
        </div>
            
        </div>
    </div>


    <!-- PORTFOLIO -->

	<div id="wrapper-container">
    @yield('errors-message')
    @yield('susscess-message')
    @yield('content')
    
            
  	<!-- <div id="wrapper-thank">
      	<div class="thank">
          	<div class="thank-text">pl<span style="letter-spacing:-5px;">a</span>tz</div>
      	</div>
  	</div> -->
	    
  	<div id="main-container-footer">
  		<div class="container-footer">
          	
              <div id="row-1f">
              	<div class="text-row-1f"><span style="font-weight:600;font-size:15px;color:#666;line-height:250%;text-transform:uppercase;letter-spacing:1.5px;">What is Platz</span><br>Platz is a blog showcasing hand-picked free themes, design stuff, free fonts and other resources for web designers.</div>
              </div>
              
              <div id="row-2f">
              	<div class="text-row-2f"><span style="font-weight:600;font-size:15px;color:#666;line-height:250%;text-transform:uppercase;letter-spacing:1.5px;">How does it work</span><br>Platz offers you all the latest freebies found all over the fourth corners without to pay.</div>
              </div>
              
              <div id="row-3f">
              	<div class="text-row-3f"><span style="font-weight:600;font-size:15px;color:#666;line-height:250%;text-transform:uppercase;letter-spacing:1.5px;">Get in touch!</span><br>Subscribe our RSS or follow us on Facebook, Google+, Pinterest or Dribbble to keep updated.</div>
              </div>
              
              <div id="row-4f">
              	<div class="text-row-4f"><span style="font-weight:600;font-size:15px;color:#666;line-height:250%;text-transform:uppercase;letter-spacing:1.5px;">Newsletter</span><br>You will be informed monthly about the latest content avalaible.</div>

  				<div id="main_tip_newsletter"> 
  					<form>
  						<input type="text" name="newsletter" id="tip_newsletter_input" list="newsletter" autocomplete=off required>
  					</form>
  				</div>
              </div>
              
  		</div>
  	</div>
    
    
    <div id="wrapper-copyright">
  		<div class="copyright">
    		<div class="copy-text object">Copyright © 2016. Template by <a style="color:#D0D1D4;" href="https://dcrazed.com/">Dcrazed</a></div>
    		
			<div class="wrapper-navbouton">
    			<div class="google object">g</div>
    			<div class="facebook object">f</div>
    			<div class="linkin object">i</div>
    			<div class="dribbble object">d</div>
    		</div>
    	</div>
    </div>

  </div>



    <!-- SCRIPT -->
    <script src="/bower_resources/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/bower_resources/jquery/dist/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="/bower_resources/jquery.scrollTo/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="/bower_resources/jquery.localScroll/jquery.localScroll.js"></script> -->
    <!-- <script type="text/javascript" src="js/jquery-animate-css-rotate-scale.js"></script> -->
  	<script type="text/javascript" src="/bower_resources/fastclick/lib/fastclick.js"></script>
  	<script type="text/javascript" src="/bower_resources/jquery-color-animation/jquery.animate-colors.js"></script>
  	<script type="text/javascript" src="/bower_resources/jquery-shadow-animation/jquery.animate-shadow-min.js"></script>    
  	<script type="text/javascript" src="/js/main.js"></script>
  
    <!-- bootstrap -->
    @stack('end-page-scripts')
    <!-- main -->
    <script src="/js/app.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        if ($("#notification_count").html() == "0") {
          $("#notification_count").fadeOut(0);
        }
        $("#notificationLink").click(function() {
          $("#notificationContainer").fadeToggle(300);
          $("#notification_count").fadeOut(0); // <> fadeIn
          $("#notification_count").html(0);
          return false;
        });

        //Document Click hiding the popup 
        $(document).click(function() {
          $("#notificationContainer").hide();
        });

        //Popup on click
        $("#notificationContainer").click(function() {
          return false;
        });

      });
    </script>
  </body>
</html>
