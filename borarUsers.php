<?php

    require 'vendor/autoload.php';
    use Laminas\Ldap\Attribute;
    use Laminas\Ldap\Ldap;
    
    ini_set('display_errors', 0);
    #
    # Entrada a esborrar: usuari 3 creat amb el projecte zendldap2
    #
    if($_GET['usr'] && $_GET['ou']){
        
        $dn = 'uid='.$_GET['usr'].',ou='.$_GET['ou'].',dc=fjeclot,dc=net';
        #
        #Opcions de la connexió al servidor i base de dades LDAP
        $opcions = [
            'host' => 'zend-vlkh.fjeclot.net',
            'username' => 'cn=admin,dc=fjeclot,dc=net',
            'password' => 'fjeclot',
            'bindRequiresDn' => true,
            'accountDomainName' => 'fjeclot.net',
            'baseDn' => 'dc=fjeclot,dc=net',
        ];
        #
        # Esborrant l'entrada
        #
        $ldap = new Ldap($opcions);
        $ldap->bind();
        try{
            $ldap->delete($dn);
            echo "<b>Entrada esborrada</b><br>";
        } catch (Exception $e){
            echo "<b>Aquesta entrada no existeix</b><br>";
        }
    }
?>

<html>
    <head>
        <title>
        	Borar dades
        </title>
    </head>
    <body>
    	<form action="http://zend-vlkh.fjeclot.net/zendLdapProject/borarUsers.php" method="GET">
        	<h1>Introdusca dades del usuario que quers borrar</h1>
        	Usuari: <input type="text" name="usr"><br>
        	Unitat organitzativa: <input type="text" name="ou"><br>        	
        	<input type="submit" value="Borrar"/>
        	<input type="reset" value="Neteja"/></br>
    	</form>
    	<a href="http://zend-vlkh.fjeclot.net/zendLdapProject/menu.php">Torna a MENU</a></br>
        	<a href="http://zend-vlkh.fjeclot.net/zendLdapProject/index.php">Torna a la pàgina inicial</a>
    </body>
</html>
