showErrorModal = (message) => {
    var modal = $('#errorModal')
    modal.find('.modal-body p').text(message)
    $('#errorModal').modal('show')
}