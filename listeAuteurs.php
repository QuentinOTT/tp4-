<div class="container mt-5">
    <div class="row pt-3">
        <div class="col-9">
            <h2>Liste des auteurs</h2>
        </div>
        <div class="col-3">
            <a href="index.php?uc=auteurs&action=add" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Créer un auteur
            </a>
        </div>
    </div>


       
       

            <table class="table table-hover table-striped">
                <thead>
                    <tr class="d-flex">
                        <th scope="col" class="col-md-2">Numéro</th>
                        <th scope="col" class="col-md-8">Nom</th>
                        <th scope="col" class="col-md-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
    foreach($lesAuteurs as $auteur){
        echo "<tr class='d-flex'>";

            echo "<td class='col-md-2'>".$auteur->getNum()."</td>";
            echo "<td class='col-md-8'>".$auteur->getNom()."</td>";
            

            echo "<td class='col-md-2'>
                <a href='index.php?uc=auteurs&action=update&num=" .$auteur->getNum()."' class='btn btn-primary'><i class='fas fa-pen'></i></a>
                <a href='#modalSuppression' data-toggle='modal' data-message='Voulez vous supprimer cet auteur ?' data-suppression='index.php?uc=auteurs&action=delete&num=".$auteur->getNum()."' class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
            </td>";
        echo "</tr>";


    }

// supprimerNationalite.php?num=$nationalite->num

    ?>



                </tbody>
            </table>


        </div>

        