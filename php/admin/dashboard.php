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
                    <p class="title">Total Providers</p>
                    <p class="value"><?= mysqli_num_rows($providers); ?></p>
                </div>
                <div class="first card fit-content">
                    <span class="material-icons">groups</span>
                    <p class="title">Total Instructors</p>
                    <p class="value"><?= mysqli_num_rows($instructors); ?></p>
                </div>
            </div>
        </section>

        <section id="providers">
            <div class="label">
                <span class="material-icons">groups</span>
                <p>Providers</p>
            </div>
            <div class="table-container">
                <div class="button-container">
                    <a href="providers.php?button=providers">manage</a>
                </div>
                <table>
                    <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php populateProvidersTable($providers, false); ?>
                    </tbody>
                </table>
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
                        <col style="width: 28%;">
                        <col style="width: 28%;">
                        <col style="width: 13%;">
                        <col style="width: 13%;">
                        <col style="width: 18%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Provider</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php populateAdminCoursesTable($courses, false); ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="instructors">
            <div class="label">
                <span class="material-icons">groups</span>
                <p>Instructors</p>
            </div>
            <div class="table-container">
                <div class="button-container">
                    <a href="instructors.php?button=instructors">manage</a>
                </div>
                <table>
                    <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Provider</th>
                        </tr>
                    </thead>
                        <tbody>
                            <?php populateAdminInstructorsTable($instructors, false); ?>
                        </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>