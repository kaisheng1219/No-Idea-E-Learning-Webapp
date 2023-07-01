<?php require_once "header.php" ?>
<main class="shrink">
        <section class="return-section">
            <a id="return-button" href="courses.php?button=courses">Return</a> 
        </section>

        <section id="course-edit" class="form-container">
            <?php 
                session_start();
                $course = getCourseByCourseId($connect, $_GET['courseId']);
                $_SESSION['course_id'] = $_GET['courseId'];
            ?>
            <div class="form-title">
                <h1>Edit Course</h1>
            </div>
            <form method="post" action="../includes/course_edit.inc.php" onsubmit="return checkboxValidation();">
                <div class="form-content">
                    <label>Title</label>
                    <input name="title" type="text" value="<?= $course['course_title']; ?>" required>

                    <label>Description</label>
                    <textarea name="description" required><?= $course['course_description']; ?></textarea>

                    <label>Start Date</label>
                    <input name="start_date" type="date" value="<?= $course['course_start_date']; ?>" required>

                    <label>End Date</label>
                    <input name="end_date" type="date" value="<?= $course['course_end_date']; ?>" required>

                    <label>Instructors</label>
                    <table class="dark-border-thick">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Select</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php populateInstructorsTableByCourseId($connect, $instructors, $_GET['courseId']); ?>
                        </tbody>
                    </table>
                </div>
                <?php
                    if (isset($_GET["error"]))
                        echo "<p class='red'>". $_GET['error'] . "<p>";
                    else if (isset($_GET["success"]))
                        echo "<p class='green'>Updated successfully<p>";
                ?>
                <div>
                    <a id="cancel-button" href="courses.php?button=courses">Cancel</a>
                    <button type="submit" name="update">Update</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>