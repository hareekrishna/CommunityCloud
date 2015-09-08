<?PHP 
	if (!defined('HOST')) 
	define("HOST","localhost");
	if (!defined('USER')) 
	define("USER","eyebrowraise");
	if (!defined('PASSWORD')) 
	define("PASSWORD","shakemom");
	if (!defined('DATABASE')) 
	define("DATABASE","drive");
	
	$mysqli=new mysqli(HOST,USER,PASSWORD,DATABASE);				
?>