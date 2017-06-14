
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">

        <title>MyApp</title>

        <link type="text/css" rel="stylesheet" href="<?=base_url('css/font-awesome.min.css')?>">
        <link type="text/css" rel="stylesheet" href="<?=base_url('css/style.css')?>">

        <script type="text/javascript" src="<?=base_url('js/jquery-3.1.1.min.js')?>"></script>
    </head>
    <body>

        <header id="app-header">
        </header>

        <aside id="app-sidebar">

            <nav id="app-options">
                <a href="<?=site_url('profile')?>" id="edit-profile">
                    <img class="image-frame" src="images/Lotus-inc-01.png" alt="">
                    <div class="overlay">
                        <hr>
                        <p>
                            <i class="fa fa-pencil"></i>
                            Edit Profile
                        </p>
                    </div>
                </a>

                <ul>
                    <li>
                        <a href="<?=site_url('/')?>" class="sidebar-links">
                            <i class="fa fa-newspaper-o"></i>
                            News Feed
                        </a>
                    </li>
                    <li>
                        <a href="<?=site_url('Inbox')?>" class="sidebar-links">
                            <i class="fa fa-envelope-o"></i>
                            Inbox
                        </a>
                    </li>
                    <li>
                        <a href="notes" class="sidebar-links">
                            <i class="fa fa-file-text-o"></i>
                            Notes
                        </a>
                    </li>

                     <li>
                        <a href="<?=site_url('Timetable')?>" class="sidebar-links">
                            <i class="fa fa-clock-o"></i>
                            timetable
                        </a>
                    </li>
                    <li>
                        <a class="logout" id="user-logout" href= "<?=site_url('logout')?>">
                            <i class="fa fa-sign-out"></i>
                            Log out
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

            <main id="app-content">
