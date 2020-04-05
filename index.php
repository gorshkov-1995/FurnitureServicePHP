<?php 
	function showMessage($message, $isError = false){
		$classAlert = 'success';
		if ($isError == true) 
		{
			$classAlert = "danger";
		}

		echo '<div class="alert alert-'.$classAlert.' alert-dismissible fade show  container" role="alert">'.
				  $message.
				  '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'.
				    '<span aria-hidden="true">&times;</span>'.
				  '</button>'.
			  '</div>';
	}
	$dbc = mysqli_connect('localhost', 'root', '', 'lesson');
	if(!isset($_COOKIE['user_id'])) {
		if(isset($_POST['submit'])) {
			$user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
			$user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
			if(!empty($user_username) && !empty($user_password)) {
				$query = "SELECT user_id , username FROM signup WHERE username = '$user_username' AND password = SHA('$user_password')";
				$data = mysqli_query($dbc, $query);
				if(mysqli_num_rows($data) == 1) {
					$row = mysqli_fetch_assoc($data);
					setcookie('user_id', $row['user_id'], time() + (60*60*24*30));
					setcookie('username', $row['username'], time() + (60*60*24*30));
					$home_url = 'http://' . $_SERVER['HTTP_HOST'];
					header('Location: '. $home_url);
				}
				else {
					showMessage('Извините, вы должны ввести правильные имя пользователя и пароль', true);
				}
			}
			else {
				showMessage("Извините вы должны заполнить поля правильно!", true);
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>МебельСервис</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
	
					

	<nav class="navbar navbar-expand-lg navbar-light">
		<img src="img/logo.jpg" alt="logo">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<nav class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto ">
				<li class="nav-item">
					<a href="#" class="nav-link">+7 903-642-00-08</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">Заявка</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">Наши услуги</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">Гарантии</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">Материалы</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">Контакты</a>
				</li>
				<li class="nav-item">


				<?php if(empty($_COOKIE['username'])) { ?>
					<div class="dropdown">
					  	<a class=" dropdown-toggle nav-link" href="#"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Войти</a>
					  	<div class="dropdown-menu">
							<form class="px-4 py-3"  method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							    <div class="form-group">
							      	<label for="username">Введите ваш Email</label>
							      	<input type="text" name="username" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
							    </div>
							    <div class="form-group">
							      	<label for="password">Пароль</label>
							      	<input type="password" name="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
							    </div>
							    <button type="submit" name="submit" class="btn btn-primary">Войти</button>
							    <div class="dropdown-divider"></div>
							  	<a class="dropdown-item" href="signup.php">Создать аккаунт!</a>
							</form>
						</div>
					</div>
				<?php } 
				else { ?>
					<div class="dropdown">
					  	<a class=" dropdown-toggle nav-link" href="#"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php echo $_COOKIE['username'];?>
					  	</a>
					  	<div class="dropdown-menu auto_exit">
							<p><a href="#">Мой профиль</a></p>
							<hr>
							<p><a href="exit.php">Выйти</a></p>
						</div>
					</div>
				<?php } ?>
				</li>
			</ul>
		</nav>
	</nav>
	

	<div class="info">
		<h1>Ремонт мебели любой<br> сложности в Белгороде</h1>
		<p>Профессиональный ремонт любой сложности мягкой мебели. Мы гарантируем, что <br>после работы ремонта ваша мебель будет как новая!</p>
		<a href="https://vk.com/" class="btn btn-danger btn-lg">Смотреть наши услуги</a>
	</div>


	<div class="row services">
		<div class="col-md-3">
			<h3>Наши услуги</h3>
		</div>
		<div class="col-md-6 ml-auto">
			<p>Мы выполняем свою работу с любовью, чтобы клиенты были <br>в восторге от результата</p>
		</div>
	</div>

	
	<div class="row mt-4 mb-4">
		<div class="col col-sm-3">
			<img src="img/iconone.jpg" alt="" class="card-img-top">
			<h6 class="card-title pt-3">Перетяжка мебели</h6>
			<p class="card-text pb-5">От 500р</p>
		</div>
		<div class="col col-sm-3">
			<img src="img/icontwo.jpg" alt="" class="card-img-top">
			<h6 class="card-title pt-3">Реставрация устаревшей мебели</h6>
			<p class="card-text pb-5">От 500р</p>
		</div>
		<div class="col col-sm-3">
			<img src="img/iconthree.jpg" alt="" class="card-img-top">
			<h6 class="card-title pt-3">Переделка и видоизменение корпуса мебели</h6>
			<p class="card-text pb-5">От 500р</p>
		</div>
		<div class="col col-sm-3">
			<img src="img/iconfour.jpg" alt="" class="card-img-top">
			<h6 class="card-title pt-3">Замена внутренних элементов корпуса мебели</h6>
			<p class="card-text pb-5">От 500р</p>
		</div>
	</div>
</div>
	
	
	
	
	

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>