<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->


            <?php
            if (isset($errors)){
                foreach ($errors as $error) {

                    echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
                }

            }

            ;?>

        <p>
           </p>


        <!-- Login Form -->
        <form method="post">
            <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
            <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
            <input type="submit" class="fadeIn fourth" value="Log In">
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
        </div>

    </div>
</div>