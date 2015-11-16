<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tạo Bài Đăng Bất Kỳ</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Các Trường Cần Điền
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="section-list">

                        </div>
                        <a id="add-section-btn" class="btn btn-default btn-warning">Thêm Đầu Đề</a>
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

<script type="text/template" id="section-template">
    <div class="section">
        <div class="row">
            <div class="form-group col-sm-6">
                <labeL>Tên tiêu đề</labeL>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group col-sm-6">
                <a target="_blank" href="http://fortawesome.github.io/Font-Awesome/cheatsheet/">Icon</a>
                <input type="text" name="icon" class="form-control" value="fa-book">
            </div>
        </div>
        <div class="form-group">
            <labeL>Nội dung</labeL>
            <textarea class="form-control editor" name="content" style="height: 300px;">
                xxx TODO xxxx
            </textarea>
        </div>

    </div>
</script>

<script type="text/template" id="template">
    <!--Start Section-->
    <div class="custom-post post-content">
        <h2><i class="fa <%= icon%>"></i><%= title%></h2>

        <div class="content-inside">
            <%= content%>
        </div>
    </div>
    <!-- End Of Section-->
</script>

<script>
    $(document).ready(function () {
        $('#add-section-btn').click(function (e) {
            e.preventDefault();
            var template = _.template($('#section-template').html());
            var html = template({});
            $("#section-list").append(html);
            $(".section:last textarea").summernote({height: 150});
        });


        $('button[name="form_submit"]').click(function (e) {
            e.preventDefault();
            var template = _.template($('#template').html());
            var output = '';
            $('.section').each(function () {
                var model = {
                    icon: $(this).find('[name="icon"]').val(),
                    title: $(this).find('[name="title"]').val(),
                    content: $(this).find('[name="content"]').code()
                };
                output += template(model);
            });
            $('[name="result"]').val(output);
        });

        // For testing
        $('#add-section-btn').click();
    });
</script>
<style>
    /*.editor {overflow:scroll; max-height:500px}*/
</style>