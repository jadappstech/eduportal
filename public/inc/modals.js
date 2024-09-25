 //Warning Message
 $('#sa-warning').click(function () {

    Swal.fire({
        title: "Are you sure you want to sign out?",
        // text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, sign out!"
    }).then(function (result) {

        if (result.value) {
            window.location.replace("./logout.php");
        }
    });
});
 //delete Message
 $('#sa-delete').click(function () {

    Swal.fire({
        title: "Are you sure you want to delete this item?",
        // text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete!"
    }).then(function (result) {

        if (result.value) {
            window.location.replace("/inc/delete-school-fees-item-api.php");
        }
    });
});
//Success Message
$('#sa-success').click(function () {
    Swal.fire(
        {
            title: 'Success!',
            text: 'Profile update successful!',
            type: 'success'
        }
    )
});