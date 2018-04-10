<?php
require_once __DIR__ ."/vendor/autoload.php";
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

$config = include_once "testConf.php";
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => $config['host'],
    'database'  => $config['dbname'],
    'username'  => $config['username'],
    'password'  => $config['password'],
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();
Capsule::schema()->dropIfExists('users');
Capsule::schema()->create('users', function (Blueprint $table) {
    $table->increments('id');
    $table->string('login');
    $table->string('password');
    $table->string('name');
    $table->integer('age');
    $table->string('description');
    $table->string('photo');
    $table->timestamps();
});
$faker = Faker\Factory::create();
$user = new \homework5\User();
for ($i = 1; $i < 10; $i++) {
    $login= $faker->userName;
    $password = crypt($login, $faker->password);
    $data =  ['login' => $login, 'password' => $password,
        'name' => $faker->name, 'age' => $faker->numberBetween($min = 10, $max = 90),
        'comment' => $faker->text,
        'file' =>'cat'.$i.'.jpg'];
    $user->store($data);
}
