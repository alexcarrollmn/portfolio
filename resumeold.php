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

        <link rel="stylesheet" href="/css/style.css" type="text/css" media="screen" />
    <link href='http://fonts.googleapis.com/css?family=Arvo|Questrial' rel='stylesheet' type='text/css' />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
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
    <div class="resume" id="wrapper">
      <nav id="nav">
        <div id="mainNav-wrapper">
          <ul id="mainNav">
            <li><a href="/">Portfolio</a></li>
            <li><a href="http://www.alexcarrollmn.com/#about">About</a></li>
            <li><a href="http://www.alexcarrollmn.com/#contact">Contact</a></li>
          </ul>
        </div>
      </nav>
      <div id="pushDiv"></div>
      <div id="content" class="resume">
        <article>
          <div>
          <h1>Work History</h1>
            <aside class="title">
              <h2>Grandpa-George</h2>
              <p>Minneapolis, MN</p>
              <p>September '09&ndash;September '10</p>
              <p>February '11&ndash;September '11</p>
            </aside>
            <section class="description">
              <h2>Senior Web Developer Intern</h2>
              <p>Developed both internal and client websites in HTML / CSS, PHP, WordPress, and JavaScript. Wrote frontend and backend code for Grandpa-George’s annual soup party website for 2010. Lead development on the website of the Australian artist Diablo Mode. Developed HTML emails for a local marketing consulting company. Kept track of hours worked on projects to task level. Programmed in Ruby on Rails using Twilio API and Heroku to create a visual voicemail application. Delegated tasks to other interns. Produced training videos for clients to be able to use and update their websites and videos for training Graphic Design students on the basics of HTML and CSS. </p>
            </section>
          </div>
          <div>
            <aside class="title">
              <h2>The Art Institutes International Minnesota</h2>
              <p>Minneapolis, MN</p>
              <p>June '10&ndash;Present</p>
            </aside>
            <section class="description">
              <h2>Student Tech</h2>
              <p>Loaded Mac and Windows software images on school computers. Set up new computers. Took low-level tech support related issues from faculty and staff. Checked out photography, video, and other miscellaneous gear to faculty, staff and students. Assisted with the implementation of checkout policies. Assisted with training of new employees. Ensured a quality experience of the patrons. </p>
            </section>
          </div>
          <div>
            <aside class="title">
              <h2>Crabtree Companies, Inc.</h2>
              <p>Eagan, MN</p>
              <p>October '07&ndash;February '09</p>
            </aside>
            <section class="description">
              <h2>Network Support Specialist</h2>
              <p>Supported internal Windows domain, network, and general technical issues. Consulted on network issues with clients’ copiers and printers.  Performed maintenance on company website. </p>
            </section>
          </div>
        </article>
        <article>
          <h1>Skills</h1>
          <aside>
          <ul>
            <h2>Languages</h2>
            <li>HTML</li>
            <li>CSS</li>
            <li>JavaScript</li>
            <li>PHP</li>
            <li>Ruby</li>
          </ul>
          </aside>
          <aside>
          <ul>
            <h2>Frameworks</h2>
            <li>WordPress</li>
            <li>jQuery</li>
            <li>Ruby on Rails</li>
          </ul>
          </aside>
          <aside>
          <ul>
            <h2>Other</h2>
            <li>Standards Based Code</li>
            <li>GIT</li>
            <li>SVN</li>
            <li>Heroku</li>
          </ul>
          </aside>
        </article>
        <article>
          <h1>Education</h1>
          <div>
            <aside class="title">
              <h2>The Art Institutes International Minnesota</h2>
              <p>September '11</p>
            </aside>
            <section class="description">
              <h3>Bachelor of Science in Web Design and Interactive Media</h3>
            </section>
          </div>
          <div>
            <aside class="title">
              <h2>Inver Hills Community College</h2>
              <p>August '07&ndash;June '08</p>
            </aside>
            <section class="description">
              <h3>General coursework completed for transfer</h3>
            </section>
          </div>
          <div>
            <aside class="title">
              <h2>Winona State University</h2>
              <p>August '06&ndash;June '07</p>
            </aside>
            <section class="description">
              <h3>Bachelor of Science in Human-Computer Interaction</h3>
              <p>Coursework completed for transfer</p> 
            </section>
          </div>
        </article>
        <article>
          <h1>Recognition &amp; Volunteer</h1>
          <ul>
            <li>Minnesota Interactive Marketing Association (MIMA) Member</li>
            <li>BestPrep’s Minnesota Business Venture Volunteer (5 years)</li>
            <li>Overnight Web Challenge &mdash; Chicago 2011</li>
            <li>Dean’s List</li>
          </ul>
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
                <a href="/AlexCarroll_Resume.pdf">pdf</a>
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