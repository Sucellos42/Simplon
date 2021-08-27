<?php

$ROOT_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';

class allUsers {
    public $id;
    public $firstName;
    public $lastName;

    /**
     * @param id : int id in table users
     * create object with
     * user_id as id
     * firstname as firstName
     * lastname as lastName
     */
    public function __construct($id) {
        $this->id = $id;
        $this->firstName = $this->findInUsers('firstname');
        $this->lastName = $this->findInUsers('lastname');
    }

    /**
     * Returns a value found in table 'users' where user_id = object id
     * 
     * @param value: column to look for in users table, according to object id
     * @return: found value
     */
    public function findInUsers($value) {
        $id = $this->id;

        global $ROOT_DIR;
        include $ROOT_DIR . 'dbConnect.php';
        global $pdo;
        
        $findInUsers =  "SELECT $value as value FROM  users WHERE id = :id";
        
        $stmt = $pdo->prepare($findInUsers);
        
        $stmt->bindParam(':id', $id);
        
        $stmt->execute();
        $row = $stmt->fetch();
        $value2 =  $row['value'];
        return $value2;
    }

    /**
     * dynamically outputs an option element in HTML (to choose from the potential people responsible for the task)
     * option id = object_id . Responsible (i.e : 48Responsible)
     * option value = object_id
     * option text : object_firstName &nsbp object_lastName
     * 
     */
    public function createResponsibleSelect() {
        $elementId = $this->id . 'Responsible';
        echo("
        <option id=$elementId class='responsibleOption' value=$this->id> $this->firstName $this->lastName</option>
        ");
    }

    /**
     * dynamically outputs an input and label element in HTML (i.e : to choose from the potential people assigned to the task)
     * input type = @param.type
     * input name = @param.name
     * input id = object_id . @param.type (i.e : 48Checkbox)
     * input value = object_id
     * 
     * if type is checkbox, input name creates an array
     * 
     * label for = input id
     * label class = @param.name . '-choose'
     * label content = object_firstName &nbsp object_lastName
     * 
     * break to return to line
     * 
     * 
     * @param type: input type to output(string)
     * @param name: input name to output(string)
     */

    public function createInput($type, $name) {
        $elementId = $this->id . $type;
        if ($type == 'checkbox') {
            $name = $name . '[]';
        }
        echo("
        <input type=$type name=$name id=$elementId value=$this->id>
        <label for=$elementId class='$name-choose'>$this->firstName $this->lastName</label>
        </br>
        ");
    }
}