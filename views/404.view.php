<?php require "partials/header.php"; ?>


    <style>
        body {
            min-height: 100vh;
            background: #f8f9fa;
        }

        .error-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .error-code {
            font-size: 120px;
            font-weight: 800;
            line-height: 1;
            color: #212529;
        }

        .error-icon {
            font-size: 70px;
        }

        .error-card {
            max-width: 650px;
            padding: 50px 30px;
        }
    </style>
</head>

<body>

    <div class="container error-container">
        <div class="card border-0 shadow-sm error-card w-100">

            <!-- Icon -->
            <div class="error-icon mb-3">
                🔍
            </div>

            <!-- Error Code -->
            <h1 class="error-code">404</h1>

            <!-- Message -->
            <h2 class="fw-bold mt-3">Page Not Found</h2>

            <p class="text-muted mb-4">
                Sorry, the page you are looking for does not exist,
                has been moved, or is temporarily unavailable.
            </p>

            <!-- Buttons -->
            <div class="d-flex justify-content-center gap-2 flex-wrap">

                <a href="/" class="btn btn-primary px-4">
                    <i class="bi bi-house-door"></i> Go Home
                </a>

                <button onclick="history.back()" class="btn btn-outline-secondary px-4">
                    Go Back
                </button>

            </div>

        </div>
    </div>

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >


<?php 
require "partials/scripts.php";
