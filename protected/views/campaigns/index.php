<!-- DataTables CSS -->
<link href="/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

<!-- DataTables JavaScript -->
<script src="/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Teeshirt Links</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                All Links
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Url</th>
                            <th>Shorten</th>
                            <th>Source</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $count = 0;
                        /** @var Campaigns[] $models */
                        foreach ($models as $model){
                            $count++;
                            $this->renderPartial('_row', array('count'=>$count, 'model'=>$model));
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });

    function edit(element, key) {
        var newStr = prompt("New Link ?");
        if (!newStr)
            return false;

        $.ajax({
            url: '/campaigns/edit',
            data: {
                key: key,
                src: newStr
            },
            success: function (data, code) {
                console.log(element);
                location.reload();
            }
        });
        return false;
    }

    function del(element, key) {
        if (!confirm("Are you sure ?"))
            return false;

        $.ajax({
            url: '/campaigns/delete',
            data: {
                key: key
            },
            success: function (data, code) {
                element.parent().parent().hide();
            }
        });
        return false;
    }
</script>