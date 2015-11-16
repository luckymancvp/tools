<?php
/* @var $this FbController */
/* @var $model PageForm */
/* @var $form CActiveForm */
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Đăng Bài Lên Page Facebook</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<?php $form=$this->beginWidget('CActiveForm', array(
    'enableClientValidation'=>true,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Các Trường Cần Điền
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?php echo $form->labelEx($model,'access_token'); ?>
                            <?php echo $form->textField($model, 'access_token', array(
                                'class' => 'form-control',
                            ))?>
                            <?php echo $form->error($model, 'access_token')?>
                            <p class="help-block">Lấy AccessToken Tại <a href="https://developers.facebook.com/tools/explorer/145634995501895">Đây</a></p>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model,'campaigns'); ?>
                            <?php echo $form->textArea($model, 'campaigns', array(
                                'class' => 'form-control',
                                'rows' => 5,
                            ))?>
                            <?php echo $form->error($model, 'campaigns')?>
                            <p class="help-block">Nhập Campaign Id. Mỗi ID một dòng</p>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model,'status'); ?>
                            <?php echo $form->dropDownList($model, 'status', CampaignForm::actionList(), array(
                                'class' => 'form-control',
                            ))?>
                            <?php echo $form->error($model, 'status')?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model,'delay'); ?>
                            <?php echo $form->textField($model, 'delay', array(
                                'class' => 'form-control',
                            ))?>
                            <?php echo $form->error($model, 'delay')?>
                            <p class="help-block">Chọn thời gian theo giây</p>
                        </div>


                        <form role="form">

                            <button type="submit" class="btn btn-default btn-success">Gửi</button>
                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?php echo $form->labelEx($model,'res'); ?>
                            <?php echo $form->textArea($model, 'res', array(
                                'class' => 'form-control',
                                'rows' => 5,
                            ))?>
                            <?php echo $form->error($model, 'res')?>
                        </div>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

<?php $this->endWidget()?>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Hướng Dẫn Sử Dụng
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <ul>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>