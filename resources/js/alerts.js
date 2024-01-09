$(document).ready(function () {
    setTimeout(function () {
        showCustomPopup();
    }, 0);
});

function showCustomPopup() {
    $('#customPopup').modal('show');

    let progress = 0;
    const interval = setInterval(function () {
        progress += 1;
        $('.progress-bar').css('width', progress + '%').attr('aria-valuenow', progress);

        if (progress >= 100) {
            clearInterval(interval);
            setTimeout(function () {
                $('#customPopup').modal('hide');
            }, 500);
        }
    }, 10);
}

