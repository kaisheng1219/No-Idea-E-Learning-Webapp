<?php require_once "header.php" ?>
    <main>
    <?php 
        if (isset($_GET['del'])) {
            $providerId = $_GET['providerId'];
            $sql = "DELETE FROM `provider` WHERE provider_id = $providerId;";
            $result = mysqli_query($connect, $sql);
            if (!$result) {
                header("location: providers.php?button=providers");
                exit();
            }
            header("location: providers.php?button=providers");
        }
    ?>
    <section id="providers">
        <div class="label">
            <span class="material-icons">groups</span>
            <p>Providers</p>
        </div>
        <div class="table-container">
            <div class="button-container">
                <a href="instructor_add.php?button=instructors">add provider</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php populateProvidersTable($providers, true); ?>
                    <tr>
                        <td colspan="3" class="add-button">
                            <a href="provider_add.php?button=providers">
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