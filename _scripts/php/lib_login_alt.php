<?php

	/**
	 * Example class for managing user login actions.
	 * This implementation uses the PDO approach to database connectivity.
	 *
	 * Note: This implementation does NOT include exception-handling, which
	 *       really must be included in any production-ready implementation.
	 */ 
	class LoginManager
	{
		private $dbconn;
		private $tablename;
	
		function __construct( $tablename, $dbname, $dblogin, $dbpass,	
										$url = 'localhost' )
		{
			$this->dbconn = new PDO("mysql:host=$url;dbname=$dbname", "$dblogin", "$dbpass");
			$this->tablename = $tablename;
		}
	
		/**
		* Check whether desired name is available, return false if already taken.
		*/
		function isUnameAvailable( $desired_uname )
		{
			// build query string
			$sql = 'SELECT uname FROM ' . $this->tablename . ' WHERE uname = :desname';

			// submit database query
			$stmt = $this->dbconn->prepare( $sql );
			$stmt->bindValue( ':desname', $desired_uname );
			$stmt->execute();

			return ( $stmt->fetch() == false );
		}
	
		/**
		* Insert new user info into the table.
		*/
		function addAccount($uname, $passwd, $email)
		{
			/* simple MD5 encryption [for production, use something like crypt() instead]
			 * NOTE: instead of PHP, we can encrypt via our SQL query directly
			 *  [http://dev.mysql.com/doc/refman/5.5/en/encryption-functions.html]
			 */
			$passwd = md5($passwd);

			// build INSERT query string
			$sql = 'INSERT INTO ' . $this->tablename . ' (uname, passwd, email) VALUES ( :uname , :passwd , :email )';

			// submit database query
			$stmt = $this->dbconn->prepare( $sql );
			$stmt->bindValue( ':uname', $uname );
			$stmt->bindValue( ':passwd', $passwd );
			$stmt->bindValue( ':email', $email );
			$stmt->execute();
		}
	
		/**
		* Lookup user name and check that entered password matches stored password.
		* Note: Our return value does not distinguish between the two possible
		* failures (uname not found or wrong password) because we want to give
		* as little info away as possible to a potential attacker.
		*/
		function isLoginValid($uname, $passwd)
		{
			// get password value for row that matches the desired user name
			$sql = 'SELECT uname,passwd FROM ' . $this->tablename . ' WHERE uname = :uname ';

			// submit database query
			$stmt = $this->dbconn->prepare( $sql );
			$stmt->bindValue( ':uname', $desired_uname );
			$stmt->execute();

			// get first result record (there should be only one)
			$entry = $stmt->fetch();

			// empty result set means login name not found
			if ( $entry == false )
				return false;

			/* simple MD5 encryption [for production, use crypt() instead]
			 * NOTE: instead of PHP, we can encrypt via our SQL query directly
			 *  [http://dev.mysql.com/doc/refman/5.5/en/encryption-functions.html]
			 */
			$passwd = md5( $passwd );

			// compare encrypted passwords
			return ( $entry[1] == $passwd );
		}
	
	
		/**
		 * Simple check whether both password form inputs match.
		 * A more complete implementation might also check for
		 * other criteria, such as length, upper/lower case, etc.
		 */
		function confirmPassword( $pass1, $pass2 )
		{
			return $pass1 == $pass2;
		}
	
	}

?>
