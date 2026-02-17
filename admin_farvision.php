<?php
// Database configuration
$db_host = 'localhost';
$db_user = 'root';
$db_pass = ''; // Change this to your real MySQL password
$db_name = 'farvision';

// Create connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submissions
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'add') {
            // Handle file upload
            $image_url = '';
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $upload_dir = 'uploads/';
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }

                $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                $allowed_mime_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                $file_extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

                if (!in_array($file_extension, $allowed_extensions, true)) {
                    $message = "<div class='error'>Invalid image format. Please upload JPG, PNG, GIF or WEBP.</div>";
                }

                $tmp_name = $_FILES['image']['tmp_name'];
                $mime_type = function_exists('mime_content_type') ? mime_content_type($tmp_name) : '';
                if ($message === '' && $mime_type !== '' && !in_array($mime_type, $allowed_mime_types, true)) {
                    $message = "<div class='error'>Invalid file type detected.</div>";
                }

                $new_filename = uniqid('', true) . '.' . $file_extension;
                $upload_path = $upload_dir . $new_filename;

                if ($message === '' && move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
                    $image_url = $upload_path;
                } elseif ($message === '') {
                    $message = "<div class='error'>Could not upload image.</div>";
                }
            }

            // Insert data (without PayPal link)
            if ($message === '') {
                $stmt = $conn->prepare("INSERT INTO kids (name, age, image_url, story, need, amount_needed) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sisssd",
                    $_POST['name'],
                    $_POST['age'],
                    $image_url,
                    $_POST['story'],
                    $_POST['need'],
                    $_POST['amount_needed']
                );

                if ($stmt->execute()) {
                    $message = "<div class='success'>Child profile added successfully!</div>";
                } else {
                    $message = "<div class='error'>Error adding profile.</div>";
                }
                $stmt->close();
            }
        }

        if ($_POST['action'] === 'delete' && isset($_POST['id'])) {
            $stmt = $conn->prepare("DELETE FROM kids WHERE id = ?");
            $stmt->bind_param("i", $_POST['id']);

            if ($stmt->execute()) {
                $message = "<div class='success'>Profile deleted successfully!</div>";
            }
            $stmt->close();
        }
    }
}

// Fetch all kids
$result = $conn->query("SELECT * FROM kids ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Kids in Need</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }
        .header {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .header h1 { color: #667eea; }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .form-section {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .form-section h2 {
            color: #667eea;
            margin-bottom: 1rem;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #333;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.7rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }
        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }
        .submit-btn {
            background: #667eea;
            color: white;
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: bold;
        }
        .submit-btn:hover {
            background: #5568d3;
        }
        .kids-list {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .kids-list h2 {
            color: #667eea;
            margin-bottom: 1rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #f8f9fa;
            font-weight: bold;
            color: #667eea;
        }
        .delete-btn {
            background: #dc3545;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .delete-btn:hover {
            background: #c82333;
        }
        .success {
            background: #d4edda;
            color: #155724;
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1rem;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1rem;
        }
        .kid-image-small {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
        }
        .paypal-container {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Admin Panel</h1>
        </div>

        <?php echo $message; ?>

        <div class="form-section">
            <h2>Add New Child Profile</h2>
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add">

                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" name="name" required>
                </div>

                <div class="form-group">
                    <label>Age:</label>
                    <input type="number" name="age" min="1" max="18" required>
                </div>

                <div class="form-group">
                    <label>Photo:</label>
                    <input type="file" name="image" accept="image/*" required>
                </div>

                <div class="form-group">
                    <label>Story:</label>
                    <textarea name="story" required placeholder="Tell the child's story..."></textarea>
                </div>

                <div class="form-group">
                    <label>Immediate Need:</label>
                    <textarea name="need" required placeholder="What does the child need right now?"></textarea>
                </div>

                <div class="form-group">
                    <label>Amount Needed ($):</label>
                    <input type="number" name="amount_needed" step="0.01" min="0" required>
                </div>

                <button type="submit" class="submit-btn">Add Child Profile</button>
            </form>
        </div>

        <div class="kids-list">
            <h2>Current Profiles</h2>
            <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Amount Needed</th>
                        <th>Donation</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($kid = $result->fetch_assoc()): ?>
                    <tr>
                        <td>
                            <img src="<?php echo htmlspecialchars($kid['image_url']); ?>"
                                 alt="<?php echo htmlspecialchars($kid['name']); ?>"
                                 class="kid-image-small">
                        </td>
                        <td><?php echo htmlspecialchars($kid['name']); ?></td>
                        <td><?php echo htmlspecialchars($kid['age']); ?></td>
                        <td>$<?php echo number_format($kid['amount_needed'], 2); ?></td>
                        <td>
                            <div id="paypal-container-XRTZJBF54JDU4-<?php echo $kid['id']; ?>" class="paypal-container"></div>
                            <script>
                              paypal.HostedButtons({
                                hostedButtonId: "XRTZJBF54JDU4",
                              }).render("#paypal-container-XRTZJBF54JDU4-<?php echo $kid['id']; ?>");
                            </script>
                        </td>
                        <td><?php echo date('M d, Y', strtotime($kid['created_at'])); ?></td>
                        <td>
                            <form method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this profile?')">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo $kid['id']; ?>">
                                <button type="submit" class="delete-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <?php else: ?>
            <p>No profiles found.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- PayPal SDK -->
    <script 
      src="https://www.paypal.com/sdk/js?client-id=BAAGTtH12ZTYRERcHjdmeSkGu8VeNuQVOFiroJO7RuN6u19hwkjpGA05BWUaH2Jgqed-wUvonziQxjJUZ8&components=hosted-buttons&disable-funding=venmo&currency=USD">
    </script>
</body>
</html>

<?php
$conn->close();
?>

    
