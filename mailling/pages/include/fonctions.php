<?php
	//Determination du nombre total de campagne
	function nbCampagne()
	{
		try{
				$db = new PDO('mysql:host=localhost; dbname=takamaka2', 'root','');
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES "UTF8"');
			}
		catch(PDOException $e)
		{
			die('Erreur :  '.$e->getMessage());
		}

		$req = $db->query('SELECT * FROM campagne');
		$campagne = $req->rowCount();

		return $campagne;
	}
	//Determination du nombre total de message
	function nbMessage()
	{
		try{
				$db = new PDO('mysql:host=localhost; dbname=takamaka2', 'root','');
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES "UTF8"');
			}
		catch(PDOException $e)
		{
			die('Erreur :  '.$e->getMessage());
		}

		$req = $db->query('SELECT * FROM message');
		$message = $req->rowCount();

		return $message;
	}

	function nbMailing()
	{
		try{
				$db = new PDO('mysql:host=localhost; dbname=takamaka2', 'root','');
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES "UTF8"');
			}
		catch(PDOException $e)
		{
			die('Erreur :  '.$e->getMessage());
		}

		$req = $db->query('SELECT * FROM mailing');
		$mailing = $req->rowCount();

		return $mailing;
	}
