<?php require_once "header.php" ?>
    <main>
        <?php 
            if (isset($_GET['del'])) {
                $courseId = $_GET['courseId'];
                $sql = "DELETE FROM course WHERE course_id = $courseId;";
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
                        <col style="width: 20%;">
                        <col style="width: 28%;">
                        <col style="width: 13%;">
                        <col style="width: 13%;">
                        <col style="width: 18%;">
                        <col style="width: 8%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Provider</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php populateAdminCoursesTable($courses, true); ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>