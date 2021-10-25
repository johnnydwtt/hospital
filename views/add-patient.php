<main class="container">
    <div>
        <h1 class="text-center text-light border-bottom">Création nouveau patient</h1>
    </div>
    <form action="" method="post">
        <div class="container d-flex justify-content-center flex-column bg-light shadow-lg mt-2 bg-img">
            <div class="row flex-column align-items-center">
                <div class="col-lg-6 mb-3 mt-3">
                    <label for="lastname" class="form-label">Nom :</label>
                    <input type="text" class="form-control" value="<?=htmlentities($lastname ?? '')?>" pattern="<?=STRING_REGEX?>" id="lastname" aria-describedby="lastname">
                    <p class="text-danger"><?=$error['lastname'] ?? NULL?></p>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="firstname" class="form-label">Prénom :</label>
                    <input type="text" class="form-control" value="<?=htmlentities($firstname ?? '')?>" pattern="<?=STRING_REGEX?>" id="firstname" aria-describedby="firstname">
                    <p class="text-danger"><?=$error['firstname'] ?? NULL?></p>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="birthdate" class="form-label">Naissance :</label>
                    <input type="date" class="form-control" value="<?=htmlentities($birthdate ?? '')?>" pattern="<?=DATE_REGEX?>" id="birthdate" aria-describedby="birthdate">
                    <p class="text-danger"><?=$error['birthdate'] ?? NULL?></p>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="phone" class="form-label">Téléphone :</label>
                    <input type="text" class="form-control" value="<?=htmlentities($phone ?? '')?>" pattern="<?=PHONE_REGEX?>" id="phone" aria-describedby="phone">
                    <p class="text-danger"><?=$error['phone'] ?? NULL?></p>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="mail" class="form-label">E-mail :</label>
                    <input type="mail" class="form-control" value="<?=htmlentities($mail ?? '')?>" pattern="<?=MAIL_REGEX?>" id="mail" aria-describedby="mail">
                    <p class="text-danger"><?=$error['mail'] ?? NULL?></p>
                </div>  
                <div class="row justicy-content-between mt-3">

                    <div class="col-lg-6 mb-3 text-center">
                        <a href="/controllers/welcomeCtrl.php"><button type="button" class="btn btn-primary">retouner à l'accueil</button></a>
                    </div>

                    <div class="col-lg-6 mb-3 text-center">
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
            
                </div>
            </div>
        </div>
    </form>
</main>