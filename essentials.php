<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbs5rBQe7i7uCA2ek3IjYqMOSh5P2n/RV+jqk9Je8fZcFAF5w5nEJX5DO2aFZ" crossorigin="anonymous">

<!-- Bootstrap JS bundle (including Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyWtg+Rx91eDkDShUnJKF1GIJ6lT0U6enw"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/common.css">

<style>
    .custom-alert {
        position: fixed;
        top: 25px;
        right: 25px;
    }
</style>
<?php
session_start();
function adminLogin()
{
    //session_start();
    if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
        echo "<script>
        window.location.href='index.php';
        </script>";
    }
    session_regenerate_id(true);

}

function redirect($url)
{
    echo "<script>
    window.location.href='$url';
    </script>";
}

function alert($type, $message)
{
    $bs_class = ($type == "success") ? "alert-success" : "alert-danger";
    echo <<<alert
    <div class="alert $bs_class alert-dismissible fade show" role="alert" style="position: fixed; top: 70px; right: 25px; z-index: 9999;" id="myAlert">
    <strong class="me-3">$message</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    alert;
}

if (isset($_SESSION['successMessage'])) {
    echo '<div class="alert" style="background-color: #00CC66;"> 
    <span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</span>'.
    "Success! " . $_SESSION['successMessage'] .
        '</div>';
    unset($_SESSION['successMessage']); // Clear the session variable
}

if (isset($_SESSION['errorMessage'])) {
    echo '<div class="alert alert-danger alert-dismissible fade show custom-alert" role="alert" style="position: fixed;top: 70px; right: 25px; z-index: 9999;" id="myAlert">' .
        $_SESSION['errorMessage'] .
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' .
        '</div>';
    unset($_SESSION['errorMessage']); // Clear the session variable
}
?>
<script>
// Get all elements with class="closebtn"
var close = document.getElementsByClassName("closebtn");
var i;

// Loop through all close buttons
for (i = 0; i < close.length; i++) {
  // When someone clicks on a close button
  close[i].onclick = function(){

    // Get the parent of <span class="closebtn"> (<div class="alert">)
    var div = this.parentElement;

    // Set the opacity of div to 0 (transparent)
    div.style.opacity = "0";

    // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
    setTimeout(function(){ div.style.display = "none"; }, 10);
  }
}
</script>