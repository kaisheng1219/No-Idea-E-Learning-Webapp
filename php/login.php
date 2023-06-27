<?php 
    require_once "includes/connection.inc.php";
?>

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
    <link rel="stylesheet" href="../css/loginPage.css"> 

    <script src="../js/login.js" type="text/javascript"></script>
</head>

<body>
    <?php require_once "header-landing.php"; ?>
    <main>
        <section class="form-container">
            <div class="form-title">
                <h1>Login</h1>
            </div>
            <div class="form-content">
                <form method="post" action="includes/login.inc.php">
                    <div class="input-container">
                        <input name="email" type="email" placeholder="Email" required>
                    </div>
                    <div class="input-container">
                        <input id="pwd" name="password" type="password" placeholder="Password" required>
                        <i class="fa-regular fa-eye-slash eye-icon"></i>
                    </div>
                    <?php
                        if(isset($_GET["error"]))
                            echo "<p>Credentials not found!</p>";
                    ?>  
                    <button type="submit" name="login">Login</button>

                    <div class="form-link">
                        <span>Don't have an account? <a href="register.php">Sign Up</a>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <?php require_once "footer.php"; ?>
</body>
</html>