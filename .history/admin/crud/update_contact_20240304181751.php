<?php
include "../../include/config.php";

$phone = $email = $address = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql = "UPDATE `contact` SET `phone` = :phone, `email` = :email, `address` = :address WHERE `id` = 1";

    if ($stmt = $pdo->prepare($sql)) {
        $stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":address", $address, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            echo '<script>window.location = "../index.php";</script>';
            exit();
        } else {
            $message = "Oops! Something went wrong. Please try again later.";
        }
    }
    unset($stmt);
}

$sql = "SELECT * FROM `contact` WHERE `id` = 1"; 
$stmt = $pdo->query($sql);
$personalData = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$personalData) {
    exit("Error: Contact information not found.");
}

unset($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Contact Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container-contact {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .section-heading {
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            padding: 10px 30px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 20px auto;
            display: block; 
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .success-message {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container-contact">
        <h1 class="section-heading">Update Contact Information</h1>
        <?php if (!empty($message)): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
        <form action="update_contact.php" method="post">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?= $personalData['phone'] ?>"><br><br>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= $personalData['email'] ?>"><br><br>
            
            <label for="address">Address:</label>
            <textarea id="address" name="address"><?= $personalData['address'] ?></textarea><br><br>
            
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
