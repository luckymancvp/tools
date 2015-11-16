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
                        <div class="col-lg-12">
                            <div class="form-group">
                                <labeL> Giới thiệu </labeL>
                                <textarea class="form-control editor" name="feature" style="height: 300px;"></textarea>
                            </div>

                            <div class="form-group">
                                <labeL>Screenshots </labeL>
                            </div>

                            <div class="form-group">
                                <labeL>Youtube</labeL>
                                <input type="text" value="" name="youtube" class="form-control"
                                       placeholder="Embeded Youtube code"/>
                            </div>
                            <div class="form-group">
                                <labeL>Hướng Dẫn Cài Đặt</labeL>
                                <textarea class="form-control editor" name="install" rows="5">
                                    <ul>
                                        <li>Download and Install Minecraft Forge</li>
                                        <li>Download the mod</li>
                                        <li>Go to .minecraft/mods folder</li>
                                        <li>Drag and drop the downloaded jar (zip) file into it</li>
                                        <li>If one does not exist you can create one<br></li>
                                    </ul>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <labeL>Link Download</labeL>
                                <textarea class="form-control editor" name="download" rows="5"></textarea>
                            </div>

                            <button type="submit" name="form_submit" class="btn btn-default btn-success">Xử Lý</button>
                        </div>
                        <div class="col-lg-12 text-center">
                            <div class="form-group">
                                <labeL>Kết Quả Xử Lý: </labeL>
                                <textarea class="form-control" rows="14" name="result">
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>

<script type="text/template" id="template">
    <% if(feature){%>
    <!-- Start Features -->
    <div class="post-content" id="feature">
        <h2><i class="fa fa-book"></i>Features</h2>

        <div class="content-inside">
            <%= feature%>
        </div>
    </div>
    <!-- End -->
    <% }%>

    <!-- Start Features -->
    <div class="post-content" id="screenshots">
        <h2><i class="fa fa-camera"></i>Screenshots</h2>

        <div class="content-inside">
            xxx TODO: FILL SCREENSHOTS HERE xxx
        </div>
    </div>
    <!-- End -->
    <% if(download){%>

    <!-- Start downloads -->
    <div class="post-content" id="downloads">
        <h2><i class="fa fa-download"></i>Download</h2>

        <div class="content-inside">
            <%= download%>
        </div>
    </div>
    <!-- End -->
    <% }%>


    <% if(install){%>
        <!-- Start Install -->
    <div class="post-content" id="install">
        <h2><i class="fa fa-wrench"></i>Install</h2>

        <div class="content-inside">
                <%= install%>
            </div>
    </div>
    <!-- End -->
    <% }%>

    <% if(youtube){%>
    <!-- Start youtube -->
    <div class="youtube">
        <%= youtube%>
    </div>
    <!-- End -->
    <% }%>
</script>

<script>
    $(document).ready(function () {
        $('.editor').summernote({
            /*toolbar: [
             ['style', ['style']],
             ['font', ['bold', 'italic', 'underline', 'clear']],
             ['fontname', ['fontname']],
             ['color', ['color']],
             ['para', ['ul', 'ol', 'paragraph']],
             ['height', ['height']],
             ['table', ['table']],
             ['insert', ['link', 'picture', 'hr']],
             ['view', ['fullscreen', 'codeview']],
             ['help', ['help']]
             ],*/
            height: 150
        });


        $('button[name="form_submit"]').click(function (e) {
            e.preventDefault();
            var template = _.template($('#template').html());
            var model = {
                feature: $('[name="feature"]').code(),
                youtube: $('[name="youtube"]').val(),
                install: $('[name="install"]').code(),
                download: $('[name="download"]').code()
            }
            var output = template(model);
            $('[name="result"]').val(output);
        });
    });
</script>
<style>
    /*.editor {overflow:scroll; max-height:500px}*/
</style>