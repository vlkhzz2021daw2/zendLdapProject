<html>
	<head>
		<title>
			PÀGINA WEB INICIAL DE L'APLICACIÓ
		</title>
	</head>
	<body>
		<h1> APLICACIÓ D'ACCÉS A BASES DE DADES LDAP</h1>
		<h2> DAW2 M08UF2 M08UF3 </h2>
		<h3> Autor: Vladislav Khubua</h3>		
		<p>Inicia sessió:</p>
		<form action="http://zend-vlkh.fjeclot.net/zendLdapProject/auth.php" method="POST">
			Usuari amb permisos d'administració LDAP: <input type="text" name="adm"><br>
			Contrasenya de l'usuari: <input type="password" name="cts"><br>
			<input type="submit" value="Envia" />
			<input type="reset" value="Neteja" />
		</form>
	</body>
</html>
