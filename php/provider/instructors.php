<?php require_once "header.php" ?>
    <main>
    <section id="instructors">
        <div class="label">
            <span class="material-icons">groups</span>
            <p>Instructors</p>
        </div>
        <div class="table-container">
            <div class="button-container">
                <a href="instructor_add.php?button=instructors">add instructor</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Total Course (Teaching)</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="overflow">Emily Zying</td>
                        <td class="overflow">zincO2@gmail.com</td>
                        <td>20</td>
                        <td>
                            <div class="actions">
                                <a href="course_edit.php?courseId=">
                                    <i class="fa fa-pen-to-square"></i>
                                </a>
                                <a href="courses.php?del&courseId=">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="add-button">
                            <a href="instructor_add.php?button=instructors">
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