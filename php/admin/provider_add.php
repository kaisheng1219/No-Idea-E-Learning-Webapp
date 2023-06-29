<?php require_once "header.php" ?>
    <main class="shrink">
        <section class="return-section">
            <a id="return-button" href="providers.php?button=providers">Return</a> 
        </section>

        <section id="provider-add" class="form-container">
            <div class="form-title">
                <h1>Add Provider</h1>
            </div>
            <form method="post" action="../includes/provider_add.inc.php">
                <div class="form-content">
                    <label>Name</label>
                    <input name="name" type="text" placeholder="Enter provider's name" required>

                    <label>Email</label>
                    <input name="email" type="email" placeholder="Enter provider's email" required></input>

                    <label>Password</label>
                    <input name="password" type="password" required>

                    <label>Confirm Password</label>
                    <input name="confirm_password" type="password" required>

                </div>
                <?php
                    if (isset($_GET["error"]))
                        echo "<p class='red'>".$_GET['error']."<p>";
                    else if (isset($_GET["success"]))
                        echo "<p class='green'>Account created<p>";
                ?>
                <div>
                    <a id="cancel-button" href="providers.php?button=providers">Cancel</a>
                    <button type="submit" name="add">Add</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>