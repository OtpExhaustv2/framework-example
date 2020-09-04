<?php


use Svv\Framework\App;

class m0002_add_password_column
{

    public function up ()
    {
        $db = App::$app->db;
        $db->pdo->exec("ALTER TABLE users ADD COLUMN password VARCHAR(512) NOT NULL");
    }

    public function down ()
    {
        $db = App::$app->db;
        $db->pdo->exec( "ALTER TABLE users DROP COLUMN password");
    }

}
