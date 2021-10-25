<main>
    <div class="container d-flex justify-content-center flex-column bg-light shadow-lg mt-5 bg-img">
        <div class="row flex-column align-items-center">
            
            <?php foreach ($patient as $patient) { ?>

                <?php 
                    $formatDate = date('d/m/Y',strtotime($patient->birthDate));
                ?>

            <div class="row text-center flex-column">
                <div class="col-12 col-lg-6 mt-3">
                    <span class="text-info fw-bold">Nom:</span> <?=$patient->lastName?>
                </div>
                <div class="col-12 col-lg-6">
                    <span class="text-info fw-bold">Prénom:</span> <?=$patient->firstName?>
                </div>
                <div class="col-12 col-lg-12">
                    <span class="text-info fw-bold">Date de naissance:</span> <?=$formatDate?>
                </div>
                <div class="col-12 col-lg-6">
                    <span class="text-info fw-bold">Adresse email:</span> <?=$patient->mail?>
                </div>
                <div class="col-12 col-lg-6">
                    <span class="text-info fw-bold">Téléphone:</span> <?=$patient->phone?>
                </div>
            </div>
            <hr>

            <?php } ?>
        </div>
    </div>