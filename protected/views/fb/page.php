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
                            <span class="text-danger"><?php echo $form->error($model, 'access_token')?></span>
                            <p class="help-block">Lấy AccessToken Tại <a href="https://developers.facebook.com/tools/explorer/145634995501895">Đây</a></p>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model,'page_id'); ?>
                            <?php echo $form->textField($model, 'page_id', array(
                                'class' => 'form-control',
                            ))?>
                            <span class="text-danger"><?php echo $form->error($model, 'page_id')?></span>
                        </div>

                        <form role="form">
                            <div class="form-group">
                                <?php echo $form->labelEx($model,'file'); ?>
                                <?php echo $form->fileField($model, 'file')?>
                                <?php echo $form->error($model, 'file')?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model,'content_template'); ?>
                                <?php echo $form->textArea($model, 'content_template', array(
                                    'class' => 'form-control',
                                    'rows' => 5,
                                ))?>
                                <?php echo $form->error($model, 'content_template')?>
                                <p class="help-block">
                                Hướng dẫn cách tuỳ biến nội dung theo tên file
                                <ul>
                                    <li><code>{link}</code> thay cho phần link trong file csv </li>
                                    <li><code>{1}</code> ứng với tên file</li>
                                    <li>
                                        Trong trường hợp tên file chứa dấu <code>-</code> thì tên file được tách ra thành
                                        <code>{1}</code> và <code>{2}</code>. Ví dụ tên file là NEWYORK-CHICAGO thì
                                        <code>{1}</code> là NEWYORK và <code>{2}</code> là CHICAGO
                                    </li>
                                </ul>
                                </p>
                            </div>


                            <div class="form-group">
                                <?php echo $form->labelEx($model,'start'); ?>
                                <?php echo $form->textField($model, 'start', array(
                                    'class' => 'form-control',
                                ))?>
                                <?php echo $form->error($model, 'start')?>
                                <p class="help-block">Phục Vụ khi nào có lỗi. -1 tức là bắt đầu từ đầu</p>
                            </div>

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
                            <li>Lấy Access Token từ trang GraphApi Debugger trong khi đăng nhập với account FB tạo Page</li>
                            <li>Điền Page ID thường là số đi ngay đằng sau url của Page</li>
                            <li>Format của file csv: Tên File Design, Tiếp theo là ảnh upload, Link Sản Phẩm. </li>
                            <li>Nội dung bài viết sử dụng {name} và {link} để replace</li>
                            <li>Kết quả sau khi đăng là dãy các id album hoặc photo được tạo.</li>
                            <li>Lưu ý: mỗi lần làm, là phải lấy access token khác nhau. Ảnh trong csv có thể là file trong máy, hoặc là link trên mạng. Tuy nhiên chúng phải cùng 1 kiểu : hoặc local file, hoặc link</li>
                            <li>Link file csv demo : <a href="/demo.csv">demo</a></li>
                            <li>Access Token thường chỉ có hiệu lực trong 1 tiếng. Do đó khi xảy ra lỗi, copy tên bị lỗi vào dòng <strong>Bắt đầu từ</strong>để tiếp tục từ dòng đó</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>