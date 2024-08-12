<?php

session_start();

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/db.php";

$sql = "SELECT * FROM users
        WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    die("token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("token has expired");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">


    <title>Online Applications Portal - Reset your password</title>

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">

    <style>
        #password-criteria p {
            margin: 0;
            font-size: 0.9em;
            color: red;
        }

        #password-criteria p.valid {
            color: green;
        }

        #password-criteria p.invalid {
            color: red;
        }
    </style>
</head>

<body class="sticky-header">
    <section class="bg-login">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="wrapper-page">
                        <div class="account-pages">
                            <div class="card m-b-30 mt-4">
                                <div class="card-body row">
                                    <div class="col-lg-6 col-sm-12">
                                        <img src="../Home/img1.png" class="layout-img" alt="RefuSHE Kenya">
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <?php if (isset($_SESSION['error'])): ?>
                                            <div class="alert alert-danger">
                                                <?= htmlspecialchars($_SESSION['error']) ?>
                                            </div>
                                            <?php unset($_SESSION['error']); ?>
                                        <?php endif; ?>

                                        <form method="post" action="process-reset-password.php">
                                            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

                                            <div class="form-group mt-5">
                                                <div class="input-group">
                                                    <input type="password" class="form-control" placeholder="Enter New Password" required="required" id="password" name="password" value="">
                                                </div>
                                                <span class="mt-1 field-valid field-validation-valid" data-valmsg-for="password" data-valmsg-replace="true"></span>
                                            </div>

                                            <div class="form-group mt-5">
                                                <div class="input-group">
                                                    <input type="password" class="form-control" placeholder="Confirm New Password" required="required" id="password_confirmation" name="password_confirmation" value="">
                                                </div>
                                                <span class="mt-1 field-valid field-validation-valid" data-valmsg-for="password_confirmation" data-valmsg-replace="true"></span>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12 mt-3 px-0">
                                                    <button class="btn btn-primary btn-block btn-rounded" type="submit">Reset</button>
                                                </div>
                                            </div>
                                            <div id="password-criteria">
                                                <p id="letter" class="invalid">At least one letter</p>
                                                <p id="length" class="invalid">At least eight characters</p>
                                                <p id="number" class="invalid">At least one number</p>
                                                <p id="match" class="invalid">Passwords match</p>
                                            </div>
                                        </form>
                                        <?php if (isset($_SESSION['success'])): ?>
                                            <div class="alert alert-success">
                                                <?= htmlspecialchars($_SESSION['success']) ?>
                                            </div>
                                            <?php unset($_SESSION['success']); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const passwordInput = document.getElementById("password");
        const confirmPasswordInput = document.getElementById("password_confirmation");

        const letter = document.getElementById("letter");
        const length = document.getElementById("length");
        const number = document.getElementById("number");
        const match = document.getElementById("match");

        function validatePassword() {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;

            // Check for at least one letter
            if (/[a-z]/i.test(password)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }

            // Check for at least eight characters
            if (password.length >= 8) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
            }

            // Check for at least one number
            if (/[0-9]/.test(password)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }

            // Check if passwords match
            if (password === confirmPassword && password !== "") {
                match.classList.remove("invalid");
                match.classList.add("valid");
            } else {
                match.classList.remove("valid");
                match.classList.add("invalid");
            }
        }

        // Add event listeners
        passwordInput.addEventListener("input", validatePassword);
        confirmPasswordInput.addEventListener("input", validatePassword);
    </script>
</body>
</html>
