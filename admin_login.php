<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EliteFootball</title>
      <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Arial', sans-serif;
            background: #0a0a0a;
            color: #ffffff;
            overflow-x: hidden;
            line-height: 1.6;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 30px;
        }

        /* Header */
        header {
            background: rgba(0, 0, 0, 0.95);
            backdrop-filter: blur(20px);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 0;
        }

        .logo {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #d4af37 0%, #f7ef8a 50%, #d4af37 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -1px;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 3rem;
        }

        .nav-links a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 500;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background: linear-gradient(90deg, #d4af37, #f7ef8a);
            transition: width 0.3s ease;
        }

        .nav-links a:hover {
            color: #d4af37;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .admin-btn {
            background: linear-gradient(135deg, #d4af37 0%, #f7ef8a 50%, #d4af37 100%);
            color: #0a0a0a;
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.9rem;
        }

        .admin-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(212, 175, 55, 0.4);
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, rgba(0,0,0,0.8), rgba(10,10,10,0.9)), 
                        radial-gradient(circle at 30% 50%, rgba(212, 175, 55, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 70% 50%, rgba(212, 175, 55, 0.05) 0%, transparent 50%);
            position: relative;
            margin-top: 100px;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1400 800"><defs><pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="%23d4af37" stroke-width="0.5" opacity="0.1"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }

        .hero-content {
            text-align: center;
            max-width: 900px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-size: 5rem;
            margin-bottom: 1.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #ffffff 0%, #d4af37 50%, #ffffff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.2;
            letter-spacing: -2px;
        }

        .hero .subtitle {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            color: #cccccc;
            font-weight: 300;
            letter-spacing: 0.5px;
        }

        .hero .description {
            font-size: 1.1rem;
            margin-bottom: 3rem;
            color: #999999;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-buttons {
            display: flex;
            gap: 2rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: linear-gradient(135deg, #d4af37 0%, #f7ef8a 50%, #d4af37 100%);
            color: #0a0a0a;
            padding: 1.2rem 3rem;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 40px rgba(212, 175, 55, 0.4);
        }

        .btn-secondary {
            background: transparent;
            color: #d4af37;
            padding: 1.2rem 3rem;
            border: 2px solid #d4af37;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-secondary:hover {
            background: #d4af37;
            color: #0a0a0a;
            transform: translateY(-3px);
        }

        /* Matches Section */
        .matches {
            padding: 6rem 0;
            background: linear-gradient(135deg, #111111 0%, #0a0a0a 100%);
            position: relative;
        }

        .matches::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 80%, rgba(212, 175, 55, 0.03) 0%, transparent 50%);
        }

        .section-title {
            text-align: center;
            font-size: 3.5rem;
            margin-bottom: 1rem;
            font-weight: 700;
            background: linear-gradient(135deg, #d4af37 0%, #f7ef8a 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -1px;
        }

        .section-subtitle {
            text-align: center;
            font-size: 1.2rem;
            margin-bottom: 4rem;
            color: #888888;
            font-weight: 300;
        }

        .matches-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 3rem;
            margin-top: 3rem;
        }

        .match-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.02) 0%, rgba(255, 255, 255, 0.01) 100%);
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 24px;
            padding: 3rem;
            text-align: center;
            transition: all 0.4s ease;
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
        }

        .match-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.05) 0%, transparent 50%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .match-card:hover::before {
            opacity: 1;
        }

        .match-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 60px rgba(212, 175, 55, 0.15);
            border-color: rgba(212, 175, 55, 0.4);
        }

        .teams {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            position: relative;
            z-index: 2;
        }

        .team {
            text-align: center;
            flex: 1;
        }

        .team-logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #d4af37 0%, #f7ef8a 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.8rem;
            font-weight: 700;
            color: #0a0a0a;
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.3);
        }

        .team-name {
            font-size: 1.3rem;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 0.5rem;
        }

        .vs {
            font-size: 1.5rem;
            font-weight: 700;
            color: #d4af37;
            margin: 0 2rem;
            position: relative;
        }

        .vs::before,
        .vs::after {
            content: '';
            position: absolute;
            width: 40px;
            height: 2px;
            background: linear-gradient(90deg, transparent, #d4af37, transparent);
            top: 50%;
            transform: translateY(-50%);
        }

        .vs::before {
            left: -60px;
        }

        .vs::after {
            right: -60px;
        }

        .match-info {
            margin: 2rem 0;
            color: #cccccc;
            position: relative;
            z-index: 2;
        }

        .match-date {
            font-size: 1.1rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .match-venue {
            font-size: 0.9rem;
            color: #888888;
        }

        .odds {
            display: flex;
            justify-content: space-around;
            margin-top: 2rem;
            gap: 1rem;
            position: relative;
            z-index: 2;
        }

        .odd {
            background: rgba(255, 255, 255, 0.03);
            padding: 1rem 1.5rem;
            border-radius: 16px;
            border: 1px solid rgba(212, 175, 55, 0.2);
            cursor: pointer;
            transition: all 0.3s ease;
            flex: 1;
            min-width: 0;
        }

        .odd:hover {
            background: rgba(212, 175, 55, 0.1);
            transform: translateY(-2px);
            border-color: rgba(212, 175, 55, 0.4);
        }

        .odd-label {
            font-size: 0.9rem;
            color: #888888;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .odd-value {
            font-size: 1.4rem;
            font-weight: 700;
            color: #d4af37;
        }

        /* Contact Form Section */
        .contact-section {
            padding: 6rem 0;
            background: linear-gradient(135deg, #0a0a0a 0%, #111111 100%);
            position: relative;
        }

        .contact-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 80% 20%, rgba(212, 175, 55, 0.03) 0%, transparent 50%);
        }

        .contact-container {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .contact-form {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.02) 0%, rgba(255, 255, 255, 0.01) 100%);
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 24px;
            padding: 4rem;
            backdrop-filter: blur(10px);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-group label {
            margin-bottom: 0.8rem;
            color: #d4af37;
            font-weight: 600;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 12px;
            padding: 1rem 1.5rem;
            color: #ffffff;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #d4af37;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #666666;
        }

        .submit-btn {
            background: linear-gradient(135deg, #d4af37 0%, #f7ef8a 50%, #d4af37 100%);
            color: #0a0a0a;
            padding: 1.2rem 3rem;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 1rem;
            width: 100%;
            margin-top: 1rem;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(212, 175, 55, 0.4);
        }

        /* Admin Portal */
        .admin-portal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            backdrop-filter: blur(10px);
            z-index: 2000;
            overflow-y: auto;
        }

        .admin-content {
            max-width: 900px;
            margin: 2rem auto;
            padding: 3rem;
            background: linear-gradient(135deg, rgba(17, 17, 17, 0.95), rgba(10, 10, 10, 0.95));
            border-radius: 24px;
            border: 1px solid rgba(212, 175, 55, 0.3);
            backdrop-filter: blur(20px);
        }
        .admin_login-form{
            max-width: 900px;
            margin: 2rem auto;
            padding: 3rem;
            background: linear-gradient(135deg, rgba(17, 17, 17, 0.95), rgba(10, 10, 10, 0.95));
            border-radius: 24px;
            border: 1px solid rgba(212, 175, 55, 0.3);
            backdrop-filter: blur(20px);
        }

        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3rem;
        }

        .admin-title {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #d4af37 0%, #f7ef8a 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .close-btn {
            background: #ff4757;
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 12px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .close-btn:hover {
            background: #ff3838;
            transform: scale(1.05);
        }

        .admin-form {
            display: grid;
            gap: 2rem;
        }

        .success-message {
            background: linear-gradient(135deg, #4CAF50, #45a049);
            color: white;
            padding: 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            text-align: center;
            display: none;
            font-weight: 600;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, #0a0a0a 0%, #111111 100%);
            padding: 4rem 0 2rem;
            border-top: 1px solid rgba(212, 175, 55, 0.2);
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-section h3 {
            color: #d4af37;
            margin-bottom: 1.5rem;
            font-size: 1.3rem;
            font-weight: 600;
        }

        .footer-section p,
        .footer-section a {
            color: #cccccc;
            text-decoration: none;
            margin-bottom: 0.8rem;
            display: block;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: #d4af37;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(212, 175, 55, 0.1);
            color: #888888;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 0 20px;
            }

            .hero h1 {
                font-size: 3rem;
            }

            .hero .subtitle {
                font-size: 1.2rem;
            }

            .nav-links {
                display: none;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .teams {
                flex-direction: column;
                gap: 2rem;
            }

            .vs::before,
            .vs::after {
                display: none;
            }

            .odds {
                flex-direction: column;
                gap: 1rem;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .matches-grid {
                grid-template-columns: 1fr;
            }

            .match-card {
                padding: 2rem;
            }

            .contact-form {
                padding: 2rem;
            }
        }

      
    </style>
<header>
  <nav class="container">
    <a href="logout.php">Logout</a>
    </nav>
</header>
</head>
<body>
<h2>Admin Login</h2>
<form method="POST" action="admin_loginprocess.php">
    <div class="container" style="padding-top: 100px;">
        <div class="form-group">
    <input type="text" name="username" placeholder="Admin Username" required><br>
    </div>
    <div class="form-group">
    <input type="password" name="password" placeholder="Password" required><br>
    </div>
    <div class="form-group">
    <button type="submit" href="admin.php">Login</button>
    </div>
    </div>
</form>
<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    </body>
   
<footer>
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>EliteFootball</h3>
                <p>The world's most exclusive sports Prediction platform, specializing in Accurate football Prediction between the greatest teams  .</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <a href="index.php">Home</a>
                <a href="">VIP COMING SOON</a>
                <a href="">Join Elite Circle</a>
                <a href="">Register</a>
            </div>
            <div class="footer-section">
                <h3>Contact Information</h3>
                <p>Email: billthiago04@gmail.com</p>
                <p>Phone: +2330504731946</p>
                <p>VIP COMING SOON!!</p>
                <p>Address: ACCRA GHANA, KOKOMLEMLE District</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 EliteFootball. All rights reserved. All Prediction are 99% accurate.</p>
        </div>
    </div>
</footer>