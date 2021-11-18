<main class="container">
    <div>
        <h1 class="text-center text-light border-bottom">
            Modification du rendez-vous de 
            <div>
            <a class="bg-light shadow-sm" href="/controllers/profil-patientCtrl.php?id=<?=$profile->id?>"><?=$profile->lastname?> <?=$profile->firstname?></a>
            </div>
        </h1>
    </div>
    <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>?id=<?=$meet->idPatients?>" method="post">
        <div class="container d-flex justify-content-center flex-column bg-light shadow-lg mt-2 bg-img">
            <div class="row flex-column align-items-center">

                <div class="col-lg-6 mt-3">
                    <label for="date" class="form-label">Date :</label>
                    <input name="date" type="date" class="form-control text-muted" value="<?=htmlentities($date)?>" 
                    id="date" aria-describedby="date" required>
                    <p class="text-danger"><?=$error['date'] ?? NULL?></p>
                </div>

                <div class="col-lg-6">
                <label for="hour" class="form-label">Choisir une heure:</label>

                <select class="form-control text-muted" name="hour" id="hour">
                    <option class="text-muted" value="">Choisir -></option>
                    <option class="text-muted" value="10:00">10H00</option>
                    <option class="text-muted" value="10:30">10H30</option>
                    <option class="text-muted" value="11:00">11h00</option>
                    <option class="text-muted" value="11:30">11h30</option>
                    <option class="text-muted" value="13:00">13h00</option>
                    <option class="text-muted" value="13:30">13h30</option>
                    <option class="text-muted" value="14:00">14h00</option>
                    <option class="text-muted" value="14:30">14h30</option>
                </select>
                <p class="text-danger"><?=$error['hour'] ?? NULL?></p>
                </div>


                <div class="row justicy-content-between mt-3">

                    <div class="col-lg-6 mb-3 text-center">
                        <a href="/controllers/list-appointmentCtrl.php"><button type="button" class="btn btn-primary">retouner à la liste</button></a>
                    </div>

                    <div class="col-lg-6 mb-3 text-center">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
            
                </div>
            </div>
        </div>
    </form>
</main>