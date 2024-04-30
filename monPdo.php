<?php
class MonPdo
{

private static $serveur='host=btssio.dedyn.io';
private static $bdd='OTTQUEN_biblio2='; 
private static $user='OTTQUEN' ; 
private static $mdp='23112005' ;
private static $monPdo;
private static $unPdo = null;



private function __construct()
{
    MonPdo::$unPdo = new PDO(MonPdo::$serveur.';'.MonPdo::$bdd, MonPdo::$user, MonPdo::$mdp);
    MonPdo::$unPdo->query("SET CHARACTER SET utf8");
    MonPdo::$unPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
public function __destruct()
{ 
    MonPdo::$unPdo = null;
}

public static function getInstance()
{
    if(self::$unPdo == null)
    {
        self::$monPdo= new MonPdo();
    }
    return self::$unPdo;
}

}
?>