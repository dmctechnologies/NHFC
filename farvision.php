<?php
/***************************************
 * Hope for Kids - Child Sponsorship Page
 * Author: Maregesi Charles Nyamajeje
 * -------------------------------------
 * Description:
 * Displays all children fetched from the
 * database with donation links and stories.
 ***************************************/

// Database configuration
$db_host = 'localhost';
$db_user = 'root';
$db_pass = ''; // Change this if your MySQL root has a password
$db_name = 'farvision';

// Create connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed. Please try again later.");
}

// Fetch all kids from database
$sql = "SELECT * FROM kids ORDER BY created_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hope for Kids - Help Children in Need</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        .header {
            background: rgba(255, 255, 255, 0.95);
            padding: 2rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .header h1 {
            text-align: center;
            color: #667eea;
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .header p {
            text-align: center;
            color: #666;
            font-size: 1.1rem;
        }

        .main-content { padding: 3rem 0; }

        .kids-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .kid-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .kid-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }

        .kid-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .kid-content {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .kid-name {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .kid-age {
            color: #667eea;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .kid-story {
            color: #666;
            margin-bottom: 1.5rem;
            line-height: 1.8;
            flex-grow: 1;
        }

        .kid-need {
            background: #fff3cd;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            border-left: 4px solid #ffc107;
        }

        .kid-need strong {
            color: #856404;
            display: block;
            margin-bottom: 0.5rem;
        }

        .kid-need p {
            color: #856404;
            font-size: 0.95rem;
        }

        .donation-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 2px solid #f0f0f0;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .amount-needed {
            font-size: 1.2rem;
            color: #667eea;
            font-weight: bold;
        }

        .paypal-box {
            text-align: right;
            width: 100%;
        }

        .footer {
            background: rgba(255, 255, 255, 0.95);
            padding: 2rem 0;
            text-align: center;
            margin-top: 3rem;
        }

        .footer p { color: #666; }

        .no-kids {
            text-align: center;
            padding: 3rem;
            background: white;
            border-radius: 15px;
            color: #666;
        }

        @media (max-width: 768px) {
            .kids-grid { grid-template-columns: 1fr; }
            .header h1 { font-size: 2rem; }
            .donation-section { flex-direction: column; align-items: flex-start; }
            .paypal-box { text-align: left; }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <h1>🌟 Far Vision Children's School 🌟</h1>
            <p>Every child deserves a chance at a better life,help support their dreams.</p>
        </div>
    </header>

    <main class="main-content">
        <div class="container">
            <div class="kids-grid">
                <?php
                if ($result && $result->num_rows > 0) {
                    $counter = 1;
                    while($kid = $result->fetch_assoc()) {
                        ?>
                        <div class="kid-card">
                            <img src="<?php echo htmlspecialchars($kid['image_url']); ?>" 
                                 alt="<?php echo htmlspecialchars($kid['name']); ?>" 
                                 class="kid-image"
                                 onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22400%22 height=%22300%22%3E%3Crect fill=%22%23667eea%22 width=%22400%22 height=%22300%22/%3E%3Ctext fill=%22white%22 font-family=%22Arial%22 font-size=%2224%22 x=%22200%22 y=%22150%22 text-anchor=%22middle%22%3ENo Image%3C/text%3E%3C/svg%3E'">
                            
                            <div class="kid-content">
                                <h2 class="kid-name"><?php echo htmlspecialchars($kid['name']); ?></h2>
                                <p class="kid-age">Age: <?php echo htmlspecialchars($kid['age']); ?> years old</p>
                                <p class="kid-story"><?php echo nl2br(htmlspecialchars($kid['story'])); ?></p>
                                
                                <div class="kid-need">
                                    <strong>Immediate Need:</strong>
                                    <p><?php echo nl2br(htmlspecialchars($kid['need'])); ?></p>
                                </div>

                                <div class="donation-section">
                                    <span class="amount-needed">
                                        Goal: $<?php echo number_format($kid['amount_needed'], 2); ?>
                                    </span>
                                    <div class="paypal-box">
                                        <div id="paypal-container-<?php echo $counter; ?>"></div>
                                        <script>
                                            paypal.HostedButtons({
                                                hostedButtonId: "XRTZJBF54JDU4"
                                            }).render("#paypal-container-<?php echo $counter; ?>");
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $counter++;
                    }
                } else {
                    echo '<div class="no-kids"><h2>No children profiles available at the moment.</h2><p>Please check back later.</p></div>';
                }
                ?>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Far Vision Children's School. Making a difference, one child at a time.</p>
            <p>All donations go directly to help the children in need.</p>
        </div>
    </footer>

    <!-- PayPal SDK Script (Global) -->
    <script 
      src="https://www.paypal.com/sdk/js?client-id=BAAGTtH12ZTYRERcHjdmeSkGu8VeNuQVOFiroJO7RuN6u19hwkjpGA05BWUaH2Jgqed-wUvonziQxjJUZ8&components=hosted-buttons&disable-funding=venmo&currency=USD">
    </script>
</body>
</html>

<?php
$conn->close();
?>
