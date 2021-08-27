<?php

$ROOT_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';

class User {
    public $firstName;
    public $lastName;
    public $email;
    public $id;
    // public $profilePic;
    private $assignedTasks = [];
    private $myAssignedTasks;
    
    public function __construct() {
        $this->email = $_SESSION['email'];

        global $ROOT_DIR;
        include $ROOT_DIR . 'dbConnect.php';
        global $pdo;

        $email = $this->email;
        
        $findInUsers =  "SELECT firstname, lastname, id FROM users WHERE email = :email";
        
        $stmt = $pdo->prepare($findInUsers);
        
        $stmt->bindParam(':email', $email);
        
        $stmt->execute();

        $row = $stmt->fetch();
        // $picpic = $row['photo'];
        // $picpic = fgets($picpic);
        // $this->profilePic = $picpic;
        
        $this->firstName =  $row['firstname'];
        $this->lastName = $row['lastname'];
        $this->id = $row['id'];

        $this->getAssignedTasks();
        $this->addCountMyTasksByStatus();
    }
    
    public function introduceSelf() {
        $firstName = $this->firstName;
        $lastName = $this->lastName; 
        echo("<span style='text-transform: uppercase'>$firstName $lastName</span>");
        
        }

    public function getAssignedTasks() {
        global $ROOT_DIR;
        include $ROOT_DIR . 'dbConnect.php';
        global $pdo;
        
        $user_id = $this->id;
        
        $sql =  "SELECT task_id FROM assignedtasksusers WHERE user_id = :user_id";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        
        $stmt->execute();

        while($row = $stmt->fetch()) {

            $task_id =  $row['task_id'];
            array_push($this->assignedTasks, $task_id);
        }
    }

    public function addCountMyTasksByStatus() {
        global $ROOT_DIR;
        include $ROOT_DIR . 'dbConnect.php';
        global $pdo;

        $userId = $this->id;

        $compteurUser = "SELECT Status, COUNT (Status) FROM tasks WHERE id = ANY (SELECT task_id FROM assignedtasksusers WHERE user_id = :userId) GROUP BY Status";

        $compteurUserPrepared = $pdo->prepare($compteurUser);

        $compteurUserPrepared->bindParam(':userId',$userId);

        $compteurUserPrepared->execute();

        while($row = $compteurUserPrepared->fetch()) {

            $status = $row['status'];
            $count = $row['count'];
            $this->myAssignedTasks[$status] = $count;
        }
    }
    // retourne le compte de tache par statut 
    public function returnCountTasksByStatus($statusId) {
        
         $count = $this->myAssignedTasks[$statusId];

        return $count;
    }
    // retourne le compte de tache assigné 
    public function returnCountTasksAssigned() {
        
        $countTask = count($this->assignedTasks);
        
       return $countTask;
    
       
   }
}
?>