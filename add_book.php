```php
<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = trim($_POST["title"]);
    $author = trim($_POST["author"]);
    $category = trim($_POST["category"]);
    $quantity = (int) $_POST["quantity"];

    if ($title == "" || $author == "" || $category == "" || $quantity < 1) {
        die("Please enter all book details correctly.");
    }

    $sql = "INSERT INTO books (title, author, category, quantity)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("SQL Prepare Error: " . $conn->error);
    }

    $stmt->bind_param("sssi", $title, $author, $category, $quantity);

    if ($stmt->execute()) {
        echo "<script>
                alert('Book added successfully!');
                window.location.href = 'books.php';
              </script>";
        exit;
    } else {
        echo "Book Insert Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Book</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
        }

        form {
            width: 400px;
            margin: 80px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #172554;
        }

        input,
        select,
        button {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        button {
            background: #172554;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background: #1e3a8a;
        }
    </style>
</head>

<body>

<form method="POST" action="">

    <h2>Add New Book</h2>

    <input
        type="text"
        name="title"
        placeholder="Book Title"
        required
    >

    <input
        type="text"
        name="author"
        placeholder="Author"
        required
    >

    <select name="category" required>
        <option value="">Select Category</option>
        <option value="Computer Science">Computer Science</option>
        <option value="Literature">Literature</option>
        <option value="Science">Science</option>
        <option value="Management">Management</option>
    </select>

    <input
        type="number"
        name="quantity"
        placeholder="Quantity"
        min="1"
        required
    >

    <button type="submit">
        Add Book
    </button>

</form>

</body>
</html>
```
