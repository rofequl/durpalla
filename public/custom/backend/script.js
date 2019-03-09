$(document).ready(function() {
    $('#spNotApproveTable').DataTable();
});

$( function() {
    $( ".datepicker" ).datepicker();
});

$('#exampleModal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget) ;
    let recipient = button.data('whatever');
    let modal = $(this);
    modal.find('#ModalUserId').val(recipient);
});