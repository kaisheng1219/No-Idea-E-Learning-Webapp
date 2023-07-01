<?php require_once "header.php" ?>
    <main>
        <section id="dashboard">
            <div class="label">
                <span class="material-icons">dashboard</span>
                <p>Dashboard</p>
            </div>
            <div class="content">
                <div class="second card fit-content">
                    <span class="material-icons">book</span>
                    <p class="title">Total Courses Completed</p>
                    <p class="value"><?= mysqli_num_rows($completedCourses); ?></p>
                </div>
                <div class="second card fit-content">
                    <span class="material-icons">book</span>
                    <p class="title">Total Registered Courses</p>
                    <p class="value"><?= mysqli_num_rows($registeredCourses); ?></p>
                </div>
                <div class="second card fit-content">
                    <span class="material-icons">book</span>
                    <p class="title">Total Ongoing Courses</p>
                    <p class="value"><?= mysqli_num_rows($ongoingCourses); ?></p>
                </div>
            </div>
        </section>

        <section id="completed-courses">
            <div class="label">
                <span class="material-icons">book</span>
                <p>Completed Courses</p>
            </div>
            <div class="course-cards-container">
                <?php populateCompletedCoursesSection($connect, $completedCourses); ?>

                <!-- <div class="course-card">
                    <h4 class="course-card-title">Interior Design Course</h4>
                    <p class="course-card-description">
                        Teaches the principles and techniques of creating functional and aesthetically pleasing indoor spaces, encompassing aspects such as spatial planning, color schemes, furniture selection, and lighting design.
                    </p>
                    <div class="details-container">
                        <div class="course-card-instructors">
                            <i class="fa-solid fa-user smaller"></i>
                            <ul class="instructors-list">
                                <li>Peter Pan</li>
                                <li>Albert Einstein</li>
                                <li>De Broglie</li>
                            </ul>
                        </div>
                        <div class="course-card-info">
                            <i class="fa-solid fa-calendar"></i>
                            <span class="course-card-details-date">12/06/2023 - 20/07/2023</span>
                            <span class="course-card-details-company">Google</span>
                        </div>
                    </div>
                </div>
                <div class="course-card">
                    <h4 class="course-card-title">Interior Design Course</h4>
                    <p class="course-card-description">
                        Teaches the principles and techniques of creating functional and aesthetically pleasing indoor spaces, encompassing aspects such as spatial planning, color schemes, furniture selection, and lighting design.
                    </p>
                    <div class="details-container">
                        <div class="course-card-instructors">
                            <i class="fa-solid fa-user smaller"></i>
                            <ul class="instructors-list">
                                <li>Peter Pan</li>
                                <li>Albert Einstein</li>
                                <li>De Broglie</li>
                            </ul>
                        </div>
                        <div class="course-card-info">
                            <i class="fa-solid fa-calendar"></i>
                            <span class="course-card-details-date">12/06/2023 - 20/07/2023</span>
                            <span class="course-card-details-company">Google</span>
                        </div>
                    </div>
                </div> -->
            </div>
        </section>

        <section id="ongoing-courses">
            <div class="label">
                <span class="material-icons">book</span>
                <p>Ongoing Courses</p>
            </div>
            <div class="course-cards-container">
                <?php populateOngoingCoursesSection($connect, $ongoingCourses); ?>
                <!-- <div class="course-card">
                    <div class="title-progress-container">
                        <h4 class="course-card-title">Interior Design Course</h4>
                        <span>98%</span>
                    </div>
                    <p class="course-card-description">
                        Teaches the principles and techniques of creating functional and aesthetically pleasing indoor spaces, encompassing aspects such as spatial planning, color schemes, furniture selection, and lighting design.
                    </p>
                    <div class="details-container">
                        <div class="course-card-instructors">
                            <i class="fa-solid fa-user smaller"></i>
                            <ul class="instructors-list">
                                <li>Peter Pan</li>
                                <li>Albert Einstein</li>
                                <li>De Broglie</li>
                            </ul>
                        </div>
                        <div class="course-card-info">
                            <i class="fa-solid fa-calendar"></i>
                            <span class="course-card-details-date">12/06/2023 - 20/07/2023</span>
                            <span class="course-card-details-company">Google</span>
                        </div>
                    </div>
                </div>
                <div class="course-card">
                    <div class="title-progress-container">
                        <h4 class="course-card-title">Interior Design Course</h4>
                        <span>98%</span>
                    </div>
                    <p class="course-card-description">
                        Teaches the principles and techniques of creating functional and aesthetically pleasing indoor spaces, encompassing aspects such as spatial planning, color schemes, furniture selection, and lighting design.
                    </p>
                    <div class="details-container">
                        <div class="course-card-instructors">
                            <i class="fa-solid fa-user smaller"></i>
                            <ul class="instructors-list">
                                <li>Peter Pan</li>
                                <li>Albert Einstein</li>
                                <li>De Broglie</li>
                            </ul>
                        </div>
                        <div class="course-card-info">
                            <i class="fa-solid fa-calendar"></i>
                            <span class="course-card-details-date">12/06/2023 - 20/07/2023</span>
                            <span class="course-card-details-company">Google</span>
                        </div>
                    </div>
                </div> -->
            </div>
        </section>
    </main>
</body>
</html>