<?php

    require 'vendor/autoload.php';
    use Laminas\Ldap\Attribute;
    use Laminas\Ldap\Ldap;
    
    ini_set('display_errors', 0);
    #
    # Atribut a modificar --> Número d'idenficador d'usuari
    #
    if($_GET['usr'] && $_GET['ou']){
        
        # Entrada a modificar       
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
        # Modificant l'entrada
        #
        $ldap = new Ldap($opcions);
        $ldap->bind();
        $entrada = $ldap->getEntry($dn);
        if ($entrada){
            Attribute::setAttribute($entrada,$_GET['atribut'],$_GET['dadNuevInp']);
            $ldap->update($dn, $entrada);
            echo "Atribut modificat";
        } else echo "<b>Aquesta entrada no existeix</b><br><br>";
    }
?>

<html>
    <head>
        <title>
        	Modificar dades
        </title>
    </head>
    <body>
    	<form action="http://zend-vlkh.fjeclot.net/zendLdapProject/modificarUsers.php" method="GET">
        	<h1>Introdusca dades del usuario que quers borrar</h1>
        	Usuari: <input type="text" name="usr"><br>
        	Unitat organitzativa: <input type="text" name="ou"></br>
        	<p>Escollir un atribut:</p>
            	<input type="radio" id="uidNumber" name="atribut" value="uidNumber">
                <label for="uidNumber">Uid Number</label>
                <input type="radio" id="gidNumber" name="atribut" value="gidNumber">
                <label for="gidNumber">Gid Number</label>
                <input type="radio" id="homeDirectory" name="atribut" value="homeDirectory">
                <label for="homeDirectory">Directori personal</label></br>
                <input type="radio" id="loginShell" name="atribut" value="loginShell">
                <label for="loginShell">Shell</label> 
                <input type="radio" id="cn" name="atribut" value="cn">
                <label for="cn">CN</label> 
                <input type="radio" id="sn" name="atribut" value="sn">
                <label for="sn">SN</label> </br>
                <input type="radio" id="givenName" name="atribut" value="givenName">
                <label for="givenName">Given Name</label> 
                <input type="radio" id="postalAddress" name="atribut" value="postalAddress">
                <label for="postalAddress">Postal Adress</label> 
                <input type="radio" id="mobile" name="atribut" value="mobile">
                <label for="mobile">Mobile</label></br>
                <input type="radio" id="telephoneNumber" name="atribut" value="telephoneNumber">
                <label for="telephoneNumber">Telephone Number</label> 
                <input type="radio" id="title" name="atribut" value="title">
                <label for="title">Title</label> 
                <input type="radio" id="description" name="atribut" value="description">
                <label for="description">Description</label> </br>
        	Dades nuevas: <input type="text" name="dadNuevInp"><br>       	
        	<input type="submit" value="Modificar"/>
        	<input type="reset" value="Neteja"/></br>        	
    	</form>
    	<a href="http://zend-vlkh.fjeclot.net/zendLdapProject/menu.php">Torna a MENU</a></br>
        	<a href="http://zend-vlkh.fjeclot.net/zendLdapProject/index.php">Torna a la pàgina inicial</a>
    </body>
</html>