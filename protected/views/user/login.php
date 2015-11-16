<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post">
                        <fieldset>
                            <div class="form-group">
                                <?php
                                echo CHtml::activeTextField(
                                    $model,
                                    'email',
                                    array(
                                        'class' => 'form-control',
                                        'placeholder' => "Email"
                                    )
                                );
                                ?>
                            </div>
                            <div class="form-group">
                                <?php
                                echo CHtml::activePasswordField(
                                    $model,
                                    'password',
                                    array(
                                        'class' => 'form-control',
                                        'placeholder' => "******"
                                    )
                                );
                                ?>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>