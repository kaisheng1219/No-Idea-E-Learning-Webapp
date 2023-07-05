<?php require_once "header.php" ?>
    <main>
        <?php
            if (isset($_GET['success'])) {
                echo '<script> alert("Successfully registered.");';
                echo 'window.location.replace("courses.php?button=courses");';
                echo '</script>';
            }
        ?>
        <section id="courses-search-section">
            <div class="label">
                <span class="material-icons">book</span>
                <p>Courses</p>
            </div>
            <form method="post" action="">
                <div class="top">
                    <div class="search-container">
                        <button type="submit" name="search" class="search-icon"><span class="material-icons">search</span></button>
                        <input name="input" type="search" class="search-input" placeholder="Search courses you interested in..." required>
                    </div>
                    <a href="courses.php?button=courses" class="search-icon"><span class="material-icons">restart_alt</span></a>
                </div>
            </form>
            <div class="course-cards-container">
                <?php 
                    if (isset($_POST['search'])) {
                        $filteredCourses = getFilteredCoursesBySearchInput($connect, $_POST['input']);
                        if (mysqli_num_rows($filteredCourses) <= 0)
                            echo "<p>No courses found.</p>";
                        else
                            populateRegistrationCoursesSection($connect, $filteredCourses, $registeredCourses);
                    } else {
                        populateRegistrationCoursesSection($connect, $courses, $registeredCourses);
                    }
                ?>
            </div>
        </section>
    </main>
</body>
</html>