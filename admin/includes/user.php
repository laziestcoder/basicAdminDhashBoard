    <?php


    class User extends Db_object {

    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;



    public static function verify_user($username, $password){
    global $database;
    $username = $database->escape_string($username);
    $password = $database->escape_string($password);

    $sql = "SELECT * FROM ".self::$db_table." WHERE ";
    $sql .= "username = '{$username}' ";
    $sql .= "AND ";
    $sql .= "password = '{$password}' ";
    $sql .= "LIMIT 1";

    $the_result_array = self::find_by_query($sql);

    return !empty($the_result_array) ? array_shift($the_result_array) : false;  



    }

    public static function find_all_users(){
    return self::find_this_query("SELECT * FROM users");
    // $result_set = $database->query("SELECT * FROM users");
    // return $result_set;
    }    

    public static function find_user_by_id($user_id){
    global $database;

    $result_set = self::find_this_query("SELECT * FROM users WHERE id = $user_id LIMIT  1");
    $found_user = mysqli_fetch_array($result_set);
    //print_r($found_user); 
    return $found_user;
    }  

    public static function find_this_query($sql){
    global $database;
    $result_set = $database->query($sql);
    return $result_set;
    }  


    public static function instantation($found_user){

    $the_object = new self;

    // $the_object->id = $found_user['id'];
    // $the_object->username = $found_user['username'];
    // $the_object->password = $found_user['password'];    
    // $the_object->first_name = $found_user['first_name'];
    // $the_object->last_name = $found_user['last_name'];

    foreach ($the_record as $the_attribute => $value) {
        if($the_object->has_the_attribute($the_attribute)){
            $the_object->$the_attribute = $value;

        }
    }
    

    return $the_object;

    }





    } // end User class





    ?>