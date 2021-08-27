<?php
$ROOT_DIR = $_SERVER['DOCUMENT_ROOT'] . '/';

class Task {
    public $id;
    public $titre;
    public $description;
    public $endDate;
    public $responsible;
    public $statusId;
    public $statusLabel;
    public $statusColor;
    public $categoryLabel;
    public $categoryColor;
    public $authorName;
    public $assignedPeople = [];
    public $countTasksByStatus;


    public function __construct($id) {

        global $ROOT_DIR;
        include $ROOT_DIR . 'dbConnect.php';
        global $pdo;

        $sql = "SELECT tasks.id, titre, description, end_date, responsible, status.id AS status_id, status.label AS status_label, status.color AS status_color, categories.label AS category_label, categories.color AS category_color, author_id FROM tasks

        JOIN status ON status.id = tasks.status
        JOIN categories ON categories.id = tasks.category

        WHERE tasks.id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch();
        $authorId = $row['author_id'];
        $responsibleId = $row['responsible'];

        $this->id = $id;
        $this->titre = $row['titre'];
        $this->description = $row['description'];
        $this->endDate = $row['end_date'];
        $this->statusId = $row['status_id'];
        $this->statusLabel = $row['status_label'];
        $this->statusColor = $row['status_color'];
        $this->categoryLabel = $row['category_label'];
        $this->categoryColor = $row['category_color'];
        $this->authorName = $this->getNameFromUsers($authorId);
        $this->responsible = $this->getNameFromUsers($responsibleId);
        $this->findAssigned();
        $this->addCountAllTasksByStatus();
    }

