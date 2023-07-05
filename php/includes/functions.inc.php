<?php

// ------ login or sign up ------
function pwdMatch($pwd, $pwdRepeat) {
    return $pwd == $pwdRepeat ? true : false;
}

function userExist($connect, $email) {
    $sql = "SELECT * FROM user WHERE user_email = '$email';";
    $result = mysqli_query($connect, $sql);
    if ($row = mysqli_fetch_assoc($result))
        return $row;
    return  false;
}

function createUser($connect, $email, $pwd, $role) {
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $sql = "INSERT INTO user VALUES('0', '$email', '$hashedPwd', '$role');";
    $result = mysqli_query($connect, $sql);
    return mysqli_insert_id($connect);
}

function createAdmin($connect) {
    createUser($connect, "admin@noidea.tech.com", "admin123", "admin");
    header("location: ../register.php?success");
    exit();
}

function createStudent($connect, $name, $age, $email, $pwd) {
    $userId = createUser($connect, $email, $pwd, "student");
    $sql = "INSERT INTO `student` VALUES('0', '$name', '$age', '$userId');";
    $result = mysqli_query($connect, $sql);

    if (!$result) 
        checkHeader("student");
    else {
        header("location: ../register.php?success");
        exit();
    }
}

function loginUser($connect, $email, $pwd) {
    $userExist = userExist($connect, $email);
    if ($userExist === false) {
        header("location: ../login.php?error=userNotFound");
        exit();
    }
    
    $pwdHashed = $userExist["user_password"];
    $checkedPwd = password_verify($pwd, $pwdHashed);

    if (!$checkedPwd) {
        header("location: ../login.php?error=wrongPassword");
        exit();
    } else if ($checkedPwd) {
        session_start();
        $_SESSION["user_id"] = $userExist["user_id"];
        $_SESSION["user_email"] = $userExist["user_email"];
        $_SESSION["user_role"] = $userExist["user_role"];

        if ($userExist["user_role"] == "provider")
            header("location: ../provider/dashboard.php?button=dashboard");
        else if ($userExist["user_role"] == "instructor")
            header("location: ../instructor/dashboard.php?button=dashboard");
        else if ($userExist["user_role"] == "student")
            header("location: ../student/dashboard.php?button=dashboard");
        else if ($userExist["user_role"] == "admin")
            header("location: ../admin/dashboard.php?button=dashboard");

        exit();
    }
}

function addCourseInstructors($connect, $courseId, $instructorsId) {
    foreach ($instructorsId as $instructorId) {
        $sql = "INSERT INTO `instructor_course` VALUES ('$instructorId', '$courseId', FALSE)";
       $result = mysqli_query($connect, $sql);

        if (!$result) {
            header("location: ../provider/course_add.php?button=courses&error=unable to add course");
            exit();
        }
    }
    header("location: ../provider/course_add.php?button=courses&success");
    exit();
}

function addCourse($connect, $title, $description, $startDate, $endDate, $instructorsId) {
    session_start();
    $userId = $_SESSION["user_id"];
    $providerId = $_SESSION["provider_id"];
    $sql = "INSERT INTO course VALUES ('0', '$title', '$description', '$startDate', '$endDate', '$providerId');";
    $result = mysqli_query($connect, $sql) or die(mysqli_error($connect));

    if (!$result) {
        header("location: ../provider/course_add.php?button=courses&error=duplicating course");
        exit();
    } else {
        $courseId = mysqli_insert_id($connect);
        addCourseInstructors($connect, $courseId, $instructorsId);
    }
}

// ------ getters ------
function getRoleInfoFromUserId($connect, $userId, $role) {
    $sql = "SELECT * FROM `$role` WHERE user_id = '$userId';";
    $result = mysqli_query($connect, $sql);
    return mysqli_fetch_assoc($result);
}

