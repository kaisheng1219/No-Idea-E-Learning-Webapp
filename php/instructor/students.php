<?php require_once "header.php" ?>
    <main>
        <section id="students">
            <div class="label">
                <span class="material-icons">groups</span>
                <p>Students</p>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                          <th>Name</th>
                          <th>Age</th>
                          <th>Course Taken</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php populateInstructorStudentsTable($connect, $students); ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>