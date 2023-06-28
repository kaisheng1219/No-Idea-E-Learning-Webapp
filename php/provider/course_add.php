<?php require_once "header.php" ?>
    <main class="shrink">
        <section class="return-section">
            <a id="return-button" href="courses.php?button=courses">Return</a> 
        </section>

        <section id="course-add" class="form-container">
            <div class="form-title">
                <h1>Add Course</h1>
            </div>
            <form method="post" action="../includes/course_add.inc.php">
                <div class="form-content">
                    <label>Title</label>
                    <input name="title" type="text" placeholder="Enter a title" required>

                    <label>Description</label>
                    <textarea name="description" type="text" placeholder="Enter a description" required></textarea>

                    <label>Start Date</label>
                    <input name="start_date" type="date" required>

                    <label>End Date</label>
                    <input name="end_date" type="date" required>

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
                            <tr>
                                <td class="overflow">Emily Zying</td>
                                <td class="overflow">zincO2@gmail.com</td>
                                <td><input type="checkbox" name="instructor_id[]"></td>
                            </tr>
                            <tr>
                                <td class="overflow">Emily Zying</td>
                                <td class="overflow">zincO2@gmail.com</td>
                                <td><input type="checkbox" name="instructor_id[]"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                    if (isset($_GET["error"]))
                        echo "<p>".$_GET['error']."<p>";
                ?>
                <div>
                    <a id="cancel-button" href="courses.php?button=courses">Cancel</a>
                    <button type="submit" name="submit">Add</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>