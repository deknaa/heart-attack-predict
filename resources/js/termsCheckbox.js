
document.addEventListener("DOMContentLoaded", function () {
    const termsCheckbox = document.getElementById('terms');
    const acceptButton = document.getElementById('btnAcceptTerms');
    const declineButton = document.getElementById('btnDeclineTerms');

    termsCheckbox.addEventListener('click', function () {
        if (termsCheckbox.checked) {
            termsCheckbox.checked = false;
        } else {
            termsCheckbox.checked = true;
        }
    })

    acceptButton.addEventListener('click', function () {
        termsCheckbox.checked = true;
    });

    declineButton.addEventListener('click', function () {
        termsCheckbox.checked = false;
    })
});