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
                        <?php populateInstructorsTable($connect, $instructors, true, false); ?>
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