<?php
namespace homework5;

class UserAction extends MainController
{
    public function index()
    {
        if ($_SESSION['AUTH']) {
            header('Location:/fileAction/showUsers');
        }
        $this->view->render('auth', []);
    }
    public function reg()
    {
        $this->view->render('reg', []);
    }
    public function auth()
    {
        $model = new User();
        $data = $model->check($_POST['login']);
        $data = $data->toArray();
        $check = crypt($_POST['password'], $_POST['login']);
        if (count($data) < 1) {
            $this->view->render('auth', ['message' => "Не верный логин"]);
            return;
        }
        if ($check !== $data[0]['password']) {
            $this->view->render('auth', ['message' => "Не верный пароль"]);
            return;
        }
        $_SESSION['AUTH'] =true;
        header('Location:/fileAction/showUsers');
    }
    public function regisrate()
    {
        foreach ($_POST as $key => $value) {
            if (empty($value) && $key !== 'comment') {
                $this->view->render('reg', ['message' => 'Заполните все поля']);
                return ;
            }
            $_POST[$key] = strip_tags($value);
            $_POST[$key] = htmlspecialchars($_POST[$key], ENT_QUOTES);
        }
        $model= new User();
        $file = new File();
        $req = $model->check($_POST['login']);
        if (count($req) !== 0) {
            $this->view->render('reg', ['message' => 'Логин уже занят']);
            return ;
        }
        if ($_POST['password'] !== $_POST['password-repeat']) {
            $this->view->render('reg', ['message' => 'пароли не совпадают']);
            return;
        }
        if (preg_match('/jpg/', $_FILES['file']['name']) or preg_match('/png/', $_FILES['file']['name'])) {
            if (preg_match('/jpg/', $_FILES['file']['type']) or preg_match('/png/', $_FILES['file']['type'])
                or preg_match('/jpeg/', $_FILES['file']['type'])) {
                $_POST['file'] = $_FILES['file']['name'];
            } else {
                echo $_FILES['file']['type'];
                $this->view->render('reg', ['message' => 'Не поддерживаемый тип файла']);
                return;
            }
        } else {
            $this->view->render('reg', ['message' => 'Не поддерживаемое расширение файла ']);
            return;
        }
        $_POST['password'] = crypt($_POST['password'], $_POST['login']);
        $model->store($_POST);
        $file->store($_FILES['file']);
        $this->view->render('reg', ['message' => 'Регистрация успешна']);
    }
}
