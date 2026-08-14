<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DonutsTec · Mail Success (Deep Blue)</title>
  <!-- Google Fonts (Poppins & Inter) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <!-- Font Awesome 6 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(145deg, #eef2f7 0%, #d9e2ef 100%);
      font-family: 'Inter', sans-serif;
      padding: 1.5rem;
      margin: 0;
    }

    /* main card – deep blue & clean */
    .success-card {
      max-width: 650px;
      width: 100%;
      background: #ffffff;
      border-radius: 48px 48px 48px 48px;
      box-shadow: 0 25px 50px -12px rgba(10, 30, 60, 0.25), 0 8px 20px -8px rgba(20, 60, 120, 0.20);
      padding: 2.8rem 2.5rem;
      text-align: center;
      transition: all 0.2s ease;
      border: 1px solid rgba(40, 80, 140, 0.15);
      position: relative;
      overflow: hidden;
    }

    /* subtle deep blue accent decoration */
    .success-card::before {
      content: "✦ ✦ ✦";
      position: absolute;
      top: -10px;
      right: -10px;
      font-size: 3.5rem;
      opacity: 0.04;
      transform: rotate(10deg);
      letter-spacing: 12px;
      pointer-events: none;
      color: #1a3a6b;
    }

    .success-card::after {
      content: "◈ ◈ ◈";
      position: absolute;
      bottom: 5px;
      left: 5px;
      font-size: 2.8rem;
      opacity: 0.04;
      transform: rotate(-5deg);
      letter-spacing: 8px;
      pointer-events: none;
      color: #1a3a6b;
    }

    /* icon wrapper – deep blue background */
    .icon-wrapper {
      background: #1a3a6b;
      width: 96px;
      height: 96px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1.6rem;
      box-shadow: 0 10px 20px -8px rgba(20, 50, 100, 0.35);
      transition: transform 0.2s;
    }

    .icon-wrapper i {
      font-size: 3.6rem;
      color: #ffffff;
      filter: drop-shadow(0 4px 6px rgba(0, 20, 50, 0.3));
    }

    /* brand name */
    .brand {
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
      font-size: 1.9rem;
      letter-spacing: -0.5px;
      color: #0a1e3c;
      margin-bottom: 0.25rem;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
      flex-wrap: wrap;
    }

    .brand span {
      background: #dce6f5;
      padding: 0.1rem 0.8rem;
      border-radius: 60px;
      font-size: 1.2rem;
      font-weight: 600;
      color: #1a3a6b;
      letter-spacing: -0.3px;
    }

    .sub-headline {
      font-size: 1rem;
      color: #2a4a7a;
      font-weight: 400;
      margin-top: -0.2rem;
      margin-bottom: 1.8rem;
      background: #e6eefa;
      display: inline-block;
      padding: 0.2rem 1.2rem;
      border-radius: 40px;
      letter-spacing: 0.3px;
      backdrop-filter: blur(4px);
      border: 1px solid rgba(30, 70, 140, 0.08);
    }

    /* main success message */
    .success-title {
      font-family: 'Poppins', sans-serif;
      font-weight: 600;
      font-size: 2.2rem;
      color: #0a1e3c;
      margin-top: 0.2rem;
      margin-bottom: 0.5rem;
      line-height: 1.2;
    }

    .success-title i {
      color: #1a4a8a;
      margin-right: 8px;
    }

    .success-message {
      font-size: 1.1rem;
      line-height: 1.6;
      color: #1f3b5c;
      max-width: 450px;
      margin: 0.5rem auto 1.2rem;
      background: #edf3fc;
      padding: 0.8rem 1.2rem;
      border-radius: 60px;
      border: 1px solid #c4d5ed;
      font-weight: 450;
    }

    .success-message i {
      color: #1a4a8a;
      margin: 0 4px;
    }

    /* mail chip – deep blue accents */
    .mail-chip {
      background: #e3ebf7;
      border-radius: 60px;
      padding: 0.5rem 1.5rem;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      font-size: 1rem;
      color: #0a1e3c;
      border: 1px solid #b6cee9;
      margin: 0.5rem 0 1.8rem;
      font-weight: 500;
      box-shadow: 0 2px 6px rgba(20, 60, 120, 0.08);
    }

    .mail-chip i {
      color: #1a4a8a;
      font-size: 1.2rem;
    }

    .mail-chip span {
      background: white;
      padding: 0.2rem 0.9rem;
      border-radius: 40px;
      font-weight: 600;
      color: #0a2a5a;
      font-size: 0.9rem;
      border: 1px solid #b0cbe8;
    }

    /* action buttons – deep blue primary */
    .action-group {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: center;
      gap: 1rem;
      margin: 2rem 0 1rem;
    }

    .btn-primary {
      background: #1a3a6b;
      border: none;
      padding: 0.9rem 2.5rem;
      border-radius: 60px;
      font-family: 'Inter', sans-serif;
      font-weight: 600;
      font-size: 1.05rem;
      color: white;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      box-shadow: 0 8px 18px -6px #1a3a6b70;
      transition: 0.2s ease;
      cursor: pointer;
      border: 1px solid #2a5a8a;
      text-decoration: none;
      letter-spacing: 0.2px;
    }

    .btn-primary i {
      font-size: 1.1rem;
    }

    .btn-primary:hover {
      background: #0f2a50;
      transform: scale(1.02);
      box-shadow: 0 12px 24px -8px #0f2a50b0;
      border-color: #0f2a50;
    }

    .btn-secondary {
      background: transparent;
      border: 1.5px solid #9bb9dc;
      padding: 0.9rem 2rem;
      border-radius: 60px;
      font-family: 'Inter', sans-serif;
      font-weight: 500;
      font-size: 1rem;
      color: #1a3a5a;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: 0.2s ease;
      cursor: pointer;
      text-decoration: none;
      background: rgba(235, 244, 255, 0.6);
      backdrop-filter: blur(2px);
    }

    .btn-secondary i {
      color: #1a4a7a;
      font-size: 1rem;
    }

    .btn-secondary:hover {
      background: #d4e2f5;
      border-color: #6a8eb8;
      transform: translateY(-2px);
    }

    .footer-note {
      margin-top: 2.2rem;
      font-size: 0.9rem;
      color: #3a5a7a;
      border-top: 1px dashed #b6cee9;
      padding-top: 1.8rem;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 12px;
      flex-wrap: wrap;
      letter-spacing: 0.2px;
    }

    .footer-note i {
      color: #2a5a8a;
      font-size: 0.9rem;
    }

    .footer-note a {
      color: #1a4a7a;
      font-weight: 500;
      text-decoration: none;
      border-bottom: 1px dotted #8aafd0;
      transition: 0.15s;
    }

    .footer-note a:hover {
      color: #0a2a50;
      border-bottom: 1px solid #0a2a50;
    }

    /* responsiveness */
    @media (max-width: 550px) {
      .success-card {
        padding: 2rem 1.5rem;
        border-radius: 36px;
      }
      .success-title {
        font-size: 1.8rem;
      }
      .brand {
        font-size: 1.6rem;
      }
      .icon-wrapper {
        width: 78px;
        height: 78px;
      }
      .icon-wrapper i {
        font-size: 2.8rem;
      }
      .action-group {
        flex-direction: column;
        align-items: stretch;
      }
      .btn-primary, .btn-secondary {
        justify-content: center;
        padding: 0.8rem 1.2rem;
      }
      .mail-chip {
        flex-wrap: wrap;
        justify-content: center;
        padding: 0.5rem 1.2rem;
      }
      .success-message {
        font-size: 1rem;
        padding: 0.5rem 1rem;
        border-radius: 40px;
      }
    }

    @media (max-width: 400px) {
      .success-card {
        padding: 1.8rem 1rem;
      }
      .brand span {
        font-size: 1rem;
        padding: 0 0.6rem;
      }
    }

    /* tiny float animation on donut */
    .donut-emoji {
      display: inline-block;
      animation: float 3s ease-in-out infinite;
    }
    @keyframes float {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-4px); }
      100% { transform: translateY(0px); }
    }
  </style>
