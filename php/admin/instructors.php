<?php require_once "header.php" ?>
    <main>
    <?php 
        if (isset($_GET['del'])) {
            $instructorId = $_GET['instructorId'];
            $sql = "DELETE FROM instructor WHERE instructor_id = $instructorId;";
            $result = mysqli_query($connect, $sql);
            if (!$result) {
                header("location: instructors.php?button=instructors");
                exit();
            }
            header("location: instructors.php?button=instructors");
        }
    ?>
    <section id="instructors">
        <div class="label">
            <span class="material-icons">groups</span>
            <p>Instructors</p>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Provider</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php populateAdminInstructorsTable($instructors, true); ?>
                </tbody>
            </table>
        </div>
    </section>
    </main>
</body>
</html>