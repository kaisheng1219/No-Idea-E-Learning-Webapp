<?php require_once "header.php" ?>
    <main class="shrink">
        <section class="return-section">
            <a id="return-button" href="instructors.php?button=instructors">Return</a> 
        </section>

        <section id="instructor-add" class="form-container">
            <div class="form-title">
                <h1>Add Instructor</h1>
            </div>
            <form method="post" action="../includes/instructor_add.inc.php">
                <div class="form-content">
                    <label>Name</label>
                    <input name="name" type="text" placeholder="Enter instructor's name" required>

                    <label>Email</label>
                    <input name="email" type="email" placeholder="Enter instructor's email" required></input>

                    <label>Password</label>
                    <input name="password" type="password" required>

                    <label>Confirm Password</label>
                    <input name="confirm_password" type="password" required>

                </div>
                <?php
                    if (isset($_GET["error"]))
                        echo "<p>".$_GET['error']."<p>";
                ?>
                <div>
                    <a id="cancel-button" href="instructors.php?button=instructors">Cancel</a>
                    <button type="submit" name="submit">Add</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>