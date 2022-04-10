<!DOCTYPE HTML>
<html>
	<head>
		
		<meta charset="UTF-8">
		<meta name = 'viewpoint' content = 'width = device-width, initial-scale = 1.0'>
		<link rel="stylesheet" type="text/css" href	= "styles.css">
		<title> Contact Us </title>
		<style>
			*,
			*:before,
			*:after{
				padding: 0;
				margin: 0;
				box-sizing: border-box;
				font-family: "Poppins",sans-serif;
				font-weight: 500;
			}
			body{
				height: 100vh;
				background: linear-gradient(
					135deg,
					#6f6df4,
					#4c46f5
				);
			}
			.box{
				background-color: #ffffff;
				width: 70%;
				min-width: 420px;
				padding: 35px 50px;
				transform: translate(-50%,-50%);
				position: absolute;
				left: 50%;
				top: 50%;
				border-radius: 10px;
				box-shadow: 20px 30px 25px rgba(0,0,0,0.15);
			}
			h1{
				font-size: 30px;
				text-align: center;
				color: #1c093c;
			}
			p{
				position: relative;
				margin: auto;
				width: 100%;
				text-align: center;
				color: #606060;
				font-size: 14px;
				font-weight: 400;
			}
			form{
				width: 100%;
				position: relative;
				margin: 30px auto 0 auto;
			}
			.row{
				width: 100%;
				display: grid;
				grid-template-columns: repeat(auto-fit, minmax(300px,1fr));
				grid-gap: 20px 30px;
				margin-bottom: 20px;
			}
			label{
				color: #1c093c;
				font-size: 14px;
			}
			textarea,
			input{
				width: 100%;
				font-weight: 400;
				padding: 8px 10px;
				border-radius: 5px;
				border: 1.2px solid #c4cae0;
				margin-top: 5px;
			}
			textarea{
				resize: none;
			}
			textarea:focus,
			input:focus{
				outline: none;
				border-color: #6f6df4;
			}
			button{
				border: none;
				padding: 10px 20px;
				background: linear-gradient(
					130deg,
					#6f6df4,
					#4c46f5
				);
				color: #ffffff;
				border-radius: 3px;
			}
		</style>
		


</head>
	<body>
		<div class="box">
			<h1> GET IN TOUCH </h1>
			<p> Any quries write to us in this form <p>
			<form>
				<div class="row">
					<div class="column">
						<label for="name">Name</label>
						<input type="text" id="name" placeholder="Your name here">
					</div>
					<div class="column">
						<label for="email">Email</label>
						<input type="email" id="email" placeholder="Your email here">
					</div>
				</div>
				<div class="row">
					<div class="column">
						<label for="subject">Subject</label>
						<input type="text" id="subject" placeholder="Your subject here">
					</div>
					<div class="column">
						<label for="contact">Contact Number</label>
						<input type="tel" id="contact" placeholder="Your phone number here">
					</div>
				</div>
				<div class="row">
					<div class="column">
						<label for="issue">Describe your issue</label>
						<textarea id="issue" placeholder="Describe your issue in detail here" rows="3"></textarea>
					</div>
				</div>
				<button>Submit</button>
			</form>
		</div>
	</body>
	
</html>