function getCourseByCourseId($connect, $courseId) {
    $sql = "SELECT * FROM course WHERE course_id = '$courseId'";
    $result = mysqli_query($connect, $sql);
    return mysqli_fetch_assoc($result);
}

function getStudentsByInstructorId($connect, $instructorId) {
    $sql = "SELECT DISTINCT * FROM `student_course` JOIN instructor_course USING(course_id) JOIN course USING(course_id) JOIN student USING(student_id) WHERE instructor_id = $instructorId;";
    $result = mysqli_query($connect, $sql);
    return $result;
}

function getCoursesByProviderId($connect, $providerId) {
    $sql = "SELECT * FROM course WHERE provider_id = '$providerId';";
    $result = mysqli_query($connect, $sql);
    return $result;
}

function getCoursesByInstructorId($connect, $instructorId) {
    $sql = "SELECT * FROM instructor_course JOIN course USING(course_id) WHERE instructor_id = '$instructorId';";
    $result = mysqli_query($connect, $sql);
    return $result;
}

function getRegisteredCoursesByStudentId($connect, $studentId) {
    $sql = "SELECT * FROM student_course JOIN course USING(course_id) JOIN `provider` USING(provider_id) WHERE student_id = '$studentId';";
    $result = mysqli_query($connect, $sql);
    return $result;
}

function getOngoingCoursesByStudentId($connect, $studentId) {
    $sql = "SELECT * FROM student_course JOIN course USING(course_id)  JOIN `provider` USING(provider_id) WHERE student_id = '$studentId' AND progress < 100;";
    $result = mysqli_query($connect, $sql);
    return $result;
}

function getCompletedCoursesByStudentId($connect, $studentId) {
    $sql = "SELECT * FROM student_course JOIN course USING(course_id) JOIN `provider` USING(provider_id) WHERE student_id = '$studentId' AND progress = 100;";
    $result = mysqli_query($connect, $sql);
    return $result;
}

function getFilteredCoursesBySearchInput($connect, $input) {
    $sql = "SELECT * FROM course JOIN `provider` USING(provider_id) WHERE CONCAT(course_title, course_description) LIKE '%$input%';";
    $result = mysqli_query($connect, $sql);
    return $result;
}

function getAllCourses($connect) {
    $sql = "SELECT * FROM course JOIN `provider` USING(provider_id);";
    $result = mysqli_query($connect, $sql);
    return $result;
}

function getAllInstructors($connect) {
    $sql = "SELECT instructor_name, provider_name, i.user_id, user_email FROM instructor i JOIN `provider` p USING(provider_id) JOIN `user` u ON u.user_id = i.user_id;";
    $result = mysqli_query($connect, $sql);
    return $result;
}

function getAllProviders($connect) {
    $sql = "SELECT * FROM `provider` JOIN `user` USING(user_id);";
    $result = mysqli_query($connect, $sql);
    return $result;
}

function getInstructorsByProviderId($connect, $providerId) {
    $sql = "SELECT * FROM instructor WHERE provider_id = '$providerId';";
    $result = mysqli_query($connect, $sql);
    return $result;
}

function getInstructorsNameByCourseId($connect, $courseId) {
    $sql = "SELECT DISTINCT i.instructor_name FROM instructor AS i JOIN instructor_course AS ci ON i.instructor_id = ci.instructor_id WHERE ci.course_id = '$courseId';";
    $result = mysqli_query($connect, $sql);
    return $result;
}

function getInstructorNameAndEmailByInstructorId($connect, $instructorId) {
    $sql = "SELECT instructor_name, user_email FROM instructor AS i JOIN `user` AS u WHERE i.user_id = u.user_id AND instructor_id = $instructorId";
    $result = mysqli_query($connect, $sql);
    return mysqli_fetch_assoc($result);
}

function getNumberOfCoursesInstructorTeaching($connect, $instructorId) {
    $sql = "SELECT * FROM `instructor_course` WHERE instructor_id = '$instructorId' AND availability = 1;";
    $result = mysqli_query($connect, $sql);
    return mysqli_num_rows($result);
}

