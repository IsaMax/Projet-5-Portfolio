<?

class Manager {

    protected function dbConnect() {

        $db = new PDO('mysql:host=localhost;dbname=agencestw_maxime-projet5;charset=utf8', 'agencestw', 'xsuAmrg3rwbly6s');
        return $db;
    }
}
//array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)