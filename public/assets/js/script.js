var appointment_id;
var myModalEl = document.getElementById('modalDelete');
var confirmation = document.getElementById('confirm')



myModalEl.addEventListener('show.bs.modal', function (event) {
    appointment_id = event.relatedTarget.dataset.id;
})


confirmation.addEventListener('click', function (){
    document.location.href = '/controllers/deleteCtrl.php?id='+appointment_id;
})
