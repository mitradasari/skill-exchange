<?php

session_start();

if (!isset($_SESSION["student_id"])) {
    header("Location: login.php");
    exit();
}

$student_name = $_SESSION["student_name"];

?>

<!DOCTYPE html>
<html>

<head>

    <title>Dashboard - SkillSwap</title>

    <style>

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7fb;
        }

        .navbar {
            background: #1e3a8a;
            color: white;
            padding: 18px 50px;
            display: flex;
            justify-content: space-between;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .logout {
            color: white;
            text-decoration: none;
        }

        .container {
            padding: 50px;
            text-align: center;
        }

        .welcome {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px #ddd;
            max-width: 700px;
            margin: auto;
        }

        .cards {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .card {
            background: white;
            width: 200px;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px #ddd;
        }

        .card h3 {
            color: #1e3a8a;
        }

    </style>

</head>

<body>

<div class="navbar">

    <div class="logo">
        SkillSwap
    </div>

    <a class="logout" href="logout.php">
        Logout
    </a>

</div>

<div class="container">

    <div class="welcome">

        <h1>
            Welcome, <?php echo htmlspecialchars($student_name); ?>! 👋
        </h1>

        <p>
            Welcome to your SkillSwap dashboard.
        </p>

    </div>

    <div class="cards">

        <div class="card">
            <h3>My Skills</h3>
            <p>Add skills you can teach or want to learn.</p>
        </div>

        <div class="card">
            <h3>Find Matches</h3>
            <p>Find students who can teach your desired skills.</p>
        </div>

        <div class="card">
            <h3>Requests</h3>
            <p>Manage your skill exchange requests.</p>
        </div>

        <div class="card">
            <h3>Sessions</h3>
            <p>Manage your learning sessions.</p>
        </div>

    </div>

</div>

</body>

</html>