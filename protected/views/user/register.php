<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Register With Us</h3>
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

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="checkbox checkbox-primary">
                                        <input id="checkbox-signup" type="checkbox" checked="checked">
                                        <label for="checkbox-signup">I accept Terms and Conditions</label>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <?php echo CHtml::errorSummary($model)?>
                                </div>
                            </div>


                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" class="btn btn-lg btn-success btn-block">Register</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>