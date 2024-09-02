<?php 
// Form handling logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Back-end validation
    if (empty($_POST['fullName'])) {
        $errors[] = 'Full Name is required.';
    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Valid email is required.';
    }

    if (empty($_POST['phone']) || !preg_match('/^\+?[0-9]{7,}$/', $_POST['phone'])) {
        $errors[] = 'Valid phone number is required.';
    }

    if (empty($_POST['country'])) {
        $errors[] = 'Country selection is required.';
    }

    if (empty($_POST['message'])) {
        $errors[] = 'Message is required.';
    }

    // If no errors, save the form data into the database
    if (empty($errors)) {
        $fullName = $conn->real_escape_string($_POST['fullName']);
        $email = $conn->real_escape_string($_POST['email']);
        $phone = $conn->real_escape_string($_POST['phone']);
        $country = $conn->real_escape_string($_POST['country']);
        $message = $conn->real_escape_string($_POST['message']);

        $sql = "INSERT INTO contacts (full_name, email, phone, country, message)
                VALUES ('$fullName', '$email', '$phone', '$country', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Form submitted successfully!');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
    }
}
$conn->close();
?>