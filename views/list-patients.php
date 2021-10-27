<main class="container">
    <h1 class="text-center text-light border-bottom">Liste des patients</h1>
    <div class="d-flex justify-content-center bg-light shadow-lg mt-5 bg-img">
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
                        <td class="fs-5 btn">&#10060;</td>
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
</main>