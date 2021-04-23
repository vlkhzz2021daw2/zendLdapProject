<?php

    require 'vendor/autoload.php';
    use Laminas\Ldap\Attribute;
    use Laminas\Ldap\Ldap;
    
    ini_set('display_errors', 0);
    #Dades de la nova entrada
    #
    $uid=$_POST['uidInp'];
    $unorg=$_POST['unorgInp'];;
    $num_id=7000;
    $grup=100;
    $dir_pers='/home/usr3';
    $sh='/bin/bash';
    $cn="nomis aletse";
    $sn='nomis';
    $nom='aletse';
    $mobil='666778899';
    $adressa='C/Pi,27,1-1';
    $telefon='934445566';
    $titol='analista';
    $descripcio='analista de sistemes';
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
    Attribute::setAttribute($nova_entrada, 'uid', $uid);
    Attribute::setAttribute($nova_entrada, 'uidNumber', $num_id);
    Attribute::setAttribute($nova_entrada, 'gidNumber', $grup);
    Attribute::setAttribute($nova_entrada, 'homeDirectory', $dir_pers);
    Attribute::setAttribute($nova_entrada, 'loginShell', $sh);
    Attribute::setAttribute($nova_entrada, 'cn', $cn);
    Attribute::setAttribute($nova_entrada, 'sn', $sn);
    Attribute::setAttribute($nova_entrada, 'givenName', $nom);
    Attribute::setAttribute($nova_entrada, 'mobile', $mobil);
    Attribute::setAttribute($nova_entrada, 'postalAddress', $adressa);
    Attribute::setAttribute($nova_entrada, 'telephoneNumber', $telefon);
    Attribute::setAttribute($nova_entrada, 'title', $titol);
    Attribute::setAttribute($nova_entrada, 'description', $descripcio);
    $dn = 'uid='.$uid.',ou='.$unorg.',dc=fjeclot,dc=net';
    if($ldap->add($dn, $nova_entrada)) echo "Usuari creat";
?>

<html>
	<head>
		<title>
			PÀGINA DE CREACIO DE USERS
		</title>
	</head>
	<body>
		<h1>Creacio De Usuaris</h1>
			
		<p>Introdui las dades de usuari:</p>
		<form action="http://zend-vlkh.fjeclot.net/zendLdapProject/crearUsers.php" method="POST">
			Uid: <input type="text" name="uidInp"><br>
			Unitat organitzativa: <input type="text" name="unorgInp"><br>
			
			
			<input type="submit" value="Envia" />
			<input type="reset" value="Neteja" /></br>
			<a href="http://zend-vlkh.fjeclot.net/zendLdapProject/index.php">Torna a la pàgina inicial</a>
		</form>
	</body>
</html>