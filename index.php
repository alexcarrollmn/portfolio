<?
if(isset($_POST['submit'])){
  
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $url = $_POST['url'];
  substr_replace($url ,"",-1);
  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

  function check_email_address($email) {
  	if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) { 
  		return false; 
  	}
  	$email_array = explode("@", $email); 
  	$local_array = explode(".", $email_array[0]); 
  	for ($i = 0; $i < sizeof($local_array); $i++) { 
  		if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", 
  		$local_array[$i])) { 
  			return false; 
  		} 
  	} 
  	if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {  
  		$domain_array = explode(".", $email_array[1]); 
  		if (sizeof($domain_array) < 2) { 
  			return false; 
  		} 
  		for ($i = 0; $i < sizeof($domain_array); $i++) { 
  			if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) { 
  				return false; 
  			} 
  		} 
  	} 
  	return true; 
  }

  if (check_email_address($email)) {
  	$complete_message = "";
  	$complete_message .= "Name: " . $name . "\n";
  	$complete_message .= "E-mail: " . $email . "\n";
  	$complete_message .= "Message: " . $message . "\n";

  	$send_to_user = "Thank you for contacting me. I will respond as soon as possible. \r\n http://www.alexcarrollmn.com \r\n\r\nYour submission:\r\n" . $complete_message;

  	$send_to_me = "A visitor has submitted a contact form request. Below is a copy of what they have submitted.\r\n\r\n" . $complete_message;

  	mail("hi@alexcarrollmn.com", "Portfolio | Website Contact Request", $send_to_me, "From:" . $email);
  	mail($email, "Thank you for contacting Alex Carroll", $send_to_user, "From: hi@alexcarrollmn.com");

  	$success = true;
    $error = false;
  }
  else{
    $error = true;
    $success = false;
    unset($success);
  }
}
unset($_POST);
?>
<!DOCTYPE html>
<html lang="en" xml:lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Alex Carroll | Portfolio</title>
    <meta name="Author" content="Author" />
    <meta name="Robots" content="index,all" />
    <meta name="Keywords" content="Alex Carroll, Developer, Web Developer, Web Designer, Web Design, Minneapolis, St. Paul, Saint Paul, PHP, WordPress, Ruby on Rails, alexcarrollmn" />
    <meta name="Description" content="The portfolio of Alex Carroll" />
<?php
      if( strstr($_SERVER['HTTP_USER_AGENT'],'Android') ||
      	strstr($_SERVER['HTTP_USER_AGENT'],'webOS') ||
      	strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') ||
      	strstr($_SERVER['HTTP_USER_AGENT'],'iPod') ||
      	strstr($_SERVER['HTTP_USER_AGENT'],'iPad')
      	){
      	$stylesheet="mobile";
      }
        else {
          $stylesheet = 'style';
        }
