<?php
//Whois Lookup by Doorman
//d@omit.io
//https://github.com/doorman1
//
/* 
  include this file for ajax load
  you can add new domains into main and other array
  don't forget answer strings as "no match"
*/

$extensions = array( 
  'main' => array(   
	'.com' 		=> array('whois.verisign-grs.com','No match for', 'Quota exceeded'),
	'.net' 		=> array('whois.crsnic.net','No match for', 'Quota exceeded'),
	'.org' 		=> array('whois.pir.org','NOT FOUND', 'Quota exceeded'),
	'.us' => array('whois.nic.us', 'Not found', 'Quota exceeded'),
	'.info' 	=> array('whois.afilias.net','NOT FOUND', 'Quota exceeded'),	
	'.biz' 		=> array('whois.biz','Not found', 'Quota exceeded'),
	'.xxx' => array('whois.nic.xxx', 'NOT FOUND', 'Quota exceeded'),
  ),
  
  
  'other' => array( 
  
  //'.ao' => array('whois.nic.am', 'Not found', 'Quota exceeded'),
  //'.bb' => array('whois.una.an', 'Not found' ,'Quota exceeded'), 
  //'.bs' => array('whois.geektools.com', 'Not found', 'Quota exceeded'),
  //'.dj' 		=> array('whois.rain.fr','No match for', 'Quota exceeded'), 
  //'.jm' => array('whois.nic.jm', 'Not found', 'Quota exceeded'),              
  //'.mm' => array('ns0.mpt.net.mm', 'Not found', 'Quota exceeded'),                
  //'.tt' => array('dns.nic.tt', 'Not found', 'Quota exceeded'),
   
//	'.ac' => array('whois.nic.ac', 'purchase', 'Quota exceeded'),
//	'.aero' => array('whois.aero', 'NOT FOUND', 'Quota exceeded'),
//	'.ag' => array('whois.nic.ag', 'NOT FOUND', 'Quota exceeded'),
	'.ai' => array('whois.ai', 'not registred', 'Quota exceeded'), 
	'.am' => array('whois.amnic.net', 'No match', 'Quota exceeded'),
	'.at' => array('whois.nic.at', 'nothing found', 'Quota exceeded'),     //Quota exceeded 
//	'.au' => array('whois.aunic.net', 'No Data Found', 'query limit'),	        
	'.as' => array('whois.nic.as', 'Domain Not Found', 'Quota exceeded'),
//	'.asia' => array('whois.nic.asia', 'NOT FOUND', 'Quota exceeded'),
	'.be' => array('whois.dns.be', 'Status: AVAILABLE', 'Quota exceeded'),
//	'.ca' => array('whois.cira.ca', 'status: available', 'Quota exceeded'),
	'.cc' => array('whois.nic.cc', 'No match', 'Quota exceeded'),
	'.co' => array('whois.nic.co', 'Not found', 'Quota exceeded'),
//	'.coop' => array('whois.nic.coop', 'No domain records', 'Quota exceeded'),
	'.co.uk' 	=> array('whois.nic.uk','No match', 'Quota exceeded'),		
	'.de' => array('whois.denic.de', 'Status: free', 'Quota exceeded'),
	'.ee' => array('whois.eenet.ee', 'no entries found', 'Quota exceeded'),
	'.eu' => array('whois.eu', 'still available', 'Quota exceeded'),
	'.fm' => array('whois.nic.fm', 'Status: Not Registered', 'Quota exceeded'), 
	'.gg' => array('whois.channelisles.net', 'Not Registered', 'Quota exceeded'), 
	'.gg' => array('whois.gg', 'Not Registered', 'Quota exceeded'),	
//	'.gov' => array('whois.nic.gov', 'No match', 'Quota exceeded'),	
	'.in'      => array('whois.inregistry.net', 'NOT FOUND', 'Quota exceeded'),
	'.io'      => array('whois.nic.io', 'purchase', 'Quota exceeded'),
	'.it' => array('whois.nic.it', 'AVAILABLE', 'Quota exceeded'),
	'.is' => array('whois.isnic.is', 'No entries found', 'Quota exceeded'),
//	'.jobs' => array('jobswhois.verisign-grs.com', 'No match for', 'Quota exceeded'),
	'.la' => array('whois.nic.la', 'DOMAIN NOT FOUND', 'Quota exceeded'),
	'.ly' => array('whois.nic.ly', 'Not found', 'Quota exceeded'),
	'.me' => array('whois.meregistry.net', 'Not found', 'Quota exceeded'),
//	'.mobi' => array('whois.dotmobiregistry.net', 'NOT FOUND', 'Quota exceeded'),	
//	'.name' 	=> array('whois.nic.name','No match', 'Quota exceeded'),
	'.nl' 		=> array('whois.domain-registry.nl','free', 'daily whois-limit exceeded'),
	'.no' => array('whois.norid.no', 'No match', 'Quota exceeded'),
	'.nu' => array('whois.nic.nu', 'NO MATCH for', 'Quota exceeded'),
	'.pro' => array('whois.registry.pro', 'NOT FOUND', 'Quota exceeded'),
	'.ru' => array('whois.ripn.net', 'No entries found', 'Quota exceeded'),
	'.si' => array('whois.arnes.si', 'No entries found', 'Quota exceeded'),
	'.so' => array('whois.nic.so', 'Not found', 'Quota exceeded'),
	'.st' => array('whois.nic.st', 'No entries', 'Quota exceeded'),
	'.to' => array('whois.tonic.to', 'No match', 'Quota exceeded'),
//	'.travel' => array('whois.nic.travel', 'Not found', 'Quota exceeded'),
	'.tv' 		=> array('tvwhois.verisign-grs.com', 'No match', 'Quota exceeded'), 
	'.ws'		=> array('whois.website.ws','No Match', 'maximum allowable')
)
);
?>