</head>
<body>
  <div class="success-card">

    <!-- icon: deep blue background + check -->
    <div class="icon-wrapper">
      <i class="fas fa-check-circle"></i>
    </div>

    <!-- brand header -->
    <div class="brand">
      🍩 DonutsTec <span>·</span> 
    </div>
    <div class="sub-headline">
      <i class="fas fa-envelope-open-text" style="margin-right: 6px; opacity: 0.8;"></i> mail sent
    </div>

    <!-- main success title -->
    <h1 class="success-title">
      <i class="fas fa-paper-plane" style="font-size: 2rem;"></i> All set!
    </h1>

    <!-- friendly confirmation message -->
    <div class="success-message">
      <i class="fas fa-check-circle" style="color: #1a4a8a;"></i> Your message was received 
      <i class="fas fa-heart" style="color: #2a5a8a; font-size: 0.9rem;"></i> 
      we’ll reply within 24h.
    </div>

    <!-- mail chip : shows the contact email (static) with deep blue accents -->
    <div class="mail-chip">
      <i class="fas fa-at"></i> 
      <span>contact@donutstec.com</span>
      <i class="fas fa-arrow-right" style="font-size: 0.8rem; opacity: 0.6;"></i>
      <span style="background: #e3ebf7; border: none; font-weight: 400;">we got it</span>
    </div>

    <!-- action buttons -->
    <div class="action-group">
      <a href="/contact" class="btn-primary">
        <i class="fas fa-arrow-right"></i> Go to inbox
      </a>
      <a href="/" class="btn-secondary">
        <i class="fas fa-home"></i> Home
      </a>
    </div>

    <!-- footer note with deep blue touches -->
    <div class="footer-note">
      <i class="fas fa-clock"></i> 
      <span>Response in <strong>~ 2h</strong> during business hours</span>
      <i class="fas fa-circle" style="font-size: 0.3rem; opacity: 0.3;"></i>
      <a href="/support">
        <i class="fas fa-phone-alt"></i> support
      </a>
      <i class="fas fa-circle" style="font-size: 0.3rem; opacity: 0.3;"></i>
      <span class="donut-emoji">🍩</span>
    </div>

    <!-- subtle tracking id -->
    <div style="margin-top: 1.2rem; font-size: 0.7rem; color: #5a7a9a; letter-spacing: 1px; opacity: 0.7;">
      <i class="fas fa-hashtag" style="font-size: 0.6rem;"></i> <?php echo date("Y:m:d:sa")?>
    </div>
  </div>

  <script>
    (function() {
      console.log('🍩 DonutsTec · Mail success page (deep blue) loaded!');
    })();
  </script>
</body>
</html>