<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Đăng Bài Về Skins</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<form method="post" enctype="multipart/form-data">
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
                                <labeL>Tên Skin ( Ví Dụ : PvP, Flash, Girl) </labeL>
                                <input type="text" value="<?php echo $skin->name?>" name="skins_name" class="form-control" placeholder="Tên Skin"/>
                            </div>

                            <!--<div class="form-group">
                                <labeL>Ảnh Đại Diện: </labeL>
                                <input type="text" name="feature_image_link" class="form-control"
                                       placeholder="http://"/>

                                <p class="help-block">Ảnh ở vị trí trên đầu trang</p>
                            </div>-->

                            <div class="form-group">
                                <labeL>Skin File: </labeL>
                                <input type="text" value="<?php echo $skin->image_link?>" name="image_link" class="form-control" placeholder="http://"/>
                            </div>

                            <div class="form-group">
                                <labeL>Ảnh Mặt Trước: </labeL>
                                <input type="text" value="<?php echo $skin->front_image_link?>" name="front_image_link" class="form-control" placeholder="http://"/>
                            </div>
                            <div class="form-group">
                                <labeL>Ảnh Mặt Sau: </labeL>
                                <input type="text" value="<?php echo $skin->back_image_link?>" name="back_image_link" class="form-control" placeholder="http://"/>
                            </div>

                            <button type="submit" name="form_submit" class="btn btn-default btn-success">Xử Lý</button>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <labeL>Kết Quả Xử Lý: </labeL>
                                <textarea class="form-control" rows="14"">
                                    <?php echo $content?>
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
