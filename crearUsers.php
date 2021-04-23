<?php

    require 'vendor/autoload.php';
    use Laminas\Ldap\Attribute;
    use Laminas\Ldap\Ldap;
    
    ini_set('display_errors', 0);
    #Dades de la nova entrada    
    if($_GET['uidInp'] && $_GET['unorgInp']){
        $objcl=array('inetOrgPerson','organizationalPerson','person','posixAccount','shadowAccount','top');
        #
        #Afegint la nova entrada
        $domini = 'dc=fjeclot,dc=net';
        $opcions = [
            'host' => 'zend-vlkh.fjeclot.net',
            'username' => "cn=admin,$domini",
            'password' => 'fjeclot',
            'bindRequiresDn' => true,
            'accountDomainName' => 'fjeclot.net',
            'baseDn' => 'dc=fjeclot,dc=net',
        ];
        $ldap = new Ldap($opcions);
        $ldap->bind();
        $nova_entrada = [];
        Attribute::setAttribute($nova_entrada, 'objectClass', $objcl);
        Attribute::setAttribute($nova_entrada, 'uid', $_GET['uidInp']);
        Attribute::setAttribute($nova_entrada, 'uidNumber', $_GET['uidNumInp']);
        Attribute::setAttribute($nova_entrada, 'gidNumber', $_GET['gidNumInp']);
        Attribute::setAttribute($nova_entrada, 'homeDirectory', $_GET['dirPersInp']);
        Attribute::setAttribute($nova_entrada, 'loginShell', $_GET['shellInp']);
        Attribute::setAttribute($nova_entrada, 'cn', $_GET['cnInp']);
        Attribute::setAttribute($nova_entrada, 'sn', $_GET['snInp']);
        Attribute::setAttribute($nova_entrada, 'givenName', $_GET['givNameInp']);
        Attribute::setAttribute($nova_entrada, 'mobile', $_GET['mobInp']);
        Attribute::setAttribute($nova_entrada, 'postalAddress', $_GET['posAdresInp']);
        Attribute::setAttribute($nova_entrada, 'telephoneNumber', $_GET['telNumInp']);
        Attribute::setAttribute($nova_entrada, 'title', $_GET['titleInp']);
        Attribute::setAttribute($nova_entrada, 'description', $_GET['descrNumInp']);
        $dn = 'uid='.$_GET['uidInp'].',ou='.$_GET['unorgInp'].',dc=fjeclot,dc=net';
        if($ldap->add($dn, $nova_entrada)) echo "Usuari creat</br>";
    }
    
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			PÀGINA DE CREACIO DE USERS
		</title>
	</head>
	<body>
		<h1>Creacio De Usuaris</h1>
			
		<p>Introdui las dades de usuari:</p>
		<form action="http://zend-vlkh.fjeclot.net/zendLdapProject/crearUsers.php" method="GET">
			Uid: <input type="text" name="uidInp"><br>
			Unitat organitzativa: <input type="text" name="unorgInp"><br>
			UidNumber: <input type="text" name="uidNumInp"><br>
			GidNumber: <input type="text" name="gidNumInp"><br>
			Directori personal: <input type="text" value = "/home/" name="dirPersInp"><br>
			Shell: <input type="text" value = "/bin/bash" name="shellInp"><br>
			CN: <input type="text" name="cnInp"><br>
			SN: <input type="text" name="snInp"><br>
			GivenName: <input type="text" name="givNameInp"><br>
			PostalAdress: <input type="text" name="posAdresInp"><br>
			Mobile: <input type="text" name="mobInp"><br>
			TelephoneNumber: <input type="text" name="telNumInp"><br>
			Title: <input type="text" name="titleInp"><br>
			Description: <input type="text" name="descrNumInp"><br>
			
			
			<input type="submit" value="Crear" />
			<input type="reset" value="Neteja" /></br>
			
			<a href="http://zend-vlkh.fjeclot.net/zendLdapProject/index.php">Torna a la pàgina inicial</a>
		</form>
	</body>
</html>
