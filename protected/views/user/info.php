<?php
/**
 * Created by PhpStorm.
 * User: luckymancvp
 * Date: 9/9/15
 * Time: 1:17 AM
 * @var $model Users
 */

?>


<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title">Số Tiền Hiện Có
                <span class="badge">$<?php echo $model->real_balance ?></span></h3></div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="post">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                        <?php
                        echo CHtml::activeTextField(
                            $model,
                            'email',
                            array(
                                'class' => 'form-control input-lg',
                                'placeholder' => "Email",
                                'disabled' => 'disabled',
                            )
                        );
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail4" class="col-sm-3 control-label">Facebook</label>

                    <div class="col-sm-9">
                        <?php
                        echo CHtml::activeTextField(
                            $model,
                            'facebook',
                            array(
                                'class' => 'form-control input-lg',
                                'placeholder' => "Facebook Url",
                            )
                        );
                        ?>
                    </div>
                </div>

                <div class="form-group"><label for="inputPassword3" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                        <?php
                        echo CHtml::activePasswordField(
                            $model,
                            'password',
                            array(
                                'class' => 'form-control input-lg',
                                'placeholder' => "Password"
                            )
                        );
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword4" class="col-sm-3 control-label">Nhập Lại Password</label>

                    <div class="col-sm-9">
                        <?php
                        echo CHtml::activePasswordField(
                            $model,
                            'repeat_password',
                            array(
                                'class' => 'form-control input-lg',
                                'placeholder' => "Password"
                            )
                        );
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <?php echo CHtml::errorSummary($model)?>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Cập Nhập</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>