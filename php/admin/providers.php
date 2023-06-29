<?php require_once "header.php" ?>
    <main>
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
                    <tr>
                        <td class="overflow">Google</td>
                        <td class="overflow">google@gmail.com</td>
                        <td>
                            <div class="actions">
                                <a href="provider_edit.php?courseId=">
                                    <i class="fa fa-pen-to-square"></i>
                                </a>
                                <a href="providers.php?del&courseId=">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
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