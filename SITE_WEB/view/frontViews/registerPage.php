<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->


        <?php
        if (isset($errors)) {
            foreach ($errors as $error) {

                echo
                    '<div class="alert alert-danger" role="alert" style="margin-left: 30%;
    margin-right: 30%;text-align: center; margin-top: 2%">' . $error . '</div>'
                ;
            }
        }
        ;?>

        <!-- register Form -->
        <form method="post">
            <div class="row">

                <div class="col-md-12">
                    <input type="text"   name="username"  autocomplete="username" placeholder="username">

                    <input type="text" id="name"  name="name" placeholder="name">
                    <input type="text" id="firstname"  name="firstname" placeholder="firstname">
                </div>
                <div class="col-md-12">
                    <input type="email" id="e-mail"  name="email" placeholder="e-mail">
                    <input type="password" id="password"  name="password" placeholder="password ">
                    <input type="password" id="password2"  name="password2"
                           placeholder="Password Confirmation">
                </div>
            </div>
            <input type="submit" class="fadeIn fourth center" value="s'enregistrer">


        </form>


    </div>
</div>