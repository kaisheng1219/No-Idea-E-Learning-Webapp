<?php require_once "header.php" ?>
    <main>
        <?php 
            if (isset($_GET['xmark'])) {
                $courseId = $_GET['courseId'];
                $instructorId = $instructor['instructor_id'];
                $sql = "UPDATE `instructor_course` SET `availability`=FALSE WHERE `instructor_id`=$instructorId AND `course_id`=$courseId;";
                $result = mysqli_query($connect, $sql);
                if (!$result) {
                    header("location: courses.php?button=courses");
                    exit();
                }
                header("location: courses.php?button=courses");
            } else if (isset($_GET['tick'])) {
                $courseId = $_GET['courseId'];
                $instructorId = $instructor['instructor_id'];
                $sql = "UPDATE `instructor_course` SET `availability`=TRUE WHERE `instructor_id`=$instructorId AND `course_id`=$courseId;";
                $result = mysqli_query($connect, $sql);
                if (!$result) {
                    header("location: courses.php?button=courses");
                    exit();
                }
                header("location: courses.php?button=courses");
            }
        ?>
        <section id="courses">
            <div class="label">
                <span class="material-icons">book</span>
                <p>Courses</p>
            </div>
            <div class="table-container">
                <table>
                    <colgroup>
                        <col style="width: 24%;">
                        <col style="width: 27%;">
                        <col style="width: 13%;">
                        <col style="width: 13%;">
                        <col style="width: 13%;">
                        <col style="width: 10%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Availability</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php populateInstructorCoursesTable($connect, $courses, true); ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>