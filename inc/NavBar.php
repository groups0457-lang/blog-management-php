<?php
// Get the name of the current page (e.g., "index.php", "blog.php")
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(90deg, #173054ff, #0a58ca); box-shadow: 0 4px 10px rgba(0,0,0,0.2);">
	<div class="container">
		<a class="navbar-brand fw-bold text-white" href="index.php">
			<i class="fa fa-pen-fancy"></i> <b>My<span style="color: #FFD700;">Blog</span></b>
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link <?= ($currentPage == 'index.php') ? 'active fw-bold text-warning' : '' ?>" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= ($currentPage == 'blog.php') ? 'active fw-bold text-warning' : '' ?>" href="blog.php">Blog</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= ($currentPage == 'category.php') ? 'active fw-bold text-warning' : '' ?>" href="category.php">Category</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= ($currentPage == 'about.php') ? 'active fw-bold text-warning' : '' ?>" href="about.php">About</a>
				</li>
					<li class="nav-item">
					<a class="nav-link <?= ($currentPage == 'contact.php') ? 'active fw-bold text-warning' : '' ?>" href="contact.php">Contect Us</a>
				</li>
				
			</ul>

			<ul class="navbar-nav mb-2 mb-lg-0">
				<?php if ($logged) { ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="fa fa-user" aria-hidden="true"></i> <?= htmlspecialchars($_SESSION['username']); ?>
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="admin-login.php"><i class="fa fa-lock"></i> Admin Login</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
						</ul>
					</li>
				<?php } else { ?>
					<li class="nav-item">
						<a class="nav-link" href="login.php"><i class="fa fa-sign-in-alt"></i> Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="signup.php"><i class="fa fa-user-plus"></i> Signup</a>
					</li>
				<?php } ?>
			</ul>

			<form class="d-flex ms-3" role="search" action="blog.php" method="GET">
				<input class="form-control rounded-pill me-2" type="search" name="search" placeholder="Search..." aria-label="Search">
				<button class="btn btn-warning rounded-pill" type="submit"><i class="fa fa-search"></i></button>
			</form>
		</div>
	</div>
</nav>
