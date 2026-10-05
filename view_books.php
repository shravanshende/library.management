<?php
include "db.php";

$result = $conn->query("SELECT * FROM books");

if (!$result) {
    die("Error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Books</title>
</head>
<body>

<h1>Library Books</h1>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Author</th>
    <th>Category</th>
    <th>Quantity</th>
</tr>

<?php while ($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['title']; ?></td>
    <td><?php echo $row['author']; ?></td>
    <td><?php echo $row['category']; ?></td>
    <td><?php echo $row['quantity']; ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>
