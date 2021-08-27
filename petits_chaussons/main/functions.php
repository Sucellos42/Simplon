<?php

$ROOT_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';

/**
* search in table tasks 
* outputs : 
* span of assigned people
* div with status name, status color
* div with category name, category color
* spans of :
* author, titre, description, endDate, responsible
* 
* 
* @param actualStatus: (int)status to look for in table 'tasks' 
* @param assigned: if $assigned = 'assigned', will only look for assigned tasks of connected user ; otherwise, will look for all the tasks
*/

function searchTasks($actualStatus, $assigned) {
    
    global $ROOT_DIR;
    include $ROOT_DIR . 'dbConnect.php';
    global $pdo;
    global $user;
    
    if ($assigned == 'assigned') {
        $userId = $user->id; 
        
        $sql = "SELECT task_id FROM assignedtasksusers
        JOIN tasks ON assignedtasksusers.task_id = tasks.id
        JOIN status ON tasks.status = status.id 
        WHERE user_id = :user_id
        AND tasks.status = :task_status
        ORDER BY tasks.end_date ASC
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':task_status', $actualStatus);
        
    }
    else {
        
        $sql = "SELECT id as task_id FROM tasks 
        WHERE status = :task_status
        ORDER BY end_date ASC
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':task_status', $actualStatus);
    }
    
    $stmt->execute();
    $compteur = 0;
    
    
    while($row = $stmt->fetch()) {
        
        $task_id = $row['task_id'];
        
        $task = new Task($task_id);
        
        
        if( $compteur == 0) {
                $task->divTitle($task->statusColor, $task->statusLabel);

                if($assigned == 'assigned') {
                    $statusId = $task->statusId;
                    $taskCount = $user->returnCountTasksByStatus($statusId);
                    echo("
                    <span>Nombre de tâches : $taskCount</span>
                    ");
                }
                else {
                    $statusId = $task->statusId;
                    $taskCount = $task->returnCountTasksByStatus($statusId);
                    echo("
                    <span>Nombre de tâches : $taskCount</span>
                    ");
                }
            echo('
            <ul>
            ');
            $compteur++;
        }
        $task->createCard();
        unset($pdo);
        
    }
    echo('
    </ul>
    </div>
    ');
}

/**
* get actual color of the status
* @param actualStatus: int of concerned status
* @return color: as HEX code with # in front
*/

function getColorFromStatus($actualStatus) {
    
    $userEmail = $_SESSION['email'];
    
    global $ROOT_DIR;
    include $ROOT_DIR . 'dbConnect.php';
    global $pdo;
    
    
    $sql = "SELECT status.color AS status_color FROM status
    WHERE status.id = :task_status
    ";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':task_status', $actualStatus);
    $stmt->execute();
    
    $row = $stmt->fetch();
    
    $statusColor = '#' . $row['status_color'];
    
    return $statusColor;
    unset($pdo);
    
}

/**
* get actual color of the status
* @param actualStatus: int of concerned status
* @return color: as HEX code with # in front
*/

function getColorFromCategories($actualCategory) {
    
    $userEmail = $_SESSION['email'];
    
    global $ROOT_DIR;
    include $ROOT_DIR . 'dbConnect.php';
    global $pdo;
    
    
    $sql = "SELECT categories.color AS category_color FROM categories
    WHERE categories.id = :task_category
    ";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':task_category', $actualCategory);
    $stmt->execute();
    
    $row = $stmt->fetch();
    
    $categoryColor = '#' . $row['category_color'];
    
    return $categoryColor;
    unset($pdo);
    
}




/**
* function to get all people from the database create objects in class allUsers and use a function in this class to output :
* 1 select element in HTML 
* multiple options, with people name as text and people id as value, according to the number of people in the database 
*/
function inputResponsables() {
    
    
    global $ROOT_DIR;
    include $ROOT_DIR . 'dbConnect.php';
    global $pdo;
    
    
    
    $sql = "SELECT id FROM users";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    echo("
    <div class = 'responsable'>
    <h3>Responsable :</h3>
    <select name='responsable' id='responsable-select'>
    ");
    
    while($row = $stmt->fetch()) {
        
        $id = $row['id'];
        
        $responsible = new allUsers($id);
        
        $responsible->createResponsibleSelect();
        
    }
    echo("
    </select>
    </div>
    ");
}

/**
* function to get all people from the database create objects in class allUsers and use a function in this class to output :
* input of the desired type
* label of the input
* - for everyone in the database
*  
* @param type : input type to output (string)
* @param name : input name to output (string)
*/

function inputChooseInUsers($type, $name) {
    
    global $ROOT_DIR;
    include $ROOT_DIR . 'dbConnect.php';
    global $pdo;
    
    $sql = "SELECT id FROM users";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    echo("
    <div class = 'affecte'>
    <h3 id='affectes-title'>Affecter membres :</h3>
    ");
    
    while($row = $stmt->fetch()) {
        
        $id = $row['id'];
        
        $responsible = new allUsers($id);
        
        $responsible->createInput($type, $name);
        
    }
    echo('</div>');
}

function hexToLightRgb($hex, $opacity) {
    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
    $rgba = "$r, $g, $b, $opacity";
    return $rgba;
}
