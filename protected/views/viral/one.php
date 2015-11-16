<?php
/* @var $this ViralController */

$this->breadcrumbs = array(
    'Viral' => array('/viral'),
    'Get',
);
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">GET VIRAL IMAGE TOOL</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Please fill these fields bellow
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Paste Links Viral Here</label>
                                <textarea rows="10" class="form-control" name="links"><?php echo join("\n", $links);?></textarea>

                                <p class="help-block">Separate links line by line</p>
                            </div>
                            <button type="submit" class="btn btn-default btn-success">Submit</button>
                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Result</label>
                            <textarea rows="10" class="form-control"><?php echo join("\n", $res) ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>