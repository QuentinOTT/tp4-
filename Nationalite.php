
<?php
class Nationalite {

    /**
     * numero du nationalite
     * 
     * @var int
     */
    private $num;

    /**
     * Libelle du nationalite
     * 
     * @var string
     */
    private $libelle;

    


    /**
     * Get the value of num
     */
    public function getNum()
    {
    return $this->num;
    }

    /**
     * Lit le libelle
     *
     * @return string
     */
    public function getLibelle() : string 
    {
    return $this->libelle;
    }

    /**
     * ecrit dans le libelle
     *
     * @param string $libelle
     * @return self
     */
    public function setLibelle(string $libelle) : self
    {
    $this->libelle = $libelle;

    return $this;
    }

    /**
     * Retourne l'ensemble des nationalites
     *
     * @return Nationalite[] tableau d'objet nationalite
     */
    public static function findAll() :array
    
    $req = MonPdo::getInstance()->prepare($texteReq);
    $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'nationalite');
    $req->execute();
    $lesResultats = $req->fetchAll();
    return $lesResultats;
}
    
    /**
     * Trouvre un nationalite par son num
     * 
     * @param integer $id numéro du nationalite
     * @return Nationalite objet nationalite trouvé
     */


    public static function findById(int $id) :Nationalite
    {
        $req=MonPdo::getInstance()->prepare("Select * from nationalite where num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'nationalite');
        $req->bindParam(':id', $id);
        $req->execute();
        $lesResultats=$req->fetch();
        return $lesResultats;
    }
    /**
     * Permet d'ajouter un nationalite
     *
     * @param Nationalite $nationalite nationalite à ajouter
     * @return integer resultat (1 si l'opération a reussi, 0 si non)
     */
    public static function add(Nationalite $nationalite) :int
    {
        $req=MonPdo::getInstance()->prepare("insert into nationalite(libelle) values(:libelle)");
        $libelle=$nationalite->getLibelle();
        $req->bindParam(':libelle' ,$libelle);
        $nb=$req->execute();
        return $nb;
    }

    /**
     * Permet de modifier un nationalite
     * 
     * @param Nationalite $nationalite nationalite à modifier
     * @return integer resultat (1 si l'opération a reussi, 0 si non)
     */

    public static function update(Nationalite $nationalite) :int
    {
        $req=MonPdo::getInstance()->prepare("update nationalite set libelle= :libelle where num= :id");
        $num=$nationalite->getNum();
        $libelle=$nationalite->getLibelle();
        $req->bindParam(':id' , $nationalite->$num);
        $req->bindParam(':libelle' , $libelle);
        $nb=$req->execute();
        return $nb;
    }

    /**
     * Permet de supprimer un nationalite
     * 
     * @param Nationalite $nationalite
     * @return integer
     */

    public static function delete(Nationalite $nationalite) :int
{
    $req=MonPdo::getInstance()->prepare("delete from nationalite where num= :id");
    $num=$nationalite->getNum();
    $req->bindParam(':id' ,$num);
    $nb=$req->execute();
    return $nb;
}
    

    /**
     * Set numero du nationalite
     *
     * @param  int  $num  numero du nationalite
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