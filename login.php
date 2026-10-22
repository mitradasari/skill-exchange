<?php

session_start();

require_once "config.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if ($email == "" || $password == "") {

        $message = "Please enter email and password.";

    } else {

        $stmt = $conn->prepare(
            "SELECT student_id, name, password_hash
             FROM student
             WHERE email = ?"
        );

        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 1) {

            $student = $result->fetch_assoc();

            if (password_verify($password, $student["password_hash"])) {

                $_SESSION["student_id"] = $student["student_id"];
                $_SESSION["student_name"] = $student["name"];

                header("Location: dashboard.php");
                exit();

            } else {

                $message = "Incorrect password.";

            }

        } else {

            $message = "Email not registered.";

        }

        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Login - SkillSwap</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            margin: 0;
        }

        .container {
            width: 400px;
            margin: 80px auto;
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
            margin-top: 18px;
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
            color: #c00;
            margin-bottom: 15px;
        }

        .back {
            text-align: center;
            margin-top: 18px;
        }

        .back a {
            color: #1e3a8a;
            text-decoration: none;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>SkillSwap Login</h1>

    <?php if ($message != "") { ?>

        <div class="message">
            <?php echo $message; ?>
        </div>

    <?php } ?>

    <form method="POST">

        <label>Email</label>

        <input
            type="email"
            name="email"
            required
        >

        <label>Password</label>

        <input
            type="password"
            name="password"
            required
        >

        <button type="submit">
            Login
        </button>

    </form>

    <div class="back">
        <a href="index.php">← Back to Home</a>
    </div>

</div>

</body>

</html>