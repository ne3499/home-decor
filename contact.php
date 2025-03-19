<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Decor | Contact Us</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <style>
        /* General Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

/* Navigation Bar */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #333;
    padding: 15px 50px;
}

.logo {
    color: #ffcc00;
    font-size: 24px;
    font-weight: bold;
}



/* Contact Section */
.contact-container {
    max-width: 1100px;
    margin: 50px auto;
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: center;
}

h1 {
    font-size: 32px;
    color: #333;
}

.contact-container p {
    font-size: 18px;
    color: #666;
    margin-bottom: 30px;
}

/* Contact Content */
.contact-content {
    display: flex;
    justify-content: space-between;
    gap: 30px;
    margin-top: 20px;
}

/* Contact Form */
.contact-form {
    flex: 1;
    text-align: left;
}

.contact-form input, .contact-form textarea {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

.submit-btn {
    background: #ffcc00;
    border: none;
    padding: 10px 20px;
    font-size: 18px;
    color: black;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

.submit-btn:hover {
    background: #e6b800;
}

/* Contact Info */
.contact-info {
    flex: 1;
    text-align: left;
    background: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.contact-info h3 {
    font-size: 24px;
    margin-bottom: 10px;
}

.contact-info p {
    font-size: 16px;
    margin: 5px 0;
    color: #444;
}

/* Footer */
footer {
    background: #333;
    color: white;
    text-align: center;
    padding: 15px 0;
    margin-top: 20px;
}

    </style>

    <!-- Navigation Bar -->
    <header>
        <div class="logo">Home Decor</div>
        <?php include 'navbar.php'; ?>
         </header>

    <br>
    <br>
    <br>

    <!-- Contact Section -->
    <section class="contact-container">
        <h1>Contact Us</h1>
        <p>Have a question? Feel free to reach out to us using the form below.</p>

        <div class="contact-content">
            <div class="contact-form">
                <form action="send_message.php" method="POST">
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="email" name="email" placeholder="Your Email" required>
                    <input type="text" name="subject" placeholder="Subject" required>
                    <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>

            <div class="contact-info">
                <h3>Our Office</h3>
                <p><strong>📍 Address:</strong> 123 Home Street, City, Country</p>
                <p><strong>📞 Phone:</strong> +123 456 7890</p>
                <p><strong>📧 Email:</strong> support@homedecor.com</p>
                <p><strong>⏰ Working Hours:</strong> Mon - Sat, 9:00 AM - 6:00 PM</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Home Decor. All rights reserved.</p>
    </footer>

</body>
</html>
