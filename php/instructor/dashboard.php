<?php require_once "header.php" ?>
    <main>
        <section id="dashboard">
            <div class="label">
                <span class="material-icons">dashboard</span>
                <p>Dashboard</p>
            </div>
            <div class="content">
                <div class="first card fit-content">
                    <span class="material-icons">groups</span>
                    <p class="title">Total Courses</p>
                    <p class="value"><?= mysqli_num_rows($courses); ?></p>
                </div>
                <div class="second card fit-content">
                    <span class="material-icons">book</span>
                    <p class="title">Total Students</p>
                    <p class="value"><?= mysqli_num_rows($students); ?></p>
                </div>
            </div>
        </section>

        <section id="courses">
            <div class="label">
                <span class="material-icons">book</span>
                <p>Courses</p>
            </div>
            <div class="table-container">
                <div class="button-container">
                    <a href="courses.php?button=courses">manage</a>
                </div>
                <table>
                    <colgroup>
                        <col style="width: 20%;">
                        <col style="width: 28%;">
                        <col style="width: 22%;">
                        <col style="width: 13%;">
                        <col style="width: 17%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php populateInstructorCoursesTable($connect, $courses, false); ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="students">
            <div class="label">
                <span class="material-icons">groups</span>
                <p>Students</p>
            </div>
            <div class="table-container">
                <div class="button-container">
                    <a href="students.php?button=students">manage</a>
                </div>
                <table>
                    <thead>
                        <tr>
                          <th>Name</th>
                          <th>Age</th>
                          <th>Email</th>
                          <th>Course Taken</th>
                        </tr>
                      </thead>
                      <tbody>

                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>