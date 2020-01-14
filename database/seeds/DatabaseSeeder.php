<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //inicializamos Faker en modo Español
      $faker = Faker\Factory::create('es_ES');

for($a = 0; $a < 2; $a++) {

   //Aquí obtenemos la imagen aleatoria 640x480
   $img = file_get_contents($faker->imageUrl('200', '200','people'));
   $username =  $faker->userName;
   $fileName = $username.'.jpg';

   //creamos el user guardando el nombre de la imágen.
   $user = User::create(array(
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'foto' => $fileName,
        'perfil' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'nick' => $faker->word,
   ));

   //Y la guardamos en el servidor.
   file_put_contents("public/images/avatares/$fileName", $img);
}
    }
}
