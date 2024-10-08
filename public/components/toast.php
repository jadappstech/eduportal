<?php
function show_bootstrap_toast($message, $type = 'success', $delay = 3000) {
    $toast_html = '
        <div class="toast align-items-center bg-'.$type.' text-white border-0" role="alert" aria-live="assertive" aria-atomic="true" data-delay="'.$delay.'" style="position: absolute; top: 20px; right: 20px; z-index: 9999">
            <div class="d-flex xpr-4">
                <div class="toast-body">
                    ' . $message . '
                </div>
                <!--<button type="submit" class="close" id="close_communication_alert" data-bs-dismiss="toast">
                    <span aria-hidden="true">&times;</span>
                </button>-->
            </div>
        </div>
    ';

    // Add JavaScript initialization using a script tag within the HTML
    $toast_html .= '
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
        const toastEl = document.querySelector(".toast");
        const toast = new bootstrap.Toast(toastEl);
        toast.show();
        setTimeout(() => {
            toast.hide();
        }, ' . $delay . ');
    </script>';

    return $toast_html;
}



// usage samples
// if (isset($_SESSION['toast-msg'])) {
//     echo show_bootstrap_toast($_SESSION['toast-msg']);
//     unset($_SESSION['toast-msg']);
// }


// if (isset($_SESSION['toast-msg'])) {
//     echo show_bootstrap_toast($_SESSION['toast-msg'], 'warning');
//     unset($_SESSION['toast-msg']);
// }

// if (isset($_SESSION['toast-msg'])) {
//     echo show_bootstrap_toast($_SESSION['toast-msg'], 'danger');
//     unset($_SESSION['toast-msg']);
// }
?>