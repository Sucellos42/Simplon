<form action='../createTask/createTaskTreat.php' method='POST'>
<?php
        inputResponsables();

        inputChooseInUsers('checkbox', 'assigned');
    ?>
    <input type="text" name="titre" id="titre" placeholder="titre">
    <textarea name="description" id="" cols="30" rows="10"placeholder="description"></textarea>
    <input type="date" name="date" id="datePicker">
    <select name="statut" id="statut">
        <option value="1">A faire</option>
        <option value="2">En cours</option>
        <option value="3">En validation</option>
        <option value="4">Fini</option>
        <option value="5">Abandonné</option>
    </select>
    <select name="categorie" id="categorie">
        <option value="1">Personnel</option>
        <option value="2">Administratif</option>
        <option value="3">Commercial</option>
        <option value="4">Stratégique</option>
        <option value="5">Management</option>
        <option value="6">Marketing</option>
        <option value="7">Technique</option>
    </select>
    <input type="submit" value="submit">
    </form>