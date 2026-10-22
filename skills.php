<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once "config.php";

if (!isset($_SESSION["student_id"])) {
    header("Location: login.php");
    exit();
}

$student_id = $_SESSION["student_id"];
$message = "";

/* Save selected skill */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $skill_id = (int) $_POST["skill_id"];
    $skill_type = $_POST["skill_type"];

    if ($skill_id > 0 && ($skill_type == "Teach" || $skill_type == "Learn")) {

        $stmt = $conn->prepare(
            "INSERT IGNORE INTO student_skill
            (student_id, skill_id, skill_type)
            VALUES (?, ?, ?)"
        );

        $stmt->bind_param(
            "iis",
            $student_id,
            $skill_id,
            $skill_type
        );

        if ($stmt->execute()) {
            $message = "Skill added successfully!";
        } else {
            $message = "Could not add skill.";
        }

        $stmt->close();
    }
}

/* Get all skills */
$skills = $conn->query(
    "SELECT skill_id, skill_name, category
     FROM skill
     ORDER BY skill_name"
);

/* Get student's selected skills */
$my_skills = $conn->prepare(
    "SELECT sk.skill_name, ss.skill_type
     FROM student_skill ss
     JOIN skill sk
     ON ss.skill_id = sk.skill_id
     WHERE ss.student_id = ?
     ORDER BY sk.skill_name"
);

$my_skills->bind_param("i", $student_id);
$my_skills->execute();

$my_result = $my_skills->get_result();

?>

<!DOCTYPE html>
<html>

<head>

    <title>My Skills - SkillSwap</title>

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

        .navbar a {
            color: white;