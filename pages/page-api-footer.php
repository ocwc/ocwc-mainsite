<?php 
/*
	Template name: API - Footer
*/
?>

<div class="footer-wrapper">
	<div class="container">
		<?php dynamic_sidebar('footer'); ?>
		<?php dynamic_sidebar('footer-wide'); ?>
  	</div>
</div>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  var fingerprint = new Fingerprint().get();
  ga('create', 'UA-4248822-3', {'storage': 'none', 'clientId': fingerprint});
  ga('send', 'pageview', {'anonymizeIp': true});
</script>