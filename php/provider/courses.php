<?php require_once "header.php" ?>
    <main>
        <section id="courses">
            <div class="label">
                <span class="material-icons">book</span>
                <p>Courses</p>
            </div>
            <div class="table-container">
                <div class="button-container">
                    <a href="course_add.php?button=courses">add course</a>
                </div>
                <table>
                    <colgroup>
                        <col style="width: 22%;">
                        <col style="width: 22%;">
                        <col style="width: 20%;">
                        <col style="width: 13%;">
                        <col style="width: 13%;">
                        <col style="width: 10%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Instructors</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="overflow">Theory of Computation</td>
                            <td class="overflow">A course about how to get rich. asasjsjsjsjsjd ajsdjasdj asjdaj asdj asj asd jasd jas j</td>
                            <td class="overflow">Peter Pan, De Broglie, Albert Einstein</td>
                            <td class="fit">07-06-2023</td>
                            <td class="fit">29-06-2023</td>
                            <td>
                                <div class="actions">
                                    <a href="course_edit.php?courseId=">
                                        <i class="fa fa-pen-to-square"></i>
                                    </a>
                                    <a href="courses.php?del&courseId=">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="overflow">Software Engineering Fundamentals</td>
                            <td class="overflow">A course about how to get rich. asasjsjsjsjsjd ajsdjasdj asjdaj asdj asj asd jasd jas j</td>
                            <td class="overflow">Peter Pan, De Broglie, Albert Einstein</td>
                            <td class="fit">07-06-2023</td>
                            <td class="fit">29-06-2023</td>
                            <td>
                                <div class="actions">
                                    <a href="course_edit.php?courseId=">
                                        <i class="fa fa-pen-to-square"></i>
                                    </a>
                                    <a href="courses.php?del&courseId=">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="overflow">The Power of Motivation</td>
                            <td class="overflow">A course about how to get rich. asasjsjsjsjsjd ajsdjasdj asjdaj asdj asj asd jasd jas j</td>
                            <td class="overflow">Peter Pan, De Broglie, Albert Einstein</td>
                            <td class="fit">07-06-2023</td>
                            <td class="fit">29-06-2023</td>
                            <td>
                                <div class="actions">
                                    <a href="course_edit.php?courseId=">
                                        <i class="fa fa-pen-to-square"></i>
                                    </a>
                                    <a href="courses.php?del&courseId=" onclick="return confirmation();">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" class="add-button">
                                <a href="course_add.php?button=courses">
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