// ------ utils ------
function resetAllInstructorsByCourseId($connect, $courseId) {
    $sql = "DELETE FROM instructor_course WHERE course_id = $courseId;";
    mysqli_query($connect, $sql);
}

function isCourseAssignedToInstructor($connect, $courseId, $instructorId) {
    $sql = "SELECT * FROM instructor_course WHERE instructor_id = '$instructorId' AND course_id = '$courseId';";
    $result = mysqli_query($connect, $sql);
    return mysqli_num_rows($result) > 0 ? true : false;
}

function checkHeader($role) {
    if ($role == "student")
        header("location: ../register.php?error=stmtfailed");
    else if ($role == "instructor") 
        header("location: ../provider/instructor_add.php?error=stmtfailed");
    exit();
}

// ------ populators ------
function populateCoursesTable($connect, $courses, $editable) {
    while ($row = mysqli_fetch_assoc($courses)) {
        $id = $row['course_id'];
        $title = $row['course_title'];
        $description = $row['course_description'];
        $startDate = $row['course_start_date'];
        $endDate = $row['course_end_date'];

        $instructorsName = getInstructorsNameByCourseId($connect, $id);
        $names = [];
        while ($innerRow = mysqli_fetch_assoc($instructorsName))
            $names[] = $innerRow['instructor_name'];
        $mergedName = implode(', ', $names);

        echo '<tr>';
            echo '<td class="overflow">' . $title . '</td>';
            echo '<td class="overflow">' . $description . '</td>';
            echo '<td class="overflow">' . $mergedName . '</td>';
            echo '<td class="fit">' . $startDate . '</td>';
            echo '<td class="fit">' . $endDate . '</td>';

        if ($editable) {
            echo '<td>';
                echo '<div class="actions">' ;
                    echo "<a href='course_edit.php?button=courses&courseId=$id'>";                   
                        echo '<i class="fa fa-pen-to-square"></i>';
                    echo '</a>';
                    echo "<a href='courses.php?del&courseId=$id' onclick='return confirmation();'>";
                        echo '<i class="fa fa-trash"></i>';
                    echo '</a>';
                echo '</div>';                    
            echo '</td>';  
        }      
        echo '</tr>';
    }
}

function populateInstructorsTable($connect, $instructors, $editable, $selectable) {
    while ($row = mysqli_fetch_assoc($instructors)) {
        $id = $row['instructor_id'];
        $nameAndEmail =  getInstructorNameAndEmailByInstructorId($connect, $id);
        $courseCount = getNumberOfCoursesInstructorTeaching($connect, $id);
        
        echo '<tr>';
        echo '<td class="overflow">' . $nameAndEmail["instructor_name"] . '</td>';                   
        echo '<td class="overflow">' . $nameAndEmail["user_email"] . '</td>';
        
        if (!$selectable)
            echo '<td>' . $courseCount .'</td>';
        else 
            echo '<td><input type="checkbox" name="instructors_id[]" value="' . $id . '"></td>';

        if ($editable) {
            echo '<td>';
                echo '<div class="actions">' ;
                    echo "<a href='instructors.php?del&instructorId=$id' onclick='return confirmation();'>";
                        echo '<i class="fa fa-trash"></i>';
                    echo '</a>';
                echo '</div>';                    
            echo '</td>';  
        }     
        
        echo '</tr>';             
    }
}

function populateInstructorsTableByCourseId($connect, $instructors, $courseId) {
    while ($row = mysqli_fetch_assoc($instructors)) {
        $id = $row['instructor_id'];
        $nameAndEmail =  getInstructorNameAndEmailByInstructorId($connect, $id);

        echo '<tr>';
        echo '<td class="overflow">' . $nameAndEmail["instructor_name"] . '</td>';                   
        echo '<td class="overflow">' . $nameAndEmail["user_email"] . '</td>';
        
        if (isCourseAssignedToInstructor($connect, $courseId, $id)) 
            echo '<td><input type="checkbox" name="instructors_id[]" value="' . $id . '" checked></td>';
        else 
            echo '<td><input type="checkbox" name="instructors_id[]" value="' . $id . '"></td>';

        echo '</tr>';             
    }
}

