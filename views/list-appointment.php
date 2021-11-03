<main class="container">
    <h1 class="text-center text-light border-bottom">Liste des rendez-vous</h1>
    <div class="d-flex justify-content-center bg-light shadow-lg mt-5 bg-img">
        <div class="row">

            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody> 
                <?php foreach ($listappointment as $list) { ?>

                    <?php $dateFormat = strftime('%e %B %G à %Hh%M', strtotime($list->dateHour)); ?>

                    <tr class="text-center align">
                        <th scope="row" class="fw-lighter"><?=$list->idPatients?></th>
                        <td class="fw-lighter"> <?=$dateFormat?></td>
                    </tr>
                    

                <?php } ?>
                </tbody>
                </table>
                
            <div class="row justify-content-between">
                <div class="col-lg-7 mb-3 text-center">
                    <a href="/controllers/welcomeCtrl.php"><button type="button" class="btn btn-primary">retouner à l'accueil</button></a>
                </div>
                <div class="col-lg-5 mb-3 text-center">
                    <a href="/controllers/list-appointmentCtrl.php"><button type="button"
                            class="btn btn-primary">&#10133;</button></a>
                </div>
            </div>
        </div>
    </div>
</main>