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


    <div class="container">

      <div class="form-container">
        <form class="form-horizontal" action="/fileAction/redactUser" method="post" enctype="multipart/form-data">
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
        <input type="hidden" class="form-control" id="file" placeholder="Имя" name="id" value="<?=$data['id']?>">
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Отправить</button>
              <br><br>
              <a href="/userList">Назад</a>
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