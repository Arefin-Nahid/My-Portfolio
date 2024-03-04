<?php
include "../../include/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] === 'delete') {
        // Handle delete operation
        $id = $_POST['id'];
        $sql_delete = "DELETE FROM `travelling` WHERE `id`=?";
        $stmt_delete = $pdo->prepare($sql_delete);
        $stmt_delete->execute([$id]);
        
        // Return a response indicating success
        echo json_encode(['success' => true]);
        exit();
    } else {
        // Handle insert operation
        $icon = $_POST['icon_insert'];
        $details = $_POST['details_insert'];
        
        $sql_insert = "INSERT INTO `travelling` (`icon`, `details`) VALUES (?, ?)";
        $stmt_insert = $pdo->prepare($sql_insert);
        $stmt_insert->execute([$icon, $details]);
        
        // Return a response indicating success
        echo json_encode(['success' => true]);
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline Management</title>
    <style>
        /* Center alignment */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Styles for forms */
        form {
            margin-bottom: 20px;
            text-align: center;
        }

        input[type="text"],
        select {
            margin-bottom: 10px;
            padding: 5px;
            width: 300px;
            height: 30px;
        }

        button {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            margin-right: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        #deleteButton {
            background-color: #dc3545;
        }

        #deleteButton:hover {
            background-color: #bd2130;
        }
    </style>
</head>
<body>
    <!-- Form for inserting new entry -->
    <form id="insertForm" method="POST">
        <input type="text" name="icon_insert" id="icon_insert" placeholder="Icon"><br>
        <input type="text" name="details_insert" id="details_insert" placeholder="Details"><br>
        <button type="submit" id="insertButton">Insert New Entry</button>
    </form>

    <script>
        // Add event listener to delete button
        document.getElementById('deleteButton').addEventListener('click', function() {
            if(confirm("Are you sure you want to delete this entry?")) {
                // Send a POST request to delete the entry
                var selectedId = document.getElementById('selectedId').value;
                fetch('', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id: selectedId, action: 'delete' })
                })
                .then(response => {
                    if(response.ok) {
                        // If deletion is successful, reload the page
                        location.reload();
                    } else {
                        console.error('Error deleting entry');
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        });

        // Add event listener to insert form
        document.getElementById('insertForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            var formData = new FormData(this);

            fetch('', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    // If insertion is successful, reload the page to reflect the changes
                    location.reload();
                } else {
                    console.error('Error:', response.statusText);
                }
            })
            .catch(error => console.error('Error:', error));
        });

    </script>
</body>
</html>