?>
    <link rel="stylesheet" href="/css/<?=$stylesheet;?>.css" type="text/css" media="screen" />
    <link href='http://fonts.googleapis.com/css?family=Arvo|Questrial' rel='stylesheet' type='text/css' />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/application.js" type="text/javascript" charset="utf-8"></script>
    <link href="favicon.ico" rel="icon" type="image/x-icon" title="" />
    <script src="/js/modernizr.custom.23064.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/selectivizr-min.js" type="text/javascript" charset="utf-8"></script>
    <meta name="viewport" content="width=device-width; initial-scale=1.0"> 
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://s3.amazonaws.com/nwapi/nwmatcher/nwmatcher-1.2.4-min.js"></script>
    <script src="selectivizr-min.js" type="text/javascript" charset="utf-8"></script>
    <![endif]-->
  </head>
  <body>
    <div id="wrapper">
      <header>
        <h1><span>Alex Carroll</span><img src="images/header_win.jpg" alt="Header Win"></h1>
      </header>
      <nav id="nav">
        <div id="mainNav-wrapper">
          <ul id="mainNav">
            <li><a href="#content">Portfolio</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
        <ul id="projectNav">
          <li><a href="#diablomode" class="dmLink">Diablo Mode</a></li>
          <li><a href="#andrewschroeder" class="asLink">Andrew Schroeder</a></li>
          <li><a href="#twenty20" class="twentyLink">Twenty/20 Audio</a></li>
          <li><a href="#slurp" class="slurpLink">Slurp! 2010</a></li>
          <li><a href="#learningwco" class="wcoLink">Learning WCO</a></li>
        </ul>
      </nav>
      <div id="pushDiv"></div>
      <div id="content">
        <article id="diablomode" class="project">
          <section>
            <h2>Diablo Mode</h2>
            <div class="slider-controls">
              <a class="prev" href="#">previous</a>
              <a class="next" href="#">next</a>
            </div>
            <img src="/images/diablomode.png" class="projectImage" alt="Screenshot of Diablo Mode's website.">
          </section>
          <aside>
            <h3>Details</h3>
            <strong>Contributions:</strong> HTML, CSS, PHP, WordPress, JavaScript, MooTools
            <p>
              Diablo Mode is an Australian artist that produces sculptures made of all natural materials. Working from a style guide, I built this website using WordPress and elbow grease. This website required some clever tricks with JavaScript and PHP in order to get the gallery to work without using third-party plug-ins.
            </p>
            <a href="http://www.diablomode.com" class="liveLink" target="_blank">view live</a>
            
            <div class="code-images">
              <a href="images/diablomodecode1.png"><img src="images/diablomodecode1.png" alt="Diablomodecode1"></a>
              <a href="images/diablomodecode2.png"><img src="images/diablomodecode2.png" alt="Diablomodecode2"></a>
              <a href="images/diablomode.png"><img src="/images/diablomode.png" alt="Screenshot of Diablo Mode's website."></a>
            </div>
          </aside>
        </article>
        <article id="andrewschroeder" class="project">
          <section>
            <h2>Andrew Schroeder</h2>
            <div class="slider-controls">
              <a class="prev" href="#">previous</a>
              <a class="next" href="#">next</a>
            </div>
            <img src="/images/andrewschroeder.png" class="projectImage" alt="Andrewschroeder">
          </section>
          <aside>
            <h3>Details</h3>
            <strong>Contributions:</strong> UX / IA, Design, HTML, CSS, JavaScript, WordPress, PHP
            <p>
              Local artist Andrew Schroeder was in need of a WordPress theme that was custom tailored to his desires and needs. With some artistic guidance and inspiration that Mr. Schroeder sent, I designed and built a minimal theme that suited his needs and artistic style.
            </p>
            <a href="http://www.andrewschroeder.net" class="liveLink" target="_blank">view live</a>
            <div class="code-images">
              <a href="/images/andrewschroedercode1.png"><img src="/images/andrewschroedercode1.png" alt="Andrewschrpedercode1"></a>
              <a href="/images/andrewschroeder.png"><img src="/images/andrewschroeder.png" alt="Andrewschroeder"></a>
            </div>
          </aside>
        </article>
        <article id="twenty20" class="project">
          <section>
            <h2>Twenty/20 Audio</h2>
            <div class="slider-controls">
              <a class="prev" href="#">previous</a>
              <a class="next" href="#">next</a>
            </div>
            <img src="/images/twenty20.png" class="projectImage" alt="Twenty20">
          </section>
          <aside>
            <h3>Details</h3>
            <strong>Contributions:</strong> HTML, CSS, PHP, WordPress, UX / IA
            <p>
              Twenty/20 Audio is a new company that mixes and masters audio for local and national artists. Starting with a logo design, I designed the website so that it would be a clean and functional website that met and exceeded requests from the client.
            </p>
            <a href="http://www.twenty20audio.com" class="liveLink" target="_blank">view live</a>
            <div class="code-images">
              <a href="/images/twenty20layout.png"><img src="/images/twenty20layout.png" alt="Twenty 20 Audio"></a>
              <a href="/images/twenty20code1.png"><img src="/images/twenty20code1.png" alt="Twenty 20 Audio"></a>
              <a href="/images/twenty20.png"><img src="/images/twenty20.png" alt="Twenty 20 Audio"></a>
            </div>
          </aside>
        </article>
        <article id="slurp" class="project">
          <section>
            <h2>Slurp! 2010</h2>
            <div class="slider-controls">
              <a class="prev" href="#">previous</a>
              <a class="next" href="#">next</a>
            </div>
            <img src="/images/slurp.jpg" class="projectImage" alt="Slurp">
          </section>
          <aside>
            <h3>Details</h3>
            <strong>Contributions:</strong> HTML, CSS, PHP, WordPress
            <p>
              Grandpa-George holds an annual Soup Party for friends and family. As a member of the development team, I worked on creating a pixel-perfect build for the web presence of this event.
            </p>
            <a href="http://slurp.grandpa-george.com/" class="liveLink" target="_blank">view live</a>
            <div class="code-images">
              <a href="images/slurpcode1.png"><img src="images/slurpcode1.png" alt="Slurpcode1"></a>
              <a href="images/slurpcode2.png"><img src="images/slurpcode2.png" alt="Slurpcode2"></a>
              <a href="/images/slurp.jpg"><img src="/images/slurp.jpg" alt="Slurp"></a>
            </div>
          </aside>
        </article>
        <article id="learningwco" class="project">
          <section>
            <h2>Learning WCO</h2>
            <div class="slider-controls">
              <a class="prev" href="#">previous</a>
              <a class="next" href="#">next</a>
            </div>
            <img src="/images/wco.png" class="projectImage" alt="Learning WCO">
          </section>
          <aside>
            <h3>Details</h3>
            <strong>Contributions:</strong> Designer, HTML, CSS, PHP
            <p>
              Learning WCO is a tool built for training on a web-based program called WebCheckout for new employees to the Art Institutes International Minnesota’s Equipment Cage. The training consists of instructional videos, written descriptions, and a test.
            </p>
            <a href="http://www.alexcarrollmn.com/wco" class="liveLink" target="_blank">view live</a>
            <div class="code-images">
              <a href="/images/wcocode1.png"><img src="/images/wcocode1.png" alt="WCOcode1"></a>
              <a href="/images/wcohome.png"><img src="/images/wcohome.png" alt="WCO home"></a>
              <a href="/images/wcotest.png"><img src="/images/wcotest.png" alt="WCO test"></a>
              <a href="/images/wco.png"><img src="/images/wco.png" alt="WCO"></a>
            </div>
          </aside>
        </article>
      </div>
      <footer>
        <section id="about">
          <h2>About Alex Carroll</h2>
          <p>Understanding how people interact with electronic interfaces is a passion of mine; from the most mundane to the highly interactive, they all interest me. As a web developer, I draw inspiration from code that is treated equally important as design.</p>
          <ul>
            <li><a href="http://www.twitter.com/#!/alexcarrollmn">@alexcarrollmn</a></li>
            <li><a href="http://www.linkedin.com/pub/alex-carroll/8/4ba/588">LinkedIn</a></li>
          </ul>
        </section>
        <section id="resume">
          <h2>Resume</h2>
          <ul>
            <li><a href="/AlexCarroll_Resume.pdf">pdf</a></li>
            <li><a href="/AlexCarroll_Resume.doc">doc</a></li>
            <li><a href="/resume">html</a></li>
          </ul>
        </section>
        <section id="contact">
          <h2>Contact &ndash; <a href="/vCard.vcf">get vCard!</a></h2>
