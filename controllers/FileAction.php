<?php
namespace homework5;

class FileAction extends MainController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new User();
    }
    public function showUsers($sort)
    {
        if (!$_SESSION['AUTH']) {
            header('Location:/');
        }
        $data = $this->model->getUsers($sort);
        $data = $data->toArray();
        foreach ($data as $key => $value) {
            if ($value['age'] >= 18) {
                $data[$key]['adult'] = 'Совершеннолетний';
            } else {
                $data[$key]['adult'] = 'Несовершеннолетний';
            }
        }
        $this->view->render("list", $data);
    }
    public function deleteUser($data)
    {
        $data= urldecode($data);
        $data = explode('&', $data);
        $req =$this->model->deleteUser($data[0]);
        if ($req) {
            if (is_file("./photos/$data[1]")) {
                unlink("./photos/$data[1]");
            }

        }
        header('Location:/fileAction/showUsers');
    }
    public function showFiles()
    {
        if (!$_SESSION['AUTH']) {
            header('Location:/');
        }
        $data = $this->model->getAvatars();
        $data = $data->toArray();
        $this->view->render("filelist", $data);
    }
    public function deleteFile($id)
    {
        $id = urldecode($id);
        $file = new File();
        $req = $this->model->deleteAvatar($id);
        if ($req) {
            if ($file->check("./photos/$id")) {
                $file->delete("./photos/$id");
            }
        }
        header('Location:/fileAction/showFiles');
    }
    public function redact($data)
    {
        $this->view->render('redact', ['id' => urldecode($data)]);
    }
    public function redactUser()
    {
        foreach ($_POST as $key => $value) {
            $data = explode('&', $_POST['id']);
            if (empty($value) && $key !== 'comment') {
                $this->view->render('redact', ['message' => 'Заполните все поля', 'id' => $_POST['id']]);
                return;
            }
            $_POST[$key] = strip_tags($value);
            $_POST[$key] = htmlspecialchars($_POST[$key], ENT_QUOTES);
        }
        if (preg_match('/jpg/', $_FILES['file']['name']) or preg_match('/png/', $_FILES['file']['name'])) {
            if (preg_match('/jpg/', $_FILES['file']['type']) or preg_match('/png/', $_FILES['file']['type'])
                or preg_match('/jpeg/', $_FILES['file']['type'])) {
                $_POST['file'] = $_FILES['file']['name'];
            } else {
                $this->view->render('reg', ['message' => 'Не поддерживаемый тип файла']);
                return;
            }
        } else {
            $this->view->render('reg', ['message' => 'Не поддерживаемое расширение файла ']);
            return;
        }
        $_POST['id'] = $data[0];
        $model = new User();
        $file = new File();

        $req = $model->updateUser($_POST);
        if ($req) {
            $file->store($_FILES['file']);

            if ($file->check("./photos/$data[1]")) {
                $file->delete("./photos/$data[1]");
            }
            header('Location:/fileAction/showUsers');
        } else {
            $this->view->render('redact', ['message' => 'Ошибка базы данных', 'id' => $_POST['id']]);
        }

    }
}