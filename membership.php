<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $membership_type = $_POST["membership_type"];

    $sql = "INSERT INTO members
            (name, email, phone, membership_type)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssss",
        $name,
        $email,
        $phone,
        $membership_type
    );

    if ($stmt->execute()) {
        echo "<script>
                alert('Membership registered successfully!');
                window.location.href='index.html';
              </script>";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}

?>