<?php
    include("../config.php");
    include("topBar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/badges.css">
    <title>Home</title>
</head>
<body>
    <div class="category">
        <p class="aboutUs">Joinee</p>
        <p class="ourTeam">Our Team</p>
    </div>
    
    <div class="joinee">
        <div class="aboutJoinee">
            <img src="../img/logo.png" alt="">
            <div class="text">
                <h2>About Joinee</h2>
                <p>Joinee is a web application for APU students to host and join sustainable events while gaining experience, connections, and sustainability knowledge.</p>
            </div>
        </div>
        <div class="aboutMission">
            <div class="text">
                <h2>Our Mission</h2>
                <p>Our mission is to empower APU students to create and participate in sustainable events that inspire responsible action and meaningful engagement.</p>
            </div>
            <img src="../img/mission.jpg" alt="">
        </div>
    
    </div>
    
    
    <div class="team">
      <div class="side">
            <p class="weihan">Weihan</p>
            <p class="education">Education</p>
            <p class="project">Projects</p>
      </div>
      <div class="mainContent">
            <div class="weihanContent">
                <div class="myProfile">
                    <img class="founder" src="../img/founder.jpeg" alt="">
                    <div class="contact">
                        <a target="_blank" href="mailto:chinweihan818@gmail.com"><i class="fa-solid fa-envelope"></i></a>
                        <a target="_blank" href="https://www.instagram.com/__weihan_?igsh=MW9nb292bWN4azFyeg=="><i class="fa-brands fa-instagram"></i></a>
                        <a target="_blank" href="https://www.linkedin.com/in/chin-wei-han-441129345/"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="founderContent">
                    <h2 class="founderName">Chin Wei Han</h2>
                    <p class="founderIntro">Weihan, the founder of Joinee, is a visionary leader driven by innovation and purpose. He inspires his team to achieve excellence while creating a meaningful impact in the community and industry.</p><br>
                    <h2>Words from the founder</h2>
                    <p class="founderWords">“Hi, I’m Weihan, the founder of this company, and I’m passionate about turning ideas into real solutions.”</p><br>
                    <h2>Skills</h2>
                    <p>HTML, CSS, Javascript, Java, PHP, MySQL</p>
                </div>
            </div>

            <div class="educationContent">
                <div class="school">
                    <img src="../img/apu.png" alt="">
                    <div class="schoolContent">
                        <h2>University</h2>
                        <p>Weihan is currently pursuing a Diploma in ICT (Software Engineering) at Asia Pacific University (APU). Through this program, he is gaining strong technical skills in software development, programming, and system design. His education at APU equips him with the knowledge and tools to drive innovation and build impactful technology solutions.</p>
                    </div>
                </div>
                <div class="school">
                    <img src="../img/smkjb.jpg" alt="">
                    <div class="schoolContent">
                        <h2>High School</h2>
                        <p>Weihan completed his secondary education at SMK Jalan Bukit, where he developed a strong foundation in academics and critical thinking. During his time there, he actively engaged in activities, which helped nurture his leadership and teamwork skills. His experiences at SMK Jalan Bukit laid the groundwork for his future studies and ambitions in technology and innovation.</p>
                    </div>
                </div>
            </div>

            <div class="projectsContent">
                <div class="firstProject">
                    <img src="../img/logo.png" alt="">
                    <p>Joinee is a web application for APU students to host and join sustainable events, promoting sustainability from planning to execution while offering opportunities to gain new experiences, expand connections, and learn about sustainability.</p>
                </div>

                <div class="firstProject">
                    <img src="../img/questionmark.jpg" alt="">
                    <p>And many more to come...</p>
                </div>
            </div>
      </div>

      
    </div>
    
   
</body>
<script src="../javascript/about.js"></script>
</html>