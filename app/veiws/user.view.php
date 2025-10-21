<?php 
    class userView {

        function showLogin($user) {
            require_once './templates/header.phtml';
            require_once './templates/login.phtml';
            require_once './templates/footer.phtml';
        }

        // public function showError($error, $user) {
        // echo "<h1>$error</h1>";
        // }

    }
?>