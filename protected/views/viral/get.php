<?php
/* @var $this ViralController */

$this->breadcrumbs = array(
    'Viral' => array('/viral'),
    'Get',
);
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">GET VIRAL IMAGES TOOL</h1>
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
                        <form role="form"  method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Csv File</label>
                                <input type="file" name="file"/>

                                <p class="help-block">Choose csv file contains viral links</p>
                            </div>
                            <button type="submit" name="submit" class="btn btn-default btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>