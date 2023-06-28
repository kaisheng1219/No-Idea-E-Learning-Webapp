<?php require_once "header.php" ?>
    <main>
        <section>
            <div class="label">
                <span class="material-icons">person</span>
                <p>User</p>
            </div>
            <form method="post" action="../includes/profile_edit.inc.php" class="gap-top">
                <div class="form-content center-form">
                    <label>Name</label>
                    <input name="name" type="text" value="Google" readonly disabled>

                    <label>Email</label>
                    <input name="email" type="email" value="google@gmail.com" readonly disabled></input>
                </div>
            </form>
        </section>
    </main>
</body>
</html>