<?php
// create object out of database information to use easier
class Database{
    private $host = 'localhost';
    private $db_name = 'db_movies';
    private $username = 'root';
    private $password = '';

    public $conn;

    public function getConnection(){
        $this->conn = null;

        $db_dsn = array(
            'host'=>$this->host,
            'dbname'=>$this->db_name,
            'charset'=>'utf8'
        );

        // for docker environment
        // if(getenv('IDP_ENVIRONMENT')==='docker'){
        //     $db_dsn['host'] = 'mysql';
        //     $this->username = 'docker_u'
        //     $this->password = 'docker_p'
        // }

        try {
            $dsn = 'mysql;'.http_build_query($db_dsn, '', ';');
            $this->conn = new PDO($dsn, $this->username, $this->password);
        }catch(PDOException $exception){
            echo json_encode(
                array(
                    'error'=>'database connection failed',
                    'message'=>$exception->getMessage()
                )
            );
        }

        //prepare db connection
        //move into "try"
        // $dsn = 'mysql;'.http_build_query($db_dsn, '', ';',);
        // $this->conn = new PDO($dsn, $this->username, $this->password);

        return $this->conn;
    }
}
?>