<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medium Clone</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #fafafa;
        }
        /* Hero Section */
        .hero-section {
            text-align: center;
            padding: 100px 20px;
            position: relative;
            overflow: hidden;
        }
        .hero-title {
            font-size: 4rem;
            font-weight: bold;
            line-height: 1.2;
        }
        .hero-subtitle {
            margin-top: 10px;
            font-size: 1.25rem;
            color: #666;
        }
        .btn-start {
            margin-top: 20px;
            font-size: 1rem;
            padding: 10px 20px;
            border-radius: 20px;
        }
        /* Background image for green element */
        .green-element {
            position: absolute;
            top: 20%;
            right: 10%;
            width: 150px;
            height: 150px;
            background: #0f0;
            border-radius: 50%;
            z-index: -1;
        }
        .image-element {
            position: absolute;
            top: 50%;
            right: 0;
            transform: translate(-10%, -50%);
            z-index: -1;
            max-width: 300px;
        }
        /* Footer */
        .footer {
            margin-top: 100px;
            font-size: 0.875rem;
            color: #999;
            text-align: center;
        }
        .footer a {
            color: #999;
            text-decoration: none;
            margin: 0 10px;
        }
        .footer a:hover {
            color: #333;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Medium</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Our story</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Membership</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Write</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sign in</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-dark btn-sm ms-3" href="#">Get started</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section">
        <h1 class="hero-title">Human stories & ideas</h1>
        <p class="hero-subtitle">A place to read, write, and deepen your understanding</p>
        <a href="#" class="btn btn-dark btn-start">Start reading</a>

        <!-- Green Element -->
        <div class="green-element"></div>

        <!-- Placeholder Image -->
        <img src="https://via.placeholder.com/300x300?text=Image" alt="Hand Drawing" class="image-element">
    </div>

    <!-- Footer -->
    <div class="footer py-4">
        <a href="#">Help</a>
        <a href="#">Status</a>
        <a href="#">About</a>
        <a href="#">Careers</a>
        <a href="#">Press</a>
        <a href="#">Blog</a>
        <a href="#">Privacy</a>
        <a href="#">Terms</a>
        <a href="#">Text to speech</a>
        <a href="#">Teams</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
