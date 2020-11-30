<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-6">
            <div class="panel panel-default">
                <div class="panel-body" >
                    <div class="text-center">
                        <h3><i class="fa fa-lock fa-4x"></i></h3>
                        <h2 class="text-center">Forgot Password?</h2>
                        <p>Veuillez renseigner votre mail</p>
                        <?php
                        if (isset($errors)){
                            foreach ($errors as $error) {?>

                                <div class="alert alert-danger" role="alert">
                                    <?=$this->clean($error);?>
                                </div>;
                            <?php}
                        }?>
                        <div class="panel-body">

                            <form id="register-form" role="form" class="form" method="post">

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                        <input id="email" name="email" placeholder="email" class="form-control"  type="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>