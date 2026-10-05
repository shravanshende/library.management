```php
<?php

include "db.php";

$result = $conn->query("SELECT * FROM books");

if (!$result) {
    die("Database Error: " . $conn->error);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Library Books</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            padding: 40px;
        }

        h1 {
            text-align: center;
            color: #172554;
        }

        .top {
            width: 90%;
            margin: 20px auto;
            text-align: right;
        }

        .add-btn {
            display: inline-block;
            background: #172554;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .add-btn:hover {
            background: #1e3a8a;
        }

        table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        th,
        td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #172554;
            color: white;
        }

        tr:hover {
            background: #f1f5f9;
        }

        .no-books {
            text-align: center;
            padding: 25px;
            font-size: 18px;
        }

    </style>

</head>

<body>

<h1>Library Books</h1>

<div class="top">
    <a href="add_book.php" class="add-btn">+ Add New Book</a>
</div>

<table>

<tr>
    <th>ID</th>
    <th>Book Title</th>
    <th>Author</th>
    <th>Category</th>
    <th>Quantity</th>
</tr>

<?php

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

?>

<tr>

    <td><?php echo htmlspecialchars($row["id"]); ?></td>

    <td><?php echo htmlspecialchars($row["title"]); ?></td>

    <td><?php echo htmlspecialchars($row["author"]); ?></td>

    <td><?php echo htmlspecialchars($row["category"]); ?></td>

    <td><?php echo htmlspecialchars($row["quantity"]); ?></td>

</tr>

<?php

    }

} else {

?>

<tr>
    <td colspan="5" class="no-books">
        No books available.
    </td>
</tr>

<?php

}

?>

</table>

</body>
</html>

<?php
$conn->close();
?>
```
