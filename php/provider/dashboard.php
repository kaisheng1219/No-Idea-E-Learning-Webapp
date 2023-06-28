<?php require_once "header.php" ?>
    <main>
        <section id="dashboard">
            <div class="label">
                <span class="material-icons">dashboard</span>
                <p>Dashboard</p>
            </div>
            <div class="content">
                <div class="first card fit-content">
                    <span class="material-icons">groups</span>
                    <p class="title">Total Instructors</p>
                    <p class="value">20000</p>
                </div>
                <div class="second card fit-content">
                    <span class="material-icons">book</span>
                    <p class="title">Total Courses</p>
                    <p class="value">100</p>
                </div>
            </div>
        </section>

        <section id="courses">
            <div class="label">
                <span class="material-icons">book</span>
                <p>Courses</p>
            </div>
            <div class="table-container">
                <div class="button-container">
                    <a href="">manage</a>
                </div>
                <table>
                    <colgroup>
                        <col style="width: 24%;">
                        <col style="width: 28%;">
                        <col style="width: 22%;">
                        <col style="width: 13%;">
                        <col style="width: 13%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Instructors</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td class="overflow">Theory of Computation</td>
                            <td class="overflow">A course about how to get rich. asasjsjsjsjsjd ajsdjasdj asjdaj asdj asj asd jasd jas j</td>
                            <td class="overflow">Peter Pan, De Broglie, Albert Einstein</td>
                            <td class="fit">07-06-2023</td>
                            <td class="fit">29-06-2023</td>
                        </tr>
                        <tr>
                            <td class="overflow">Software Engineering Fundamentals</td>
                            <td class="overflow">A course about how to get rich. asasjsjsjsjsjd ajsdjasdj asjdaj asdj asj asd jasd jas j</td>
                            <td class="overflow">Peter Pan, De Broglie, Albert Einstein</td>
                            <td class="fit">07-06-2023</td>
                            <td class="fit">29-06-2023</td>
                        </tr>
                        <tr>
                            <td class="overflow">The Power of Motivation</td>
                            <td class="overflow">A course about how to get rich. asasjsjsjsjsjd ajsdjasdj asjdaj asdj asj asd jasd jas j</td>
                            <td class="overflow">Peter Pan, De Broglie, Albert Einstein</td>
                            <td class="fit">07-06-2023</td>
                            <td class="fit">29-06-2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="instructors">
            <div class="label">
                <span class="material-icons">groups</span>
                <p>Instructors</p>
            </div>
            <div class="table-container">
                <div class="button-container">
                    <a href="">manage</a>
                </div>
                <table>
                    <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Total Course (Teaching)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="overflow">Emily Zying</td>
                          <td class="overflow">zincO2@gmail.com</td>
                          <td>20</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>