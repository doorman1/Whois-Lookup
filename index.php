<?php
//Whois Lookup by Doorman
//d@omit.io
//https://github.com/doorman1
//
include 'extensions.php';
?>
<html>
<head>
<title>Domain Name Checker</title>
<!-- this is style, include it at the top of your code in html tags -->
<link href="main.css" rel="stylesheet" />
<!-- javascript and ajax part include it at the top of your code in html tags -->
<script type="text/javascript" src="jquery-1.2.6.min.js"></script>
<script language="javascript">
$(document).ready(function() {
	
  /*global vars*/
	var loading;
	var results;
	var domain_row = 0;
	var submit_click = false;
	
	form = document.getElementById('form');
	loading = document.getElementById('loading');
	results = document.getElementById('results');
	
	/* ajax funcition to display*/
	function showDomain(arg) {
	
		loading.style.display = 'inline';
		
		$.ajax({
      url : 'process.php',        
      type: 'GET',
      data: {domain: escape($('#Search').val()), key: arg.key, server: arg.server, message: arg.message, limit: arg.limit},
      success: function(response){
			
			results.style.display = 'block';
			
			//put new answer into main or other!
			$('#' + arg.category + '_domain').append(unescape(response));	
			
      //when search is completed.			
			if (domain_row == extension.items.length - 1) 
      {
			 domain_row = 0;
			 submit_click = false;
			 loading.style.display = 'none';
			}
      else 
      {
			 domain_row++;
			 showDomain(extension.items[domain_row]);
      }		 
		}});
    
  }
	/* submit click event */
	$('#Submit').click( function() 
  { 
    // If there isn't any domain name in box    
		if($('#Search').val() == "")
		{
      alert('Please enter a domain name.');return false;
    }
    // If search is still going on.
    if (domain_row != 0 || submit_click != false)
    {
      submit_click = true;
      alert('Please wait for answers.');return false;      
    }
        
		$('#results div.response div').html(''); // clean old search
	  showDomain(extension.items[domain_row]); // for array[0]
    $('.response').fadeIn();
	
		return false;
	});
	
});

var extension = this.extension = new function() {
    this.items = new Array();
}

extension.add = function (category, key, server, message, limit) {
  extension.items.push({category: category, key: key, server: server, message: message, limit: limit});
}
<?php foreach ($extensions as $category => $domains): ?>
<?php foreach ($domains as $extension => $array): ?>
  extension.add("<?php echo $category; ?>", "<?php echo $extension; ?>", "<?php echo $array[0]; ?>", "<?php echo $array[1]; ?>", "<?php echo $array[2]; ?>");
  <?php endforeach; ?>
<?php endforeach; ?>
  
function div_main_ac()
{
  $('#main_domain').slideDown(); 
  $('#main_ac').hide();
  $('#main_kapat').fadeIn();  
}
function div_other_ac()
{
  $('#other_domain').slideDown(); 
  $('#other_ac').hide();
  $('#other_kapat').fadeIn();   
}
function div_main_kapat()
{
  $('#main_domain').slideUp();
  $('#main_kapat').hide();
  $('#main_ac').fadeIn();  
}
function div_other_kapat()
{
  $('#other_domain').slideUp();
  $('#other_kapat').hide();
  $('#other_ac').fadeIn();   
}
</script>
<!-- end of javascript and ajax codes -->
</head>
<body>

<!-- all html code START HERE - This is what we see in screen -->
<center>
  <!-- banner -->
  <div id="heading"></div>
  <!-- action="./" means index.php-->
  <form method="post" action="./" id="form">
    <div style="width: 100%; display: block; width:594px; margin:auto;">   
    	<input type="text" autocomplete="off" id="Search" name="domain"> 
    	<input type="submit" id="Submit" value="Submit"> 
      <div style="clear: both;"></div>
    </div>
  </form>
    
  <!-- loading gif -->
  <div id="loading"><img src="load.gif"></img></div><!-- this is what we see in progress, you can change it by changing "load.gif" in folder there is a second gif -> loadx.gif	
  
  <!-- results will be in this div -->	
  <div id="results" style="width:600px; height:600px;" align="left">
    <!-- main array -->
    <div class="main_response response" style="display:none; width:250px; float:left;">
      <p class="title">Important Domain Names<span id="main_kapat" style="float:right;" onClick="div_main_kapat()"><img src="toggle-.png"></img></span><span id="main_ac" style="float:right;" onClick="div_main_ac()"><img src="toggle+.png"></img></span></p>  
      <div id="main_domain">
      </div>
    </div>
    <!-- other array -->
    <div class="other_response response" style="display:none; width:250px; float:right;">
      <p class="title">Other Domain Names<span id="other_kapat" style="float:right;" onClick="div_other_kapat()"><img src="toggle-.png"></img></span><span id="other_ac" style="float:right;" onClick="div_other_ac()"><img src="toggle+.png"></img></span></p>	
      <div id="other_domain">
      </div>        
    </div>    		
  </div>
</center>
<!-- all html code FINISH HERE -->

</body>
</html>
 
