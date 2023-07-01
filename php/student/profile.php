<?php require_once "header.php" ?>
    <main>
        <section>
            <div class="label">
                <span class="material-icons">person</span>
                <p>Profile</p>
            </div>
            <form method="post" action="../includes/profile_edit.inc.php" class="gap-top">
                <div class="form-content center-form">
                    <label>Name</label>
                    <input name="name" type="text" value="<?= $student['student_name']; ?>" readonly disabled>

                    <label>Age</label>
                    <input name="name" type="text" value="<?= $student['student_age']; ?>" readonly disabled>

                    <label>Email</label>
                    <input name="email" type="email" value="<?= $_SESSION['user_email']; ?>" readonly disabled></input>

                    <label>Type</label>
                    <input name="type" type="text" value="<?= $_SESSION['user_role']; ?>" readonly disabled>
                </div>
            </form>
        </section>
    </main>
</body>
</html>