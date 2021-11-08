var patient_id;
var myModalEl = document.getElementById('modalDelete');
var confirmation = document.getElementById('confirm')



myModalEl.addEventListener('show.bs.modal', function (event) {
    patient_id = event.relatedTarget.dataset.id;
    console.log(patient_id);
})


confirmation.addEventListener('click', function (){
    document.location.href = '/controllers/deleteCtrl.php?id='+patient_id;

})