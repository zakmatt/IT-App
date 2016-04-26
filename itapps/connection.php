<?php
 
/**
 * A class file to connect to database
 */
class DB_CONNECT {
 
    /**
     * db
     *
     * @var $   public $db;
     */
    public $db;
    // constructor
    function __construct() {
        // connecting to database
        $this->connect();
    }
 
    // destructor
    function __destruct() {
        // closing db connection
        $this->close();
    }
 
    /**
     * Function to connect with database
     */
    function connect() {
        // import database connection variables
        require_once __DIR__ . '/DB_settings.php';
 
        // Connecting to mysql database
        $con = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die(mysql_error());
 
        // Selecing database
        $db = mysql_select_db(DB_DATABASE) or die(mysql_error()) or die(mysql_error());
 
        // returing connection cursor
        return $con;
    }
    /**
     * check_changes
     *
     * Get counter value from database
     *
     * @return void
     */
    function check_changes(){
        $result = $this->db->query('SELECT counting FROM clientorders1 WHERE pid=1');
        if($result = $result->fetch_object()){
            return $result->counting;
        }
        return 0;
    }
    /**
     * register_changes
     *
     * Increase value of counter in database. Should be called everytime when
     * something change (add,edit or delete)
     *
     * @return void
     */
    function register_changes(){
        $this->db->query('UPDATE clientorders1 SET counting = counting + 1 WHERE pid=1');
    }
    /**
     * get_news
     *
     * Get list of news
     *
     * @return void
     */
    function get_news(){
        if($result = $this->db->query('SELECT * FROM clientorders1 WHERE pid<>1 ORDER BY created_at DESC LIMIT 50')){

            $return = '';
            while($r = $result->fetch_object()){
                $return .= '<p>id: '.$r->pid.' | '.htmlspecialchars($r->name).'</p>';
                $return .= '<hr/>';
            }
            return $return;
           
        }
    }
 
    /**
     * Function to close db connection
     */
    function close() {
        // closing db connection
        mysql_close();
    }
 
}
 
?>