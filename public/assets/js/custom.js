function showMessage(message, type="info") {
    switch(type) {
        case 'info':
            toastr.info(message);
            break;

        case 'warning':
            toastr.warning(message);
            break;

        case 'success':
            toastr.success(message);
            break;

        case 'error':
            toastr.error(message);
            break;
    }
}

function  checkDelete() {
    var ans = confirm('Confirma a exclusão do anúncio ??');
    if(ans){
        return true;
    }else{
        return false;
    }
}