
<?php
    include "../../include/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $icon = $_POST['icon'];
    $degree = $_POST['degree'];
    $institude = $_POST['institude'];
    $passing_year = $_POST['passing_year'];
    
    $sql = "INSERT INTO `timeline` (`icon`,`degree`, `institude`, `passing_year`) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$icon, $degree, $institude, $passing_year]);
    
    header("location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content -->
</head>
<body>
    <form method="POST">
        <input type="text" name="icon" placeholder="icon"><br>
        <input type="text" name="degree" placeholder="Degree"><br>
        <input type="text" name="institude" placeholder="Institude"><br>
        <input type="text" name="passing_year" placeholder="Passing Year"><br>
        <button type="submit">Add Timeline Entry</button>
    </form>
</body>
</html>

