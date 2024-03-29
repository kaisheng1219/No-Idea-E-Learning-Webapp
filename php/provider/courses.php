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
                <div class="button-container">
                    <a href="course_add.php?button=courses">add course</a>
                </div>
                <table>
                    <colgroup>
                        <col style="width: 22%;">
                        <col style="width: 22%;">
                        <col style="width: 20%;">
                        <col style="width: 13%;">
                        <col style="width: 13%;">
                        <col style="width: 10%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Instructors</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php populateCoursesTable($connect, $courses, true); ?>

                        <tr>    
                            <td colspan="6" class="add-button">
                                <a href="course_add.php?button=courses">
                                    <i class="fa fa-add"></i>
                                </a>
                            </td>
                        </tr> 
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>