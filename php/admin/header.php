<?php
    require_once '../includes/connection.inc.php';
    require_once '../includes/functions.inc.php';
    session_start();
    
    $providers = getAllProviders($connect); // all providers info and user info
    $courses = getAllCourses($connect); // all courses info and provider info
    $instructors = getAllInstructors($connect); // all instructors and their company
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
    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="../../css/dashboard_shared.css">  
    <link rel="stylesheet" href="../../css/provider.css">

    <script src="../../js/script.js" type="text/javascript"></script>
</head>

<body>
    <header class="sidebar">
        <nav>
            <div id="logo">
                <a href="dashboard.php">
                    <img src="../../images/logo small.png">
                </a> 
            </div>
            <ul>
                <li id="dashboard">
                    <a href="dashboard.php?button=dashboard">Dashboard</a>
                </li>
                <li id="providers">
                    <a href="providers.php?button=providers">Providers</a>
                </li>
                <li id="courses">
                    <a href="courses.php?button=courses">Courses</a>
                </li>
                <li id="instructors">
                    <a href="instructors.php?button=instructors">Instructors</a>
                </li>
                <li>
                    <a href="../includes/logout.inc.php">Logout</a>
                </li>
            </ul>            
        </nav>
        <?php
            if (isset($_GET["button"])) {
                $button = $_GET["button"];
            }
        ?>
        <script> toggleButtonOn(<?php echo json_encode($button); ?>); </script>    
    </header>