    public function createCard() {

        $assignedPeople = $this->assignedPeople;
        $authorName = $this->authorName;
        $titre = $this->titre;
        $description = $this->description;
        $endDate = substr($this->endDate, 0, 10);
        $responsible = $this->responsible;
        $categoryColor = '#' . $this->categoryColor;
        $categoryLabel = $this->categoryLabel;
        $task_id = $this->id;
        $responsableBG = $this->hexToLightRgb($categoryColor, '0.5');
        $cardBG = $this->hexToLightRgb($categoryColor, '0.2');

        // Create dynamically small circles with the initials of the people assigned to the task, and their full name on hover
        echo("
        <div class='assigned-people'>
        ");
        foreach($assignedPeople as $assigned) {
            $fullName = explode(" ", $assigned);
            $firstInitial = substr($fullName[0], 0, 1);
            $secondInitial = substr($fullName[1], 0, 1);
            $fullInitials = "$firstInitial.$secondInitial";
            echo("
            <div class='initials'>
            <span title='$assigned'>$fullInitials</span>
            </div>
            ");
        }

        // create the layout for the card
        echo("
        </div>
        <li>
        ");

        echo("
        <span class='category' style='background-color:$categoryColor'>$categoryLabel</span>
        ");

        echo("
        <span class='responsable' style='background-color: rgba($responsableBG)'> Responsable : $responsible</span>
        ");

        echo("
        <div class='background' style='background-color: rgba($cardBG)'>
        <h4>$titre</h4>
        ");

        echo("
        <div class='content'>
        <p class='description'>$description</p></br>
        ");

        echo("
        <span class='end_date' style='font-weight:700'>Date butoir : $endDate</span></br>
        ");
        
        echo("
        <span class='auteur' style='font-weight:600'>Auteur : $authorName</span>
        ");
        
        echo("
        <form action='../change-status/traitement-statut.php' class='stat-select' method='POST'>
            <select name='Status' required>
            <option disabled selected value=''>Changer le statut de la tache</option>
                    <option value='$task_id todo'>A faire</option>
                    <option value='$task_id pending'>En cours</option>
                    <option value='$task_id to_validate'>En validation</option>
                    <option value='$task_id done'>Terminée</option>
                    <option value='$task_id abandoned'>Abandonnée</option>
                </optgroup>
            </select>
        <input type='submit' value='Valider'>
        </form>
        ");

        echo("
        <form action='../change-category/traitement-category.php'  class='category-select' method='POST'>
            <select name='Category' required>
            <option disabled selected value=''>Changer la catégorie de la tache</option>
                    <option value='$task_id administratif'>Administratif</option>
                    <option value='$task_id personnel'>Personnel</option>
                    <option value='$task_id commercial'>Commercial</option>
                    <option value='$task_id stratégique'>Stratégique</option>
                    <option value='$task_id management'>Management</option>
                    <option value='$task_id marketing'>Marketing</option>
                    <option value='$task_id technique'>Technique</option>
                </optgroup>
            </select>
        <input type='submit' value='Valider'>
        </form>
        ");

        //TODO : clickable input with label overlay to delete
        echo("
        <form action='../delete-task/traitement-delete.php' method='POST' class='delete-form'> 
        <input type='hidden' name='delete' value='$task_id'>
        <input class='delete' type='submit' value='supprimer la tâche' onclick=\"return confirm('Voulez-vous vraiment supprimer la tâche $titre ?')\">
        </form>
        ");

        echo('
        </div>
        </div>
        </li>');

    }

    public function hexToLightRgb($hex, $opacity) {
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        $rgba = "$r, $g, $b, $opacity";
        return $rgba;
    }
    

    public function getNameFromUsers($user_id) {

        global $ROOT_DIR;
        include $ROOT_DIR . 'dbConnect.php';
        global $pdo;

        $sql = "SELECT firstname, lastname FROM users 
        WHERE id = :user_id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        $row = $stmt->fetch();
        $firstName = $row['firstname'];
        $lastName = $row['lastname'];
        $fullName = $firstName . " " . $lastName;
        return $fullName;

    }

    public function findAssigned() {

        global $ROOT_DIR;
        include $ROOT_DIR . 'dbConnect.php';
        global $pdo;
        
        $task_id = $this->id;
        
        $findAssigned = "SELECT firstname, lastname FROM users
        JOIN assignedtasksusers ON assignedtasksusers.user_id = users.id
        WHERE assignedtasksusers.task_id = :task_id";
        
        
        $stmt = $pdo->prepare($findAssigned);
        $stmt->bindParam(':task_id', $task_id);
        $stmt->execute();
        
        while($row = $stmt->fetch()) {
            $assignedFirstName = $row['firstname'];
            $assignedLastName = $row['lastname'];
            $assignedName = $assignedFirstName . ' ' . $assignedLastName;
            array_push($this->assignedPeople, $assignedName);
        }
        
    }

    public function toHTML($subject, $class) {
        echo("<span class='$class'>$subject</span></br>");
    }


    public function divTitle($statusColor, $statusLabel) {
        
        
        if( $statusLabel == 'todo' ) {
            $divTitle = "à faire";
            $statusNumber = 1;
        }
        else if( $statusLabel == 'pending' ) {
            $divTitle = "en cours";
            $statusNumber = 2;
        }
        else if( $statusLabel == 'to_validate' ) {
            $divTitle = "en validation";
            $statusNumber = 3;
        }
        else if( $statusLabel == 'done' ) {
            $divTitle = "terminé";
            $statusNumber = 4;
        }
        else if( $statusLabel == 'abandoned' ) {
            $divTitle = "abandonné";
            $statusNumber = 5;
        }
        else {
            $divTitle = 'problem';
            $statusNumber = 6;
        }

        $statusLabel2 = $statusLabel . 'Title';

        echo("
        <div id=$statusLabel>
        <div style='background-color: #$statusColor' id='$statusLabel2'>
        <h2>$divTitle</h2>
            </div>
            ");
        }


    public function categoryColor($backgroundColor, $subject) {
        echo("<span class='category $backgroundColor'>$subject</span></br>");
    }

    public function addCountAllTasksByStatus() {
        global $ROOT_DIR;
        include $ROOT_DIR . 'dbConnect.php';
        global $pdo;


        $compteurUser = "SELECT Status, COUNT (Status) FROM tasks
        GROUP BY Status
        ";

        $compteurUserPrepared = $pdo->prepare($compteurUser);


        $compteurUserPrepared->execute();

        while($row = $compteurUserPrepared->fetch()) {

            $status = $row['status'];
            $count = $row['count'];
            $this->countTasksByStatus[$status] = $count;
        }
    }

    public function returnCountTasksByStatus($statusId) {
        
        $count = $this->countTasksByStatus[$statusId];

       return $count;
   }
}
