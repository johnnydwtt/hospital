<main class="container">
    <h1 class="text-center text-light border-bottom">Liste des patients</h1>

    <div class="input-group d-flex justify-content-center align-items-center mt-3">
        <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="GET">
            <div class="input-group-append text-center d-flex justify-content-center">
                <input type="search" id="search" name="search" class="form-control" placeholder="Rechercher un patient" required >
                <button type="submit" name="envoyer" class="btn waves-effect waves-light btn-primary"><i class="fa fa-search mr-1"></i> Recherche </button>
            </div>
        </form>
    </div>

    <div class="d-flex justify-content-center bg-light shadow-lg mt-3 bg-img">
        <div class="row">

            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Naissance</th>
                    </tr>
                </thead>
                <tbody> 
                <?php foreach ($listpatients as $patient) { ?>
                <?php 
                    $formatDate = date('d/m/Y',strtotime($patient->birthdate));
                ?>

                    <tr class="text-center align">
                        <th scope="row" class="fw-lighter"><?=$patient->lastname?></th>
                        <td class="fw-lighter"><?=$patient->firstname?> </td>
                        <td class="fw-lighter"><?=$formatDate?> </td>
                        <td class="fs-5"><a href="/controllers/profil-patientCtrl.php?id=<?=$patient->id?>">&#128065;&#8205;&#128488;</button></a></td>
                        <td class="fs-5 btn"><a href="/controllers/deletePatientCrtl.php?id=<?=$patient->id?>">&#10060;</a></td>
                    </tr>

                    

                <?php } ?>
                </tbody>
                </table>
                
            <div class="row justify-content-between">
                <div class="col-lg-6 mb-3 text-center">
                    <a href="/controllers/welcomeCtrl.php"><button type="button" class="btn btn-primary">retouner à
                            l'accueil</button></a>
                </div>
                <div class="col-lg-6 mb-3 text-center">
                    <a href="/controllers/add-patientCtrl.php"><button type="button"
                            class="btn btn-primary">&#10133;</button></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <ul class="pagination">
            <li class="icon">
            <a href="#"><span class="fas fa-angle-left"></span>Previous</a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">6</a></li>
            <li><a href="#">7</a></li>
            <li><a href="#">8</a></li>
            <li><a href="#">9</a></li>
            <li><a href="#">10</a></li>
            <li class="icon">
            <a href="#">Next<span class="fas fa-angle-right"></span></a>
            </li>
        </ul>
    </div>
</main>