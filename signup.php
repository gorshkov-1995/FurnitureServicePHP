<?php
    $isRegister = false;
	$dbc = mysqli_connect('localhost', 'root', '', 'lesson');
	if(isset($_POST['submit'])) {
		//printf($_POST);
		$username = mysqli_real_escape_string($dbc, trim($_POST['username']));
		$password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
		$password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
		if(!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
			$query = "SELECT * FROM signup WHERE username = '$username'";
			$data = mysqli_query($dbc, $query);
			if(mysqli_num_rows($data) == 0) {
				$query ="INSERT INTO signup (username, password) VALUES ('$username', SHA('$password2'))";
				mysqli_query($dbc,$query);
				mysqli_close($dbc);
				$isRegister = true;
                //echo 'Всё готово, можете авторизоваться!';
				//exit();
			}
		}
		else {
			echo 'Всё пусто!';
		}
	}
 ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
	<link rel="stylesheet" href="css/style.css"/>
    <title>Form PHP</title>
</head>
<body style="background-color: #f2f2f2;">
	<div class="container">
	    <?php if($isRegister == false) { ?>
            <div class="row register justify-content-center">
                <form class="col-5 col-xs-12" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <p>Создайте учётную запись</p>
                    <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" placeholder="Введите свой Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password1" placeholder="Введите пароль">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="exampleInputPassword2" name="password2" placeholder="Повторите пароль">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary align-middle">Зарегистрироваться</button>
                </form>
            </div>
        <?php } else { ?>
            <div class="modal" style="display: block" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Регистрация завершена успешно!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                
                            </button>
                        </div>
                        <div class="modal-footer">
                            <a href="index.php"><button type="button" class="btn btn-primary">Вернуться на главную страницу</button></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    

	
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>


