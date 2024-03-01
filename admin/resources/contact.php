<?php
    include "../include/config.php";
    $sql = "SELECT * FROM `contact` WHERE `contact`.`id` = 1";
    $stmt = $pdo->query($sql);
    $personalData = $stmt->fetch(PDO::FETCH_ASSOC);

    // Fetch all data from the database
    $sql = "SELECT * FROM `contact_messages`";
    $stmt = $pdo->query($sql);
    $dataInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>
    <style>

        /* Contact section */
        #contact {
            background-color: #f9f9f9;
            padding: 50px 0;
            text-align: center;
        }

        .container-contact {
            max-width: 90%;
            margin: auto;
        }

        p {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .section-heading{
            text-align: center;
            margin-bottom: 50px;
        }

        /* Card styles */
        .card-wrapper-contact {
            display: flex;
            justify-content: space-around;
            margin-bottom: 40px;
        }

        .card-contact {
            flex-basis: calc(33.33% - 20px);
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card-contact img {
            max-width: 30px;
            margin-bottom: 10px;
        }

        /* Table styles */
.custom-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 30px;
}

.custom-table th,
.custom-table td {
    padding: 12px;
    border: 1px solid #ddd; /* Add border to each cell */
    text-align: left;
    white-space: nowrap; /* Prevent text wrapping */
    max-width: 150px; /* Set maximum width for cells */
    overflow: hidden; /* Hide overflow */
    text-overflow: ellipsis; /* Show ellipsis for overflowed content */
}

.custom-table th {
    background-color: #f2f2f2;
    color: #333;
    text-align: center; /* Center the text in th */
}

/* Make Message cell larger */
.custom-table td:nth-child(4) {
    max-width: none;
    width: 33%; /* Adjust width as needed */
    white-space: normal; /* Allow text wrapping */
}
.custom-table td:nth-child(5) {
    text-align: center;
}
/* Delete button styles */
.delete-button {
    background-color: #f44336;
    color: #fff;
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.delete-button:hover {
    background-color: #d32f2f;
}

/* Update button styles */
.update-button {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 20px;
}

.update-button:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>

<section id="contact" class="contact contact-section">
    <div class="container-contact">
        <p>Get In Touch</p>
        <h1 class="section-heading"><span>Contact Me</span></h1> 

        <!-- Personal Data Table -->
        <div class="card-wrapper-contact">
            <div class="card-contact">
                <img src="./images/call.png" alt="">
                <p>Call Me On</p>
                <h6><a href="<?= $personalData['p_link'] ?>" target="_blank"><?= $personalData['phone'] ?></a></h6>
            </div>
            <div class="card-contact">
                <img src="./images/email.png" alt="">
                <p>Email Me At</p>
                <a href="<?= $personalData['e_link'] ?>" target="_blank">
                    <h6><?= $personalData['email'] ?></h6>
                </a>
            </div>
            <div class="card-contact">
                <img src="./images/location.png" alt="">
                <p>Address</p>
                <a href="<?= $personalData['a_link'] ?>" target="_blank">
                    <h6><?= $personalData['address'] ?></h6>
                </a>
            </div>
        </div>

        <!-- Data Table with Delete Button -->
        <table class="custom-table" border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataInfo as $row): ?>
                    <tr>
                        <td><?= $row['user'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['subject'] ?></td>
                        <td><?= $row['message'] ?></td>
                        <td>
                            <form action="delete.php" method="post">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <button class="delete-button" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <!-- Update Button -->
        <button class="update-button">Update Contact Info</button>
    </div>
</section>

</body>
</html>
