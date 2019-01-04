<script language="javascript">
function show_result(a)
{
  $('#result_' + a).fadeIn(); 
  $('#show_' + a).hide(); 
  $('#hide_' + a).fadeIn(); 
}
function hide_result(a)
{
  $('.hidden_').slideUp(); 
  $('#hide_' + a).hide(); 
  $('#show_' + a).fadeIn(); 
}
</script>
<?php
//Whois Lookup by Doorman
//d@omit.io
//https://github.com/doorman1
//
//
//
//http://www.iana.org/domains/root/db/

set_time_limit(0);
ob_start();
//set debug 1 to show server answers
$debug = 0;
//include 'extensions.php';

 //get ile domain adı gelmişse
if(isset($_GET['domain']))
{  
  //domain adını düzenleyelim
	$domain = str_replace(array('www.', 'http://'), NULL, $_GET['domain']);
	
	$extensions[$_GET['key']] = array($_GET['server'], $_GET['message'], $_GET['limit']);
	
	if(strlen($domain) > 0)
	{ 	
  	//herbir extension için sorguyu çalıştır
		foreach($extensions as $extension => $who)
		{
	
  	  // print_r($extension);//uzantı
		  // echo $who[0];       //whois server listesi
		  // echo $who[1];       //mesajlar
			$buffer = NULL;
				
			$sock = fsockopen($who[0], 43) or die('Error Connecting To Server:' . $server);
			
      fputs($sock, $domain.$extension . "\r\n");				
				while( !feof($sock) )
				{
				  $buffer .= fgets($sock,20);     
				}				
			fclose($sock);             
      
      if((strpos(strtolower($buffer), "error") === FALSE) && (strpos(strtolower($buffer), "not allocated") === FALSE)) 
      {
    		$rows = explode("\n", $buffer);
    		foreach($rows as $row) 
        {
    			$row = trim($row);
    			if(($row != '') && ($row{0} != '#') && ($row{0} != '%')) {
    				$result .= $row."\n";
    			}
    		}
    	}
       
      $result_extension = 'result_'.$extension;
      //print_r($extensions);
      //Avaiable yada taken durumu 	
      if ($extension == '.be')
		  {
        if(!eregi('registered', $buffer)) //mesaj buffer'ın içinde var mı?
        { 
  				echo '<h4 class="available" title="Domain name is available"><span class="icon"><img src="bullet_green.png"></img></span><span class="domain_name">' . $domain. '<b>' . $extension .'</b></span>
                </h4>';
          if ($debug > 0)
            echo '<div>'. $buffer .'</div>';  
        }
  			else
  			{ 
  				echo '<h4 class="taken" title="Domain name is taken"><span class="icon"><img src="bullet_red.png"></img></span><span class="domain_name">' . $domain . '<b>' .$extension .'</b></span>
                  </h4>';
          if ($debug > 0)
            echo '<div>'. $buffer .'</div>';    
        }            
		  }
		  else if ($extension == '.ca')
		  {
        if(!eregi('registered', $buffer)) //mesaj buffer'ın içinde var mı?
        { 
  				echo '<h4 class="available" title="Domain name is available"><span class="icon"><img src="bullet_green.png"></img></span><span class="domain_name">' . $domain. '<b>' . $extension .'</b></span>
                </h4>';
          if ($debug > 0)
            echo '<div>'. $buffer .'</div>';  
        }
  			else
  			{ 
  				echo '<h4 class="taken" title="Domain name is taken"><span class="icon"><img src="bullet_red.png"></img></span><span class="domain_name">' . $domain . '<b>' .$extension .'</b></span>
                  </h4>';
          if ($debug > 0)
            echo '<div>'. $buffer .'</div>';    
        }            
		  }
		  else if ($extension == '.io')
		  {
        if(eregi('purchase', $buffer)) //mesaj buffer'ın içinde var mı?
        { 
  				echo '<h4 class="available" title="Domain name is available"><span class="icon"><img src="bullet_green.png"></img></span><span class="domain_name">' . $domain. '<b>' . $extension .'</b></span>
                </h4>';
          if ($debug > 0)
            echo '<div>'. $buffer .'</div>';  
        }
  			else
  			{ 
  				echo '<h4 class="taken" title="Domain name is taken"><span class="icon"><img src="bullet_red.png"></img></span><span class="domain_name">' . $domain . '<b>' .$extension .'</b></span>
                  </h4>';
          if ($debug > 0)
            echo '<div>'. $buffer .'</div>';                     
        }            
		  }		 
      else if ($extension == '.eu')
		  {
        if(!eregi('NOT DISCLOSED', $buffer)) //mesaj buffer'ın içinde var mı?
        { 
  				echo '<h4 class="available" title="Domain name is available"><span class="icon"><img src="bullet_green.png"></img></span><span class="domain_name">' . $domain. '<b>' . $extension .'</b></span>
                </h4>';
          if ($debug > 0)
            echo '<div>'. $buffer .'</div>';  
        }
  			else
  			{ 
  				echo '<h4 class="taken" title="Domain name is taken"><span class="icon"><img src="bullet_red.png"></img></span><span class="domain_name">' . $domain . '<b>' .$extension .'</b></span>
                  </h4>';
          if ($debug > 0)
            echo '<div>'. $buffer .'</div>';                      
        }            
		  }		   
		  else
		  {	
      		if(!eregi($who[2], $buffer)) //mesaj buffer'ın içinde var mı?
    			{ 
            	if(eregi($who[1], $buffer)) //mesaj buffer'ın içinde var mı?
        			{ 
        				echo '<h4 class="available" title="Domain name is available"><span class="icon"><img src="bullet_green.png"></img></span><span class="domain_name">' . $domain. '<b>' . $extension .'</b></span>
                      </h4>';
                if ($debug > 0)
                  echo '<div>'. $buffer .'</div>';  
              }
        			else
        			{ 
        				echo '<h4 class="taken" title="Domain name is taken"><span class="icon"><img src="bullet_red.png"></img></span><span class="domain_name">' . $domain . '<b>' .$extension .'</b></span>
                        </h4>';
                if ($debug > 0)
                  echo '<div>'. $buffer .'</div>';    
              }  
    			}
    			else
    			{
            echo '<h4 class="limit" title="Daily quota exceeded"><span class="icon"><img src="bullet_grey.png"></img></span><span class="domain_name">' . $domain. '<b>' . $extension .'</b></span>
                  </h4>';
            if ($debug > 0)
                echo '<div>'. $buffer .'</div>';     
          }
      }
			ob_flush();
			flush();
			sleep(0.3);			
		}
	}
	else
	{
		echo 'Please enter the domain name';
	}
}
?>