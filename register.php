<?php

require_once "config.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $department = trim($_POST["department"]);
    $semester = (int) $_POST["semester"];
    $password = $_POST["password"];

    if ($name == "" || $email == "" || $department == "" || $semester <= 0 || $password == "") {

        $message = "Please fill all fields.";

    } else {

        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare(
            "INSERT INTO student
            (name, email, password_hash, department, semester)
            VALUES (?, ?, ?, ?, ?)"
        );

        $stmt->bind_param(
            "ssssi",
            $name,
            $email,
            $password_hash,
            $department,
            $semester
        );

        if ($stmt->execute()) {

            $message = "Registration successful!";

        } else {

            if ($stmt->errno == 1062) {
                $message = "This email is already registered.";
            } else {
                $message = "Registration failed.";
            }
        }

        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Register - SkillSwap</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            margin: 0;
        }

        .container {
            width: 400px;
            margin: 60px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 12px #ddd;
        }

        h1 {
            text-align: center;
            color: #1e3a8a;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 25px;
            background: #1e3a8a;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .message {
            text-align: center;
            margin-bottom: 15px;
            color: #1e3a8a;
        }

        .back {
            text-align: center;
            margin-top: 15px;
        }

        .back a {
            color: #1e3a8a;
            text-decoration: none;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>Join SkillSwap</h1>

    <?php if ($message != "") { ?>

        <div class="message">
            <?php echo $message; ?>
        </div>

    <?php } ?>

    <form method="POST">

        <label>Name</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Department</label>
        <input type="text" name="department" required>

        <label>Semester</label>
        <input type="number" name="semester" min="1" max="8" required>
<label>Skill You Can Teach</label>
<input type="text" name="teach_skill" required>

<label>Skill You Want to Learn</label>
<input type="text" name="learn_skill" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">
            Register
        </button>

    </form>

    <div class="back">
        <a href="index.php">← Back to Home</a>
    </div>

</div>

</body>

</html>