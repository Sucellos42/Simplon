<div id="wrap2">
    <div id="profilePicture">
        <!-- TODO: mettre l'image dynamiquement -->
        <img src="../assets/dynamic-profile-pic.php" alt="profilepic.jpeg" class='profilepicimg'>
    </div>
    <div id="profilePicForm">
        <form action="../upload-profile-pic/uploadprofilepic.php" method="post" enctype="multipart/form-data" id='uploadform'>
                <input type="file" name="img" id="uploadbuttonProfilePic" accept=".jpeg,.png" required>
                <input type="submit" value="enregistrer" id="uploadprofilepic">
            </form>
        <form action="../upload-profile-pic/deleteprofilepic.php" method="post" enctype="multipart/form-data">
            <input type="submit" value="Supprimer la photo de profil" id="deleteprofilepic" onclick="return confirm('Voulez-vous vraiment supprimer votre photo de profil ?')">
        </form>
    </div>
</div>
