<?php

class DatabaseController
{ 
    private static $connection;
    	
    private static function checkConnection()
    {
		require("controller/config.inc.php");
        if(self::$connection == null)
        {
            self::$connection = new mysqli($server, 
                                            $username, 
                                            $password,
                                            $db);
        }
        
        if (self::$connection->connect_error) {
          trigger_error('Database connection failed: '  . self::$connection->connect_error, E_USER_ERROR);
        }
    }
    
    /**
     * Execute a query. 
     * Use questionmarks in your query for each parameter.
     * Pass an array with the parameters in the correct sequence.
     * Parameters should NOT be escaped. This method uses Prepared Statements and
     * should take care of this.
     * 
     * @param String $query The query. For example: "SELECT * FROM table WHERE id = ? AND amount >= ?"
     * @param array $parameters An array of the parameters (in correct sequence) that have been marked with questionmarks in the query. 
     * @return array An array with the query results.
     */
    public static function executeQuery($query, $parameters = array())
    {
        self::checkConnection();
        
        // Prepare statement
        $statement = self::$connection->prepare($query);
        if($statement == false)
        {
            trigger_error('Wrong SQL: ' . $query . ' Error: ' . self::$connection->error, E_USER_ERROR);
        }
        
        $referenceParameters = array();
        if(!empty($parameters))
        {
            //Put type letters of all variables in a string. s = string, i = integer, d = double, b = blob
            $types = "";
            $i = 0;
            foreach ($parameters as &$parameter) {
                if(is_int($parameter))
                {
                    $types .= "i";
                }
                else if(is_double($parameter))
                {
                    $types .= "i";
                }
                else
                {
                    $types .= "s";
                }
                //The bind_param requires references to parameters. These are created here so you don't have to remember
                //to create references on each call to this method. 

                $referenceParameters[$i] = &$parameter;
                $i++;
            }
        }

        //Bind parameters. (if there are any) $statement->bind_param() can't be used directly since 
        //we are using an array with all the parameters. This array can be of different sizes. 
        if(!empty($referenceParameters))
        {
            call_user_func_array(array($statement, "bind_param"), array_merge(array($types), $referenceParameters)); 
        }

        //Execute statement.
        $statement->execute();
        
        //Return a result set if there is one. 
        if($statement->result_metadata() != NULL && $statement->result_metadata() != false)
        {
            $rs = $statement->get_result();
            $array = $rs->fetch_all(MYSQLI_ASSOC);
            return $array;
        }
    }
    
    public static function closeConnection()
    {
        if(self::$connection != null)
        {
            self::$connection->close();
        }
    }

}

?>