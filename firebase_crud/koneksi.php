 <?php
 require __DIR__.'/vendor/autoload.php';
 use Kreait\Firebase\Factory;
 $factory = (new Factory)
    ->withServiceAccount(__DIR__.'/rest-api-latihan-33bf3-firebase-adminsdk-fbsvc-c44d189eac.json')
    ->withDatabaseUri('https://rest-api-latihan-33bf3-default-rtdb.asia-southeast1.firebasedatabase.app/');
 $database = $factory->createDatabase();
