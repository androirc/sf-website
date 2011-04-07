<?php
/*
 * File: sqlmanager.class.php
 * Author: MewT (mewt.fr@gmail.com)
 * Copyright: 2010 MewT / Julien
 * Date: 13/06/2010
 */

class SQLManager
{
    var $host = 'localhost';
    var $dbname = 'androirc';
    var $login = 'androirc';
    var $password = 'btnk62@.';
    var $debug = false;
    var $path = '/home/androirc/logs/sql';

    function SQLManager()
    {
        @mysql_connect($this->host, $this->login, $this->password) or exit('<html><head><meta http-equiv="Content-type" content="text/html; charset=utf-8"/></head><body>Unable to connect to the database.</body>');
        @mysql_select_db($this->dbname) or exit('<html><head><meta http-equiv="Content-type" content="text/html; charset=utf-8"/></head><body>Unable to connect to the database.</body>');

        /* Pose des soucis d'encodage autrement ... */
        if (function_exists('mysql_set_charset'))
        {
            mysql_set_charset('utf8');
        }
        else
        {
			/* mysql_set_charset n'existe pas avant 5.0.7 */
			$this->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
		}
	}

	function query($query)
	{
		$sql = @mysql_query($query) or $this->error($query);
		return $sql;
	}

 	function prepare($query, $phs = array())
 	{
		foreach ($phs as $ph)
		{
			$ph = "'" . mysql_real_escape_string($ph) . "'";
			$query = substr_replace($query, $ph, strpos($query, '?'),  1);
		}

		return $this->query($query);
    }

	function error($query)
	{
		ob_end_clean();

		$date = date(DATE_RFC822);
		$ip = $_SERVER['REMOTE_ADDR'];
		$host = gethostbyaddr($ip);

		if ($this->debug)
		{
			echo 	'<html><head><meta http-equiv="Content-type" content="text/html; charset=utf-8"/><title>SQL Error - AndroIRC (Android IRC Client)</title></head><body>',
					'<h2>SQL Error !</h2>',
					'<p>A SQL error has just occurred on the server :</p>',
					'<ul>',
						'<li><strong>IP Address</strong> : ', $ip ,'</li>',
						'<li><strong>Host</strong> : ', $host ,'</li>',
						'<li><strong>Time</strong> : ', $date ,'</li>',
						'<li><strong>SQL Error n°</strong> : ', mysql_errno() ,'</li>',
						'<li><strong>SQL Query</strong> : ', $query ,'</li>',
						'<li><strong>MySQL Error</strong> : ', mysql_error() ,'</li>',
					'</ul>',
					'</body></html>';
		}
		else
		{
			echo 	'<html><head><meta http-equiv="Content-type" content="text/html; charset=utf-8"/><title>Oops!</title></head><body>',
					'<h1>Oops !</h1>',
					'<p>An error occurred during the execution of this page.</p>';
		}

		$this->write("[$date] ($ip $host) $query \n" . mysql_error() . "\n");

		exit(1);
	}

	function write($ligne)
	{
		$ptrFichier = @fopen($this->path, 'a+');

	 	@fwrite($ptrFichier, $ligne . "\n");
	 	@fclose($ptrFichier);
	}

	function protect($value)
	{
		return mysql_real_escape_string($value);
	}
}
?>