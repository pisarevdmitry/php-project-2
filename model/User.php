<?php
namespace homework5;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function store($data)
    {
        $query = ['login' => $data['login'], 'password' => $data['password'],
            'name' => $data['name'], 'age' => $data['age'], 'description' => $data['comment'],
            'photo' => $data['file']];
        $this->create($query);
    }
    public function updateUser($data)
    {
        try {
            $query =['name' => $data['name'], 'description' => $data['comment'], 'age' => $data['age'],
                'photo' => $data['file']];
            $this->where('login', '=', $data['id'])
                 ->update($query);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    public function check($login)
    {
        $result = $this ->where('login', '=', $login)
                    ->get();
        return $result;
    }
    public function getUsers($sort)
    {
        return $this->orderBy('age', $sort)->get();
    }
    public function getAvatars()
    {
        $avatars = $this->whereNotNull('photo')
                    ->get();
        return $avatars;
    }
    public function deleteUser($id)
    {
        try {
             $this->where('login', '=', $id)
                  ->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    public function deleteAvatar($id)
    {
        try {
            $this ->where('photo', '=', $id)
                  ->update(['photo' => null]);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
