<?php 
    require_once "includes/connection.inc.php"; 
    require_once "includes/functions.inc.php"; 
    $courses = getAllCourses($connect);
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
    <link rel="stylesheet" href="../css/index_shared.css"> 
    <link rel="stylesheet" href="../css/landing.css"> 
    <link rel="stylesheet" href="../css/course_card.css">     
</head>

<body>
    <?php require_once "header.php"; ?>
    <main>
        <section id="courses-section">
            <form  method="post" action="">
                <div class="top">
                    <h2>COURSES</h2>
                    <div class="search-container">
                        <button type="submit" name="search" class="search-icon"><span class="material-icons">search</span></button>
                        <input name="input" type="search" class="search-input" placeholder="Search courses you interested in...">
                    </div>
                    <a href="courses.php" class="search-icon"><span class="material-icons">restart_alt</span></a>
                </div>
            </form>
            <div class="course-cards-container">
                <?php 
                    if (isset($_POST['search'])) {
                        $filteredCourses = getFilteredCoursesBySearchInput($connect, $_POST['input']);
                        if (mysqli_num_rows($filteredCourses) <= 0)
                            echo "<p style='color: black;'>No courses found.</p>";
                        else
                            populateIndexCoursesSection($connect, $filteredCourses, false);
                    } else {
                        populateIndexCoursesSection($connect, $courses, false);
                    }
                ?>
            </div>
        </section>
        <div style="flex-grow:1"></div>
    </main>
    <?php require_once "footer.php"; ?>
</body>
</html>

