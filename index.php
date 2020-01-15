<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="style/style.css"/>
        <link rel="stylesheet" type="text/css" href="style/icons.css"/>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="lib/chart.js/Chart.min.js"></script>
        <title>Inventar</title>
    </head>
    <body>
        <div class="navbar">
            <img class="label" src="style/odoo.png"/>
            <div class="item text">Client: ERP-gestützte Geschäftsprozesse</div>
            <div class="item icon logout" id="logout">
                <span class="material-icons">power_settings_new</span>
            </div>
            <div class="item small-text" id="current-username"></div>
        </div>
        <?php
            if(isset($_GET['action']) && $_GET['action'] == "logout"){
                $_POST = array();
                $_GET = array();
            }
            if(
                isset($_POST['url']) && $_POST['url'] != "" &&
                isset($_POST['db']) && $_POST['db'] != "" && 
                isset($_POST['username']) && $_POST['username'] != "" &&
                isset($_POST['password']) && $_POST['password'] != ""
            )
            {
                require_once "core/functions.php";
                $result = test_login();
                if($result){
                    init();
                    require_once "components/product.component.php";
                } else {
                    require_once "components/login.components.php";
                }
            } else {
                require_once "components/login.components.php";
            }
        ?>
        <script>
            $(document).ready(() => {
                $("#logout").click(function(){
                    window.location = window.location.pathname + "?action=logout";
                });
            });
        </script>
    </body>
</html>