<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $sql = "INSERT INTO contacts
            (name, email, message)
            VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "sss",
        $name,
        $email,
        $message
    );

    if ($stmt->execute()) {

        echo "<script>
                alert('Message sent successfully!');
                window.location.href='index.html';
              </script>";

    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}

?>