<?php
/*
Template Name: AI Quiz Page
*/
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<meta
			name="description"
			content="AI-powered house plan generator quiz"
		/>
		<title>House Plan with AI</title>

		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/aiuf-form.css">
	
	</head>
	<!-- new -->
	<body>
		<div id="quiz-container">
			<div class="ai_logo_image">
				<img
        
					src="https://urbanfeatconstruction.com/wp-content/uploads/2025/07/Urbanfeat-Construction-White-258x96-1.png"
					alt="House Plan AI Logo"
				/>
				<div class="ai_logo">
					<div class="text_orbit_wrapper">
						<span class="logo_text">AI</span>
						<div class="orbit-container">
							<div
								class="orbit"
								style="--angle: 0deg"
							></div>
							<div
								class="orbit"
								style="--angle: 120deg"
							></div>
							<div
								class="orbit"
								style="--angle: 240deg"
							></div>
						</div>
					</div>
					<div class="pulse2"></div>
					<div class="pulse3"></div>
				</div>
			</div>

			<div
				id="question"
				class="question"
			></div>
			<div id="input-area"></div>

			<div class="btn-group">
				<button
					id="prev"
					type="button"
					class="nav-btn"
				>
					Previous
				</button>
				<button
					id="next"
					type="button"
					class="nav-btn"
				>
					Next
				</button>
			</div>

			<button
				id="submit"
				type="button"
				class="nav-btn"
				style="margin-top: 50px"
				onclick="location.href = 'https://urbanfeatconstruction.com/aiufp/'"
			>
				Get AI Answer
			</button>

		</div>
<script>
const QUESTIONS_URL = "<?php echo get_stylesheet_directory_uri(); ?>/assets/js/questions.json";
</script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/aiuf-form.js"></script>
	</body>
</html>
