<?php
include "../../include/config.php";

$sql = "SELECT id FROM `timeline`";
$stmt = $pdo->query($sql);
$timeline_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$id = $icon = $degree = $institude = $passing_year = '';

$sql_latest = "SELECT * FROM `timeline` ORDER BY `id` DESC LIMIT 1";
$stmt_latest = $pdo->query($sql_latest);
$row = $stmt_latest->fetch(PDO::FETCH_ASSOC);

$id = $row['id'] ?? '';
$icon = $row['icon'] ?? '';
$degree = $row['degree'] ?? '';
$institude = $row['institude'] ?? '';
$passing_year = $row['passing_year'] ?? '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $icon = $_POST['icon'];
    $degree = $_POST['degree'];
    $institude = $_POST['institude'];
    $passing_year = $_POST['passing_year'];
    
    $sql_update = "UPDATE `timeline` SET `icon`=?, `degree`=?, `institude`=?, `passing_year`=? WHERE `id`=?";
    $stmt_update = $pdo->prepare($sql_update);
    $stmt_update->execute([$icon, $degree, $institude, $passing_year, $id]);
    
    header("location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline Management</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
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
    <form id="idForm" method="POST">
        <select id="idSelect" name="id">
            <?php foreach($timeline_data as $data): ?>
                <option value="<?=$data['id']?>" <?php if($data['id'] == $id) echo "selected"; ?>><?=$data['id']?></option>
            <?php endforeach; ?>
        </select><br>
    </form>

    <form id="updateForm" method="POST">
        <input type="hidden" name="id" id="selectedId" value="<?= $id ?>">
        <input type="text" name="icon" id="icon" value="<?= $icon ?>"><br>
        <input type="text" name="degree" id="degree" value="<?= $degree ?>"><br>
        <input type="text" name="institude" id="institude" value="<?= $institude ?>"><br>
        <input type="text" name="passing_year" id="passing_year" value="<?= $passing_year ?>"><br>
        <button type="submit">Update Timeline Entry</button>
        <button type="button" id="deleteButton">Delete Timeline Entry</button>
    </form>

    <form id="insertForm" method="POST">
        <input type="text" name="icon_insert" id="icon_insert" placeholder="Icon"><br>
        <input type="text" name="degree_insert" id="degree_insert" placeholder="Degree"><br>
        <input type="text" name="institude_insert" id="institude_insert" placeholder="Institute"><br>
        <input type="text" name="passing_year_insert" id="passing_year_insert" placeholder="Passing Year"><br>
        <button type="submit" id="insertButton">Insert New Entry</button>
    </form>

    <script>
        document.getElementById('idSelect').addEventListener('change', function() {
            var selectedId = this.value;
            document.getElementById('selectedId').value = selectedId;
            fetchTimelineData(selectedId);
        });

        function fetchTimelineData(selectedId) {
            fetch('fetch_data.php?id=' + selectedId)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('icon').value = data.icon;
                    document.getElementById('degree').value = data.degree;
                    document.getElementById('institude').value = data.institude;
                    document.getElementById('passing_year').value = data.passing_year;
                })
                .catch(error => console.error('Error:', error));
        }

        fetchTimelineData(document.getElementById('selectedId').value);

        document.getElementById('deleteButton').addEventListener('click', function() {
            if(confirm("Are you sure you want to delete this entry?")) {
                var selectedId = document.getElementById('selectedId').value;
                fetch('delete_entry.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id: selectedId })
                })
                .then(response => {
                    if(response.ok) {
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

            fetch('insert_entry.php', {
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
