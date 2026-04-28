class AlertService {
    static success(message) {
        return Swal.fire({
            icon: 'success',
            title: 'Success',
            text: message
        });
    }

    static error(message) {
        return Swal.fire({
            icon: 'error',
            title: 'Error',
            text: message
        });
    }

    static confirm(message, callback) {
        Swal.fire({
            title: 'Are you sure?',
            text: message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) callback();
        });
    }
}
