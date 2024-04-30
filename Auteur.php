<?php
class Auteur {

    /**
     * numero du auteur
     * 
     * @var int
     */
    private $num;

    /**
     * Nom du auteur
     * 
     * @var string
     */
    private $nom;

    


    /**
     * Get the value of num
     */
    public function getNum()
    {
    return $this->num;
    }

    /**
     * Lit le nom
     *
     * @return string
     */
    public function getNom() : string 
    {
    return $this->nom;
    }

    /**
     * ecrit dans le nom
     *
     * @param string $nom
     * @return self
     */
    public function setNom(string $nom) : self
    {
    $this->nom = $nom;

    return $this;
    }

    /**
     * Retourne l'ensemble des auteurs
     *
     * @return Auteur[] tableau d'objet auteur
     */
    public static function findAll() :array
    {
    
        $req=MonPdo::getInstance()->prepare("Select * from auteur");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Auteur');
        $req->execute();
        $lesResultats=$req->fetchAll();
        return $lesResultats;
    }
    /**
     * Trouvre un auteur par son num
     * 
     * @param integer $id numéro du auteur
     * @return Auteur objet auteur trouvé
     */


    public static function findById(int $id) :Auteur
    {
        $req=MonPdo::getInstance()->prepare("Select * from auteur where num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Auteur');
        $req->bindParam(':id', $id);
        $req->execute();
        $lesResultats=$req->fetch();
        return $lesResultats;
    }
    /**
     * Permet d'ajouter un auteur
     *
     * @param Auteur $nationalite auteur à ajouter
     * @return integer resultat (1 si l'opération a reussi, 0 si non)
     */
    public static function add(Auteur $auteur) :int
    {
        $req=MonPdo::getInstance()->prepare("insert into auteur(nom) values(:nom)");
        $nom=$auteur->getNom();
        $req->bindParam(':nom' ,$nom);
        $nb=$req->execute();
        return $nb;
    }

    /**
     * Permet de modifier un auteur
     * 
     * @param Auteur $auteur auteur à modifier
     * @return integer resultat (1 si l'opération a reussi, 0 si non)
     */

    public static function update(Auteur $auteur) :int
    {
        $req=MonPdo::getInstance()->prepare("update auteur set nom= :nom where num= :id");
        $num=$auteur->getNum();
        $nom=$auteur->getnum();
        $req->bindParam(':id' , $auteur->$num);
        $req->bindParam(':num' , $nom);
        $nb=$req->execute();
        return $nb;
    }

    /**
     * Permet de supprimer un auteur
     * 
     * @param Auteur $auteur
     * @return integer
     */

    public static function delete(Auteur $auteur) :int
{
    $req=MonPdo::getInstance()->prepare("delete from auteur where num= :id");
    $num=$auteur->getNum();
    $req->bindParam(':id' ,$num);
    $nb=$req->execute();
    return $nb;
}
    

    /**
     * Set numero du auteur
     *
     * @param  int  $num  numero du auteur
     *
     * @return  self
     */ 
    public function setNum(int $num) :self
    {
        $this->num = $num;

        return $this;
    }

   
}
?>