<?php
    				function curPageURL() {
    				 $pageURL = 'http';
    				 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    				 $pageURL .= "://";
    				 if ($_SERVER["SERVER_PORT"] != "80") {
    				  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    				 } else {
    				  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    				 }
    				 return $pageURL;
    				}
?>
          <form method="post" action="<?=curPageURL();?>">
            <label for="name">Name:</label><input type="text" name="name" id="name" value="<?= @$name;?>" />
            <label for="email">Email:</label><input type="text" name="email" id="email" value="<?= @$email;?>" />
            <label for="message">Message:</label><textarea name="message" id="message"><?= @$message;?></textarea>
            <input type="hidden" value="<?=curPageURL();?>" name="url">
            <input type="submit" value="contact me" name="submit" id="submit"/>
<? if ($error){echo '            <p class="message error">Please provide a valid E-mail address.</p>';}?>
<? if ($success){echo '            <p class="message success">Thank you for contacting Alex Carroll. A copy of your message was delivered to the E-mail address provided.</p>';}?>
          </form>
<?
          unset($error);
          unset($success);
?>
        </section>
      </footer>  
    </div>
    <script src="//static.getclicky.com/js" type="text/javascript"></script>
    <script type="text/javascript">try{ clicky.init(66473090); }catch(e){}</script>
    <noscript><p><img alt="Clicky" width="1" height="1" src="//in.getclicky.com/66473090ns.gif" /></p></noscript>
    <script type="text/javascript">
      var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
      document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
      </script>
    <script type="text/javascript">
      try{
      var pageTracker = _gat._getTracker("UA-16262936-1");
      pageTracker._trackPageview();
      } catch(err) {}
    </script>
  </body>
</html>