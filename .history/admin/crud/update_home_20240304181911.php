<?php
include "../../include/config.php";

$full_name = $subtitle = "";
$full_name_err = $subtitle_err = "";

$sql = "SELECT `full_name`, `subtitle` FROM `user` WHERE `id` = 1";
if ($stmt = $pdo->prepare($sql)) {
    if ($stmt->execute()) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $full_name = $row['full_name'];
            $subtitle = $row['subtitle'];
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["full_name"]))) {
        $full_name_err = "Please enter your full name.";
    } else {
        $full_name = trim($_POST["full_name"]);
    }

    if (empty(trim($_POST["subtitle"]))) {
        $subtitle_err = "Please enter a subtitle.";
    } else {
        $subtitle = trim($_POST["subtitle"]);
    }

    if (empty($full_name_err) && empty($subtitle_err)) {
        $sql = "UPDATE `user` SET `full_name` = :full_name, `subtitle` = :subtitle WHERE `id` = 1";

        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(":full_name", $param_full_name, PDO::PARAM_STR);
            $stmt->bindParam(":subtitle", $param_subtitle, PDO::PARAM_STR);

            $param_full_name = $full_name;
            $param_subtitle = $subtitle;

            if ($stmt->execute()) {
                header("location: ../index.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }

        unset($stmt);
    }

    unset($pdo);
}
?>

<?php
include "../../include/config.php";

$image = $username = $details = "";
$image_err = $username_err = $details_err = "";

$sql = "SELECT `image`, `username`, `details` FROM `about` WHERE `id` = 1";
if ($stmt = $pdo->prepare($sql)) {
    if ($stmt->execute()) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $image = $row['image'];
            $username = $row['username'];
            $details = $row['details'];
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["image"]))) {
        $image_err = "Please enter image URL.";
    } else {
        $image = trim($_POST["image"]);
    }

    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
    }

    if (empty(trim($_POST["details"]))) {
        $details_err = "Please enter details.";
    } else {
        $details = trim($_POST["details"]);
    }

    if (empty($image_err) && empty($username_err) && empty($details_err)) {
        $sql = "UPDATE `about` SET `image` = :image, `username` = :username, `details` = :details WHERE `id` = 1";

        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(":image", $param_image, PDO::PARAM_STR);
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":details", $param_details, PDO::PARAM_STR);

            $param_image = $image;
            $param_username = $username;
            $param_details = $details;

            if ($stmt->execute()) {
                // Redirect to the home page after update
                header("location: ../index.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Close connection
    unset($pdo);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Info</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            text-align: center;
            border: 1px solid #e2e2e2;
            padding: 100px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
        }
        .subtitle input[type="text"],
        textarea  {
            height: 100px;
        }
        .details textarea {
            height: 200px;
        }
        

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        span.error {
            color: red;
        }
    </style>
</head>
<body>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
        <h1>Update Home Information</h1>
            <label for="full_name">Full Name:</label><br>
            <input type="text" id="full_name" name="full_name" value="<?php echo htmlspecialchars($full_name); ?>"><br>
            <span style="color: red;"><?php echo $full_name_err; ?></span>
        </div>
        <div class="subtitle">
            <label for="subtitle">Subtitle:</label><br>
            <input type="text" id="subtitle" name="subtitle" value="<?php echo htmlspecialchars($subtitle); ?>"><br>
            <span style="color: red;"><?php echo $subtitle_err; ?></span>
        </div>
        <div>
            <button type="submit">Update</button>
        </div>
    </form>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    
        <div>
            <h1>Update About Information</h1>
            <label for="image">Image URL:</label><br>
            <input type="text" id="image" name="image" value="<?php echo htmlspecialchars($image); ?>"><br>
            <span style="color: red;"><?php echo $image_err; ?></span>
        </div>
        <div>
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>"><br>
            <span style="color: red;"><?php echo $username_err; ?></span>
        </div>
        <div class="details">
            <label for="details">Details:</label><br>
            <textarea id="details" name="details"><?php echo htmlspecialchars($details); ?></textarea><br>
            <span style="color: red;"><?php echo $details_err; ?></span>
        </div>
        <div>
            <button type="submit">Update</button>
        </div>
    </form>
</body>
</html>
