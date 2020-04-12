<?php


namespace Morcen\MyLaraDump;


use Ifsnop\Mysqldump\Mysqldump;

class MyLaraDump
{
    const DB_DRIVER = 'mysql';

    private $dumper;

    public function __construct()
    {
        $driver = self::DB_DRIVER;
        $host = env('DB_HOST');
        $db = env('DB_DATABASE');
        $user = env('DB_USERNAME');
        $password = env('DB_PASSWORD');

        try {
            $this->dumper = new Mysqldump("$driver:host=$host;dbname=$db", $user, $password);
        } catch (\Exception $e) {
            echo 'mysqldump-php error: ' . $e->getMessage();
        }
    }

    public function start(String $filename)
    {
        try {
            $this->dumper->start('storage/work/' . $filename);
        } catch (\Exception $e) {
            echo 'mysqldump-php error: ' . $e->getMessage();
        }
    }
}
