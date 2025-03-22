<?php
$correct_password = "admin123"; 
if (!isset($_POST['password']) || $_POST['password'] !== $correct_password) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Enter Password</title>
        <style>
            body { font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background: #f4f4f4; }
            .login-box { background: white; padding: 20px; box-shadow: 0px 0px 10px rgba(0,0,0,0.2); border-radius: 8px; text-align: center; }
            input { padding: 10px; width: 100%; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; }
            button { background: #28a745; color: white; padding: 10px 20px; border: none; cursor: pointer; }
            button:hover { background: #218838; }
        </style>
    </head>
    <body>
        <div class="login-box">
            <h2>Enter Password</h2>
            <form method="POST">
                <input type="password" name="password" placeholder="Enter password" required>
                <button type="submit">Submit</button>
            </form>
        </div>
    </body>
    </html>
    <?php
    exit;
}

include '../model/db.php';

$sql = "SELECT * FROM contacts ORDER BY submitted_at DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact List</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background: #28a745; color: white; }
    </style>
</head>
<body>

<h2>Submitted Contacts</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Concern</th>
        <th>Message</th>
        <th>Submitted At</th>
    </tr>
    <?php while ($contact = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $contact['id'] ?></td>
            <td><?= $contact['full_name'] ?></td>
            <td><?= $contact['email'] ?></td>
            <td><?= $contact['phone'] ?></td>
            <td><?= $contact['concern'] ?></td>
            <td><?= $contact['message'] ?></td>
            <td><?= $contact['submitted_at'] ?></td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
<?php mysqli_close($conn); ?>
