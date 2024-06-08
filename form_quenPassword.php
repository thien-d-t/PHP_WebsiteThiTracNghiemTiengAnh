<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="web site icon" href="306-3063098_png-file-reset-password-icon-white-clipart.jpg" type="jpg" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/form_sendPS.css" />
    <title>Forgot Password ?</title>
</head>

<body>
    <div class="container">
        <header>Send your password To Mail</header>
        <span class="feed">
            <i class="bx bxl-gmail"></i>
            <p id="feedBack">Ckeck your email box messages</p>
        </span>
        <form action="quenPassword.php" autocomplete="off" id="resetPassword" method="post">
            <div class="field email-field">
                <div class="input-field">
                    <input type="text" placeholder="Tên đăng nhập" class="email" name="user" />
                </div>
                <span class="error email-error">
                    <i class="bx bx-error-circle error-icon"></i>
                    <p class="error-text">Please enter a valid email</p>
                </span>
            </div>
            <div class="input-field button">
                <input type="submit" value="Send email" class="btn" />
            </div>
        </form>
    </div>
    <script src="script.js"></script>
    <script>
        const form = document.querySelector("form"),
            emailField = form.querySelector(".email-field"),
            emailInput = emailField.querySelector(".email"),
            feedbackField = document.querySelector(".feed"),
            btn = document.querySelector(".btn");

        function checkEmail() {
            const emaiPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (!emailInput.value.match(emaiPattern) || emailInput.value === "") {
                return emailField.classList.add("invalid");
            }
            emailField.classList.remove("invalid");
        }

        form.addEventListener("submit", (e) => {
            e.preventDefault();
            checkEmail();
            emailInput.addEventListener("keyup", checkEmail);
            if (!emailField.classList.contains("invalid") || checkEmail()) {
                feedbackField.style.display = "flex";
                emailInput.value = "";
            }
        });
    </script>
</body>

</html>