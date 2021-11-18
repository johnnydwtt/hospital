<main>
    <div class="container">

    <h1 class="text-center text-light border-bottom">Liste des rendez-vous</h1>

    <div class="d-flex justify-content-center bg-light shadow-lg mt-5 bg-img">
        <div class="row">

            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Patient</th>
                        <th scope="col">Rendez-vous</th>
                    </tr>
                </thead>
                <tbody> 
                <?php foreach ($listappointment as $list) { ?>
                    

                    <?php $dateFormat = strftime('%e %B %G à %Hh%M', strtotime($list->dateHour)); ?>

                    <tr class="text-center">
                        <th scope="row" class="fw-lighter"><a class="bg-light shadow-sm" href="/controllers/profil-patientCtrl.php?id=<?=$list->id?>"><?=$list->lastname.' '.$list->firstname?></a></th>
                        <td class="fw-lighter"> <?=$dateFormat?></td>
                        <td><a href="/controllers/modif-appointmentCtrl.php?id=<?=$list->idPat?>"><img src="https://img.icons8.com/material-rounded/30/000000/edit-property.png"/></a></td>
                        <td class="fs-5"><button data-id="<?=$list->idApp?>" role="button" data-bs-toggle="modal" data-bs-target="#modalDelete"><img src="https://img.icons8.com/emoji/30/000000/cross-mark-emoji.png"/></button></td>
                    </tr>
                    

                <?php } ?>

                </tbody>
                </table>

                <!-- Modal -->
                <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDeleteName" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title">Supprimer</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                Êtes vous sûrs de vouloir surppimer le rendez-vous ?
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="button" id="confirm" class="btn btn-primary">Oui sûrs</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            <div class="row justify-content-between">
                <div class="col-lg-7 mb-3 text-center">
                    <a href="/controllers/welcomeCtrl.php"><button type="button" class="btn btn-primary">retouner à l'accueil</button></a>
                </div>
                <div class="col-lg-5 mb-3 text-center">
                    <a href="/controllers/create-appointmentCtrl.php"><button type="button"
                            class="btn btn-primary">&#10133;</button></a>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="container mb-5">
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