function populateInstructorCoursesTable($connect, $courses, $editable) {
    while ($row = mysqli_fetch_assoc($courses)) {
        $id = $row['course_id'];
        $title = $row['course_title'];
        $description = $row['course_description'];
        $startDate = $row['course_start_date'];
        $endDate = $row['course_end_date'];
        $availability = $row['availability'];

        echo '<tr>';
            echo '<td class="overflow">' . $title . '</td>';
            echo '<td class="overflow">' . $description . '</td>';
            echo '<td class="fit">' . $startDate . '</td>';
            echo '<td class="fit">' . $endDate . '</td>';
            if ($availability == 1)
                echo '<td><i class="fa fa-check green"></i></td>';
            else 
                echo '<td><i class="fa fa-xmark red"></i></td>';

        if ($editable) {
            echo '<td>';
                echo '<div class="actions">' ;
                    echo "<a href='courses.php?tick&courseId=$id'>";                   
                        echo '<i class="fa fa-check green"></i>';
                    echo '</a>';
                    echo "<a href='courses.php?xmark&courseId=$id'>";
                        echo '<i class="fa fa-xmark red"></i>';
                    echo '</a>';
                echo '</div>';                    
            echo '</td>';  
        }      
        echo '</tr>';
    }
}

function populateInstructorStudentsTable($connect, $students) {
    while ($row = mysqli_fetch_assoc($students)) {
        $name = $row['student_name'];
        $age = $row['student_age'];
        $courseTitle = $row['course_title'];
       
        echo '<tr>';
            echo '<td class="fit">' . $name . '</td>';
            echo '<td class="fit">' . $age . '</td>';
            echo '<td class="overflow">' . $courseTitle . '</td>';
        echo '</tr>';
    }
}

function populateRegistrationCoursesSection($connect, $courses, $registeredCourses) {
    while ($row = mysqli_fetch_assoc($courses)) {
        $instructorsName = getInstructorsNameByCourseId($connect, $row['course_id']);
        $registered = false;

        echo '<div class="course-card">';
        echo    '<div class="title-progress-container">';
        echo        "<h4 class='course-card-title'>" . $row['course_title'] . "</h4>";
        
        mysqli_data_seek($registeredCourses, 0);
        while ($registeredRow = mysqli_fetch_assoc($registeredCourses))
            if ($row['course_id'] == $registeredRow['course_id']) {
                echo "<span>registered</span>";
                $registered = true;
                break;
            }

        if (!$registered)   
            echo     "<span><a href='../includes/student_course_add.inc.php?register&courseId=" . $row['course_id'] . "'>register</a></span>";

        echo    '</div>';
        echo    "<p class='course-card-description'>" . $row['course_description'] . "</p>";
        echo    '<div class="details-container">';
        echo        '<div class="course-card-instructors">';
        echo            '<i class="fa-solid fa-user smaller"></i>';
        echo            '<ul class="instructors-list">';

        while ($innerRow = mysqli_fetch_assoc($instructorsName))
            echo            "<li>" . $innerRow['instructor_name'] . "</li>";
    
        echo            '</ul>';
        echo        '</div>';
        echo        '<div class="course-card-info">';
        echo            '<i class="fa-solid fa-calendar"></i>';
        echo                "<span class='course-card-details-date'>" . $row['course_start_date'] . " to " . $row['course_end_date'] . "</span>";
        echo                "<span class='course-card-details-company'>" . $row['provider_name'] . "</span>";
        echo        '</div>';
        echo    '</div>';
        echo '</div>';
    }
}

