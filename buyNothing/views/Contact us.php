<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Contact Us Page</title>
	<style>
		* {
			box-sizing: border-box;
		}

		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}

		.container {
			width: 80%;
			max-width: 800px;
			margin: 0 auto;
			padding: 50px 20px;
			text-align: center;
		}

		h1 {
			font-size: 36px;
			margin-bottom: 30px;
		}

		form label {
			display: block;
			font-size: 18px;
			margin-bottom: 10px;
			text-align: left;
		}

		form input,
		form textarea {
			width: 100%;
			padding: 10px;
			margin-bottom: 20px;
			border: none;
			border-radius: 5px;
			background-color: #f5f5f5;
			font-size: 16px;
		}

		form input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			cursor: pointer;
		}

		#message-sent {
			display: none;
			font-size: 24px;
			margin-top: 30px;
		}

		#message-sent.show {
			display: block;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Contact Us</h1>
		<form id="contact-form">
			<label for="name">Name:</label>
			<input type="text" id="name" name="name" required>
			<label for="email">Email:</label>
			<input type="email" id="email" name="email" required>
			<label for="message">Message:</label>
			<textarea id="message" name="message" required></textarea>
			<input type="submit" value="Send">
		</form>
		<div id="message-sent"></div>
	</div>

	<script>
		const form = document.getElementById('contact-form');
		const messageSent = document.getElementById('message-sent');

		form.addEventListener('submit', function(event) {
			event.preventDefault();
			const formData = new FormData(form);
			const xhr = new XMLHttpRequest();
			xhr.open('POST', 'send-email.php');
			xhr.onload = function() {
				if (xhr.status === 200) {
					messageSent.textContent = 'Message sent successfully!';
					messageSent.classList.add('show');
					form.reset();
				} else {
					messageSent.textContent = 'Error sending message.';
					messageSent.classList.add('show');
				}
			};
			xhr.send(formData);
		});
	</script>
	<form method='post'>
<button><a href="index.php"class="button">back</button></a>
</form>
</body>
</html>