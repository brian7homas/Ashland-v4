<?php 

// pdo database class
// connect to database
// create prepared statements
// bind values
// return rows with results

class Database{

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;



    private $dbh;
    private $stmt;
    private $error; 
    public function __construct(){
        
        //set dsn
        $dsn = 'mysql:host=' . $this->host . '; dbname=' . $this->dbname;
        $options = array (
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        );

        //create new pdo instance
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
            echo "error in database file";
        }
    }


    //prepare statement with query
    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
        //test stmt and sql
//         var_dump($this->stmt);
//         echo $stmt . 'from query function database file';
    }
    // prepare statemnt used to add players to add_tmp_player table
    public function prepare($query){
        //!UNCOMMETING THIS LINE BREAKS THE NEW-TMP-PLYAER DATABASE FUNCTION!!!
        // echo $this->dbh->prepare($query);
        return $this->dbh->prepare($query);
    }



    //Bind values
    public function bind($param, $value, $type = null){
        if(is_null($type)) {
            switch (true) {
                case (is_int($value)):
                    $type = PDO::PARAM_INT;
                    break;
                case (is_bool($value)):
                    $type = PDO::PARAM_BOOL;
                    echo "is bool";
                    break;
                case (is_null($value)):
                    $type = PDO::PARAM_NULL;
                    echo "is null";
                    break;
                default:
                    $type = PDO::PARAM_STR;

            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    //execute the prepared stmt
    public function execute(){
        // var_dump($this->stmt);
        //  var_dump($this->stmt);
        //  var_dump(is_bool($this->stmt));
        return $this->stmt->execute();
    }
    // //get result set as array of objects
     public function resultSet(){
         $this->execute();
         return $this->stmt->fetchAll(PDO::FETCH_OBJ);
     }
    //get single record as object
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    //get row count
    public function rowCount(){
        return $this->stmt->rowCount();
    }
    

}