function populateIndexCoursesSection($connect, $courses, $hasLimit) {
    $limit = 4;
    while ($row = mysqli_fetch_assoc($courses)) {
        $instructorsName = getInstructorsNameByCourseId($connect, $row['course_id']);

        echo '<div class="course-card">';
        echo    "<div class='title-progress-container'>";
        echo        "<h4 class='course-card-title'>" . $row['course_title'] . "</h4>";
        echo    "</div>";
        echo    "<p class='course-card-description'>" . $row['course_description'] . "</p>";
        echo    '<div class="details-container">';
        echo        '<div class="course-card-instructors">';
        echo            '<i class="fa-solid fa-user"></i>';
        echo            '<ul>';

        while ($innerRow = mysqli_fetch_assoc($instructorsName))
            echo            "<li>" . $innerRow['instructor_name'] . "</li>";
    
        echo            '</ul>';
        echo        '</div>';
        echo        '<div class="course-card-info">';
        echo            '<i class="fa-solid fa-calendar"></i>';
        echo                "<span class='course-card-details-date'>" . $row['course_start_date'] . " to " . $row['course_end_date'] . "</span>";
        echo                "<span class='course-card-details-company'>" . $row['provider_name'] . "</span>";
        echo        '</div>';
        echo    '</div>';
        echo '</div>';
        $limit--;
        if ($hasLimit && $limit <= 0)
            break;
    }
}

function populateOngoingCoursesSection($connect, $ongoingCourses) {
    while ($row = mysqli_fetch_assoc($ongoingCourses)) {
        $instructorsName = getInstructorsNameByCourseId($connect, $row['course_id']);
        
        echo '<div class="course-card">';
        echo    '<div class="title-progress-container">';
        echo        "<h4 class='course-card-title'>" . $row['course_title'] . "</h4>";
        echo        "<span>" . round($row['progress']) . "%</span>";
        echo    '</div>';
        echo    "<p class='course-card-description'>" . $row['course_description'] . "</p>";
        echo    '<div class="details-container">';
        echo        '<div class="course-card-instructors">';
        echo            '<i class="fa-solid fa-user smaller"></i>';
        echo            '<ul class="instructors-list">';

        while ($innerRow = mysqli_fetch_assoc($instructorsName))
            echo            "<li>" . $innerRow['instructor_name'] . "</li>";
    
        echo            '</ul>';
        echo        '</div>';
        echo        '<div class="course-card-info">';
        echo            '<i class="fa-solid fa-calendar"></i>';
        echo                "<span class='course-card-details-date'>" . $row['course_start_date'] . "-" . $row['course_end_date'] . "</span>";
        echo                "<span class='course-card-details-company'>" . $row['provider_name'] . "</span>";
        echo        '</div>';
        echo    '</div>';
        echo '</div>';
    }
} 

function populateCompletedCoursesSection($connect, $completedCourses) {
    while ($row = mysqli_fetch_assoc($completedCourses)) {
        $instructorsName = getInstructorsNameByCourseId($connect, $row['course_id']);
        
        echo '<div class="course-card">';
        echo    "<h4 class='course-card-title'>" . $row['course_title'] . "</h4>";
        echo    "<p class='course-card-description'>" . $row['course_description'] . "</p>";
        echo    '<div class="details-container">';
        echo        '<div class="course-card-instructors">';
        echo            '<i class="fa-solid fa-user smaller"></i>';
        echo            '<ul class="instructors-list">';

        while ($innerRow = mysqli_fetch_assoc($instructorsName))
            echo            "<li>" . $innerRow['instructor_name'] . "</li>";
    
        echo            '</ul>';
        echo        '</div>';
        echo        '<div class="course-card-info">';
        echo            '<i class="fa-solid fa-calendar"></i>';
        echo                "<span class='course-card-details-date'>" . $row['course_start_date'] . "-" . $row['course_end_date'] . "</span>";
        echo                "<span class='course-card-details-company'>" . $row['provider_name'] . "</span>";
        echo        '</div>';
        echo    '</div>';
        echo '</div>';
    }
}

