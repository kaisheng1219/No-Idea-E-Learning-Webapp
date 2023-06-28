<?php require_once "includes/connection.inc.php"; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>No Idea</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@0;1&family=Outfit:wght@400;500;600;700;800;900&family=Space+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link rel="stylesheet" href="../css/reset.css"> 
    <link rel="stylesheet" href="../css/index_shared.css"> 
    <link rel="stylesheet" href="../css/landingPage.css"> 
    <link rel="stylesheet" href="../css/course-card.css">     
</head>

<body>
    <?php require_once "header.php"; ?>
    <main>
        <section id="hero-section">
            <div class="left">
                <h1>Start learning today</h1>
                <p>Our courses are provided by prominent companies and top universities, and it's still increasing.</p>    
                <button>Start Learning Now</button>
            </div>
            <div class="right">
                <image src="../images/hero/Learning Image.png" alt="Learning image">
                <div class="logos">
                    <image src="../images/hero/Google Logo.png" alt="Google logo" style="width: 110px; height: 30px;">
                    <image src="../images/hero/Codecademy Logo.png" alt="Codecademy logo" style="width: 150px; height: 30px;">
                    <image src="../images/hero/Harvard Logo.png" alt="Harvard logo" style="width: 100px; height: 30px;">
                </div>
            </div>
        </section>
        <form id="courses-section">
            <div class="top">
                <h2>COURSES</h2>
                <div class="search-container">
                    <span class="material-icons search-icon">search</span>
                    <input type="search" class="search-input" placeholder="Search courses you interested in...">
                </div>
            </div>
            <div class="middle">
                <div class="left">
                    <button class="courses-tag-button">
                        <span class="material-icons">microwave</span>
                        <span class="tag-name">Cooking</span>
                    </button>
                    <button class="courses-tag-button">
                        <span class="material-icons">palette</span>
                        <span class="tag-name">Art</span>
                    </button>
                    <button class="courses-tag-button">
                        <span class="material-icons">music_note</span>
                        <span class="tag-name">Music</span>
                    </button>
                    <button class="courses-tag-button">
                        <span class="material-icons">laptop</span>
                        <span class="tag-name">Programming</span>
                    </button>
                    <button class="courses-tag-button">
                        <span class="material-icons">sports_tennis</span>
                        <span class="tag-name">Exercising</span>
                    </button>                
                </div>
                <div class="right">
                    <div class="course-card">
                        <h4 class="course-card-title">Interior Design Course</h4>
                        <p class="course-card-description">
                            Teaches the principles and techniques of creating functional and aesthetically pleasing indoor spaces, encompassing aspects such as spatial planning, color schemes, furniture selection, and lighting design.
                        </p>
                        <div class="details-container">
                            <div class="course-card-instructors">
                                <i class="fa-solid fa-user "></i>
                                <ul>
                                    <li>Peter Pan</li>
                                    <li>Albert Einstein</li>
                                    <li>De Broglie</li>
                                </ul>
                            </div>
                            <div class="course-card-info">
                                <i class="fa-solid fa-calendar"></i>
                                <span class="course-card-details-date">12/06/2023 - 20/07/2023</span>
                                <span class="course-card-details-company">Google</span>
                            </div>
                        </div>
                    </div>

                    <div class="course-card">
                        <h4 class="course-card-title">Interior Design Course</h4>
                        <p class="course-card-description">
                            Teaches the principles and techniques of creating functional and aesthetically pleasing indoor spaces.
                        </p>
                        <div class="details-container">
                            <div class="course-card-instructors">
                                <i class="fa-solid fa-user "></i>
                                <ul>
                                    <li>Peter Pan</li>
                                    <li>Albert Einstein</li>
                                    <li>De Broglie</li>
                                </ul>
                            </div>
                            <div class="course-card-info">
                                <i class="fa-solid fa-calendar"></i>
                                <span class="course-card-details-date">12/06/2023 - 20/07/2023</span>
                                <span class="course-card-details-company">Google</span>
                            </div>
                        </div>
                    </div>

                    <div class="course-card">
                        <h4 class="course-card-title">Interior Design Course</h4>
                        <p class="course-card-description">
                            Teaches the principles and techniques of creating functional and aesthetically pleasing indoor spaces, encompassing aspects such as spatial planning, color schemes, furniture selection, and lighting design.
                        </p>
                        <div class="details-container">
                            <div class="course-card-instructors">
                                <i class="fa-solid fa-user "></i>
                                <ul>
                                    <li>Peter Pan</li>
                                    <li>Albert Einstein</li>
                                    <li>De Broglie</li>
                                </ul>
                            </div>
                            <div class="course-card-info">
                                <i class="fa-solid fa-calendar"></i>
                                <span class="course-card-details-date">12/06/2023 - 20/07/2023</span>
                                <span class="course-card-details-company">Google</span>
                            </div>
                        </div>
                    </div>

                    <div class="course-card">
                        <h4 class="course-card-title">Interior Design Course</h4>
                        <p class="course-card-description">
                            Teaches the principles and techniques of creating functional and aesthetically pleasing indoor spaces, encompassing aspects such as spatial planning, color schemes, furniture selection, and lighting design.
                        </p>
                        <div class="details-container">
                            <div class="course-card-instructors">
                                <i class="fa-solid fa-user "></i>
                                <ul>
                                    <li>Peter Pan</li>
                                    <li>Albert Einstein</li>
                                    <li>De Broglie</li>
                                </ul>
                            </div>
                            <div class="course-card-info">
                                <i class="fa-solid fa-calendar"></i>
                                <span class="course-card-details-date">12/06/2023 - 20/07/2023</span>
                                <span class="course-card-details-company">Google</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom">
                <button>Show all courses</button>
            </div>
        </form>
        <section id="about-us-section">
            <div class="left">
                <img src="../images/logo big.png" alt="logo">
            </div>
            <div class="right">
                <h2>ABOUT US</h2>
                <p>Our aim is to provide an all-in-one platform for course providers to manage their courses and introduce them to students globally.</p>
                <a>Contact Us</a>
            </div>
        </section>
    </main>
    <?php require_once "footer.php"; ?>
</body>
</html>