<?php
$endOfUrl = $_SERVER['PHP_SELF'];
$user = new User();
?>

<header>
        <nav>
            <ul id="menu">
                <li>
                    <a href="../dashboard/index.php" class="active">Accueil</a>
                </li>
                <li>
                    <a href="../a-propos/a-propos.php">A propos</a>
                </li>
            </ul>
        </nav>
        <div id="logo">
            <a href="">
                <img src="../assets/dashboard/main-logo.png" alt="logo">
            </a>
        </div>
        <ul id="liens_utiles">
            <li>
                <figure>
                    <?php
                    $photo = $user->getProfilePic;
                        if ($endOfUrl == "/dashboard/index.php") {
                            echo("
                            <a href='#change-profile-pic' class='js-modal-2'>
                            ");

                    if(!$photo) {
                        echo("
                        <img src='../assets/dashboard/liens-utiles/svg/user.svg' alt='user-logo' class='utile-link-logo'>
                            ");
                    }
                    else {

                    }
                        }
                        else {
                            echo("
                            <a href='../dashboard/index.php'>
                            <img src='../assets/dashboard/liens-utiles/svg/user.svg' alt='user-logo' class='utile-link-logo'>
                            ");
                        }
                    ?>
                    <figcaption>
                        <?php
                            $user->introduceSelf();
                        ?>
                        </figcaption>
                    </a>
                </figure>
            </li>

            <li>
                <figure>
                <a href="../dashboard/index-all.php">
                <img src="../assets/dashboard/liens-utiles/svg/group.svg" alt="group-logo" class="utile-link-logo">
                <figcaption>Les Pantouflards</figcaption>
                </a>
                </figure>
            </li>

            <li>
                <figure>
                    <img src="../assets/dashboard/liens-utiles/svg/add-friend.svg" alt="add-friend-logo" class="utile-link-logo">
                    <figcaption>Inviter</figcaption>
                </figure>
            </li>
            
            <li>
                <figure>
                    <a href="../deconnexion.php">
                    <img src="../assets/dashboard/liens-utiles/svg/logout.svg" alt="logout-logo" id="disconnect-logo">
                    <figcaption>Se déconnecter</figcaption>
                    </a>
                </figure>
            </li>
        </ul>
    </header>