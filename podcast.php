<?php
// podcast.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NHFC Podcast</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }
        header {
            background: #6200ea;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        header h1 {
            margin: 0;
            font-size: 2.5rem;
        }
        header p {
            margin: 5px 0 0;
            font-size: 1.2rem;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 15px;
        }
        .podcast {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .podcast-item {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            flex: 1 1 calc(33.333% - 20px);
            min-width: 300px;
        }
        .podcast-item img {
            width: 100%;
            height: auto;
        }
        .podcast-content {
            padding: 15px;
        }
        .podcast-content h3 {
            margin: 0 0 10px;
            font-size: 1.5rem;
            color: #6200ea;
        }
        .podcast-content p {
            margin: 0 0 15px;
            font-size: 1rem;
            line-height: 1.5;
        }
        .podcast-content a {
            display: inline-block;
            padding: 10px 15px;
            background: #6200ea;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
        }
        .podcast-content a:hover {
            background: #3700b3;
        }
        footer {
            text-align: center;
            padding: 20px 0;
            background: #333;
            color: #fff;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>NHFC Podcast</h1>
        <p>Inspiring Stories, Life Lessons, and More</p>
    </header>
    <div class="container">
        <div class="podcast">
            <div class="podcast-item">
                <img src="https://via.placeholder.com/300x200" alt="Podcast Episode 1">
                <div class="podcast-content">
                    <h3>Episode 1: The Journey Begins</h3>
                    <p>Join us as we kick off our podcast series with an inspiring story of resilience and growth.</p>
                    <a href="#">Listen Now</a>
                </div>
            </div>
            <div class="podcast-item">
                <img src="https://via.placeholder.com/300x200" alt="Podcast Episode 2">
                <div class="podcast-content">
                    <h3>Episode 2: Overcoming Challenges</h3>
                    <p>Discover how to tackle life's challenges with courage and determination in this episode.</p>
                    <a href="#">Listen Now</a>
                </div>
            </div>
            <div class="podcast-item">
                <img src="https://via.placeholder.com/300x200" alt="Podcast Episode 3">
                <div class="podcast-content">
                    <h3>Episode 3: Building Stronger Communities</h3>
                    <p>Explore the power of community and how we can make a difference together.</p>
                    <a href="#">Listen Now</a>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> NHFC Podcast. All Rights Reserved.</p>
    </footer>
</body>
</html>