// ------ Admin Only ------
function populateProvidersTable($providers, $editable) {
    while ($row = mysqli_fetch_assoc($providers)) { 
        $id = $row['provider_id'];

        echo '<tr>';
        echo    '<td class="overflow">' . $row['provider_name'] . '</td>';
        echo    '<td class="overflow">' . $row['user_email'] . '</td>';
        
        if ($editable) {
            echo '<td>';
                echo '<div class="actions">' ;
                    echo "<a href='providers.php?del&providerId=$id' onclick='return confirmation();'>";
                        echo '<i class="fa fa-trash"></i>';
                    echo '</a>';
                echo '</div>';                    
            echo '</td>';
        }
        echo '</tr>';
    }
}

function populateAdminCoursesTable($courses, $editable) {
    while ($row = mysqli_fetch_assoc($courses)) {
        $id = $row['course_id'];
        $title = $row['course_title'];
        $description = $row['course_description'];
        $startDate = $row['course_start_date'];
        $endDate = $row['course_end_date'];
        $providerName = $row['provider_name'];

        echo '<tr>';
            echo '<td class="overflow">' . $title . '</td>';
            echo '<td class="overflow">' . $description . '</td>';
            echo '<td class="fit">' . $startDate . '</td>';
            echo '<td class="fit">' . $endDate . '</td>';
            echo '<td class="overflow">' . $providerName . '</td>';

        if ($editable) {
            echo '<td>';
                echo '<div class="actions">' ;
                    echo "<a href='courses.php?del&courseId=$id' onclick='return confirmation();'>";
                        echo '<i class="fa fa-trash"></i>';
                    echo '</a>';
                echo '</div>';                    
            echo '</td>';  
        }      
        echo '</tr>';
    }
}

function populateAdminInstructorsTable($instructors, $editable) {
    while ($row = mysqli_fetch_assoc($instructors)) {
        $id = $row['instructor_id'];
        $name = $row['instructor_name'];
        $email = $row['user_email'];
        $providerName = $row['provider_name'];
    
        echo '<tr>';
            echo '<td class="overflow">' . $name . '</td>';
            echo '<td class="overflow">' . $email . '</td>';
            echo '<td class="overflow">' . $providerName . '</td>';

        if ($editable) {
            echo '<td>';
                echo '<div class="actions">' ;
                    echo "<a href='instructors.php?del&instructorsId=$id' onclick='return confirmation();'>";
                        echo '<i class="fa fa-trash"></i>';
                    echo '</a>';
                echo '</div>';                    
            echo '</td>';  
        }      
        echo '</tr>';
    }
}

// ------ Edit Course ------
function updateCourseInstructors($connect, $courseId, $instructorsId) {
    resetAllInstructorsByCourseId($connect, $courseId);
    foreach ($instructorsId as $instructorId) {
        $sql = "INSERT INTO `instructor_course` VALUES ('$instructorId', '$courseId', FALSE)";
        $result = mysqli_query($connect, $sql);

        if (!$result) {
            header("location: ../provider/course_edit.php?button=courses&error=unable to update course&courseId=$courseId");
            exit();
        }
    }
    header("location: ../provider/course_edit.php?button=courses&success&courseId=$courseId");
    exit();
}

function updateCourse($connect, $title, $description, $startDate, $endDate, $instructorsId) {
    session_start();
    $courseId = $_SESSION['course_id'];
    $sql = "UPDATE course SET course_title='$title', course_description='$description', course_start_date='$startDate', course_end_date='$endDate' WHERE course_id='$courseId';";
    $result = mysqli_query($connect, $sql);

    if (!$result) {
        header("location: ../provider/course_add.php?button=courses&error=duplicating course");
        exit();
    } else {
        updateCourseInstructors($connect, $courseId, $instructorsId);
    }
}

?>