<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="../starter-template.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="/">Авторизация</a></li>
            <li class="active"><a href="/userAction/reg">Регистрация</a></li>
            <li><a href="/fileAction/showUsers"">Список пользователей</a></li>
            <li><a href="/fileAction/showFiles">Список файлов</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="form-container">
        <form class="form-horizontal" action="/userAction/regisrate" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Логин</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputEmail3" placeholder="Логин" name="login">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Пароль</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" id="inputPassword3" placeholder="Пароль" name="password">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword4" class="col-sm-3 control-label">Пароль (Повтор)</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" id="inputPassword4" placeholder="Пароль" name="password-repeat">
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Имя</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="name" placeholder="Имя" name="name">
            </div>
          </div>
          <div class="form-group">
            <label for="age" class="col-sm-3 control-label">Возраст</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="age" placeholder="Возраст" name="age">
            </div>
          </div>
          <div class="form-group">
            <label for="comment" class="col-sm-3 control-label">Расскажите о себе</label>
            <div class="col-sm-9">
              <textarea class="form-control" id="comment" placeholder="Расскажите о себе" name="comment"></textarea>
            </div>
          </div>
          <div class="form-group">
              <label for="file" class="col-sm-3 control-label">Аватар</label>
              <div class="col-sm-9">
                <input type="file" class="form-control" id="file" placeholder="Имя" name="file">
              </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Зарегистрироваться</button>
              <br><br>
              Зарегистрированы? <a href="/">Авторизируйтесь</a>
            </div>
          </div>
            <?php

                    echo "<div>{$data["message"]}</div>";

            ?>
        </form>
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php
    require 'footer.php';
    ?>

  </body>
</html>
