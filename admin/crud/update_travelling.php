<?php
include "../../include/config.php";

$sql = "SELECT id FROM `travelling`";
$stmt = $pdo->query($sql);
$travelling_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$id = $icon = $location = '';

$sql_latest = "SELECT * FROM `travelling` ORDER BY `id` DESC LIMIT 1";
$stmt_latest = $pdo->query($sql_latest);
$row = $stmt_latest->fetch(PDO::FETCH_ASSOC);

$id = $row['id'] ?? '';
$icon = $row['icon'] ?? '';
$location = $row['details'] ?? '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $icon = $_POST['icon'];
    $location = $_POST['details'];
    
    $sql_update = "UPDATE `travelling` SET `icon`=?, `details`=? WHERE `id`=?";
    $stmt_update = $pdo->prepare($sql_update);
    $stmt_update->execute([$icon, $location, $id]);
    
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
        <?php foreach($travelling_data as $data): ?>
            <option value="<?=$data['id']?>" <?php if($data['id'] == $id) echo "selected"; ?>><?=$data['id']?></option>
        <?php endforeach; ?>
    </select><br>
</form>

<form id="updateForm" method="POST">
    <input type="hidden" name="id" id="selectedId" value="<?= $id ?>">
    <input type="text" name="icon" id="icon" value="<?= $icon ?>"><br>
    <input type="text" name="details" id="details" value="<?= $location ?>"><br>
    <button type="submit">Update Entry</button>
    <button type="button" id="deleteButton">Delete Entry</button>
</form>

<form id="insertForm" method="POST">
    <input type="text" name="icon_insert" id="icon_insert" placeholder="Icon"><br>
    <input type="text" name="details_insert" id="details_insert" placeholder="Details"><br>
    <button type="submit" id="insertButton">Insert New Entry</button>
</form>

<script>
    document.getElementById('idSelect').addEventListener('change', function() {
        var selectedId = this.value;
        
        document.getElementById('selectedId').value = selectedId;

        fetchTimelineData(selectedId);
    });

    function fetchTimelineData(selectedId) {
        fetch('travelling_fetch_data.php?id=' + selectedId)
            .then(response => response.json())
            .then(data => {
                document.getElementById('icon').value = data.icon;
                document.getElementById('details').value = data.details;
            })
            .catch(error => console.error('Error:', error));
    }

    fetchTimelineData(document.getElementById('selectedId').value);

    document.getElementById('deleteButton').addEventListener('click', function() {
        if(confirm("Are you sure you want to delete this entry?")) {
            var selectedId = document.getElementById('selectedId').value;
            fetch('travelling_delete_entry.php', {
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

    document.getElementById('insertForm').addEventListener('submit', function(event) {
        event.preventDefault(); 

        var formData = new FormData(this);

        fetch('travelling_insert_entry.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
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
