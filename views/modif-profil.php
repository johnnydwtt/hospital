<main class="container">
    <div>
        <h1 class="text-center text-light border-bottom">Modification du profil</h1>
    </div>
    <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>?id=<?=$profils->id?>" method="post">
        <div class="container d-flex justify-content-center flex-column bg-light shadow-lg mt-2 bg-img">
            <div class="row flex-column align-items-center">
                <div class="col-lg-6 mb-3 mt-3">
                    <label for="lastname" class="form-label">Nom :</label>
                    <input placeholder="lastname" name="lastname" type="text" class="form-control text-muted" value="<?=htmlentities($profils->lastname ?? '')?>" 
                    pattern="<?=STRING_REGEX?>" id="lastname" aria-describedby="lastname" required>
                    <p class="text-danger"><?=$error['lastname'] ?? NULL?></p>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="firstname" class="form-label">Prénom :</label>
                    <input placeholder="firstname" name="firstname" type="text" class="form-control text-muted" value="<?=htmlentities($profils->firstname ?? '')?>" 
                    pattern="<?=STRING_REGEX?>" id="firstname" aria-describedby="firstname" required>
                    <p class="text-danger"><?=$error['firstname'] ?? NULL?></p>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="birthdate" class="form-label">Naissance :</label>
                    <input name="birthdate" type="date" class="form-control text-muted" value="<?=htmlentities($profils->birthdate ?? '')?>" 
                    id="birthdate" aria-describedby="birthdate" required>
                    <p class="text-danger"><?=$error['birthdate'] ?? NULL?></p>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="phone" class="form-label">Téléphone :</label>
                    <input placeholder="phone" name="phone" type="tel" class="form-control text-muted" value="<?=htmlentities($profils->phone ?? '')?>" 
                    pattern="<?=PHONE_REGEX?>" id="phone" aria-describedby="phone" required>
                    <p class="text-danger"><?=$error['phone'] ?? NULL?></p>
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="mail" class="form-label">E-mail :</label>
                    <input placeholder="mail" name="mail" type="mail" class="form-control text-muted" value="<?=htmlentities($profils->mail ?? '')?>" 
                    id="mail" aria-describedby="mail" required>
                    <p class="text-danger"><?=$error['mail'] ?? NULL?></p>
                </div>  

                <div class="row justicy-content-between mt-3">

                    <div class="col-lg-6 mb-3 text-center">
                        <a href="/controllers/list-patientsCtrl.php"><button type="button" class="btn btn-primary">Retourner à la Liste</button></a>
                    </div>

                    <div class="col-lg-6 mb-3 text-center">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
            
                </div>
            </div>
        </div>
    </form>
</main>