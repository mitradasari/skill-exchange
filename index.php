<!DOCTYPE html>
<html>
<head>
    <title>SkillSwap - Student Skill Exchange</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #222;
        }

        .navbar {
            background: #1e3a8a;
            color: white;
            padding: 18px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 26px;
            font-weight: bold;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            margin-left: 25px;
        }

        .hero {
            text-align: center;
            padding: 70px 20px;
            background: white;
        }

        .hero h1 {
            font-size: 45px;
            margin-bottom: 15px;
        }

        .hero p {
            font-size: 18px;
            color: #555;
        }

        .button {
            display: inline-block;
            margin: 20px 8px;
            padding: 12px 25px;
            background: #1e3a8a;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .section {
            padding: 45px 50px;
            text-align: center;
        }

        .cards {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .card {
            background: white;
            width: 220px;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px #ddd;
        }

        .card h3 {
            color: #1e3a8a;
        }

        footer {
            text-align: center;
            padding: 20px;
            background: #1e3a8a;
            color: white;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <div class="logo">SkillSwap</div>

        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="#skills">Skills</a>
            <a href="#about">About</a>
            <a href="register.php">Register</a>
        </div>
    </div>

    <div class="hero">
        <h1>Learn. Teach. Exchange.</h1>

        <p>
            A Student Skill Exchange Platform where students
            can teach what they know and learn new skills from others.
        </p>

        <a href="#skills" class="button">Explore Skills</a>
        <a href="register.php" class="button">Join Now</a>
    </div>

    <div class="section" id="skills">
        <h2>Popular Skills</h2>

        <div class="cards">

            <div class="card">
                <h3>Java</h3>
                <p>Learn and teach Java programming.</p>
            </div>

            <div class="card">
                <h3>Python</h3>
                <p>Exchange Python programming skills.</p>
            </div>

            <div class="card">
                <h3>Graphic Design</h3>
                <p>Share your creative design knowledge.</p>
            </div>

            <div class="card">
                <h3>Web Development</h3>
                <p>Learn modern web development skills.</p>
            </div>

        </div>
    </div>

    <div class="section" id="about">
        <h2>How SkillSwap Works</h2>

        <div class="cards">

            <div class="card">
                <h3>1. Create Profile</h3>
                <p>Add your details and skills.</p>
            </div>

            <div class="card">
                <h3>2. Find a Match</h3>
                <p>Find students who can teach what you want to learn.</p>
            </div>

            <div class="card">
                <h3>3. Exchange Skills</h3>
                <p>Connect, learn and share your knowledge.</p>
            </div>

        </div>
    </div>

    <footer>
        <p>© 2026 SkillSwap - Student Skill Exchange Platform</p>
    </footer>

</body>
</html>