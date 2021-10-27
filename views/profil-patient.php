<main class="container">
    <h1 class="text-center text-light border-bottom">PAGE PROFIL</h1>
    <div class="d-flex justify-content-center bg-light shadow-lg mt-5 bg-img">
        <div class="row">
                <?php 
                    $formatDate = date('d/m/Y',strtotime($profils->birthdate));
                ?>
            <div class="row text-center text-dark  justify-content-center align-items-center">
                <hr class="mt-3">
                <h3><?=$profils->lastname?> <?=$profils->firstname?></h3>
                <div class="col-12 col-lg-12 mt-1 d-flex flex-column">
                    <div><span class="tomato fw-lighter mt-2">Nom:</span><?=$profils->lastname?></div> 
                    <div><span class="tomato fw-lighter mt-2">Prénom:</span> <?=$profils->firstname?> </div> 
                    <div><span class="tomato fw-lighter mt-2">Date de naissance:</span> <?=$formatDate?> </div> 
                    <div><span class="tomato fw-lighter mt-2">Téléphone:</span> <?=$profils->phone?> </div> 
                    <div><span class="tomato fw-lighter mt-2">Adresse email:</span> <?=$profils->mail?></div> 
                </div>
                <hr class="mt-3">
            </div>
                
            <div class="row justify-content-center mt-3">
                <div class="col-lg-6 mb-3 text-center">
                    <a href="/controllers/list-patientsCtrl.php"><button type="button" class="btn btn-primary">retour</button></a>
                </div>
                <div class="col-lg-6 mb-3 text-center">
                    <a href="/controllers/modif-profilCtrl.php?id=<?=$profils->id?>"> <button type="button" class="btn btn-primary">modifier</button></a>
                </div>
            </div>
        </div>
    </div>
</main>