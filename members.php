<?php
require_once 'db.php';
?>

<div class="container mt-5">
    <h2>Registered Members</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Skills</th>
                <th>Location</th>
                <th>Joined</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $db = getDBConnection();
            $stmt = $db->query("SELECT * FROM submissions ORDER BY submitted_at DESC");
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['full_name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['user_type']}</td>
                    <td>{$row['skills']}</td>
                    <td>{$row['location']}</td>
                    <td>{$row['submitted_at']}</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php require_once 'footer.php'; // Your existing footer ?>
