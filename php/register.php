<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>No Idea</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@0;1&family=Outfit:wght@400;500;600;700;800;900&family=Space+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link rel="stylesheet" href="../css/reset.css"> 
    <link rel="stylesheet" href="../css/shared.css"> 
    <link rel="stylesheet" href="../css/registerPage.css"> 

    <script src="../js/script.js" type="text/javascript"></script>
</head>

<body>
    <?php require_once "header.php"; ?>
    <main>
        <section class="form-container">
            <div class="form-title">
                <h1>Sign Up</h1>
            </div>
            <div class="form-content">
                <form method="post" action="includes/register.inc.php">
                    <div class="input-container">
                        <input name="name" type="text" placeholder="Name" required>
                    </div>
                    <div class="input-container">
                        <input name="age" type="number" placeholder="Age" required>
                    </div>
                    <div class="input-container">
                        <input name="email" type="email" placeholder="Email" required>
                    </div>
                    <div class="input-container">
                        <input id="pwd" name="password" type="password" placeholder="Password" required>
                        <i class="fa-regular fa-eye-slash eye-icon"></i>
                    </div>
                    <div class="input-container">
                        <input id="cfmPwd" name="pwdRepeat" type="password" placeholder="Confirm Password" required>
                        <i class="fa-regular fa-eye-slash eye-icon"></i>
                    </div>
                    <?php
                        if (isset($_GET["error"]))
                            echo "<p>".$_GET['error']."<p>";
                    ?>
                    <button type="submit" name="submit">Sign Up</button>

                    <div class="form-link">
                        <span>Already have an account? <a href="login.php">Login</a>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <?php require_once "footer.php"; ?>
</body>
</html>