<?php
/* @var $this LinksController */

$this->breadcrumbs = array(
    'Viral' => array('/viral'),
    'Get',
);
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">CREATE REDIRECT LINK</h1>
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
                                <label>Enter Your Favourite Secret Key (For later use) </label>
                                <input type="text" name="key" class="form-control" value="<?php echo $key ?>"/>
                            </div>


                            <div class="form-group">
                                <label>Choose your favourite separator </label>
                                <select class="form-control" name="sep">
                                    <option value="tab">TAB</option>
                                    <option value="comma">COMMA</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Paste Redirect Link Here. Separate by a Tab </label>
                                <textarea rows="10" class="form-control" name="links"><?php echo join("\n", $links);?></textarea>

                                <p class="help-block">
                                    Separate links line by line. Example:
                                    <br>
                                    Source Link 1<code>separator</code> Description Link 1<code>enter</code>
                                    <br>
                                    Source Link 2<code>separator</code> Description Link 2<code>enter</code>
                                </p>
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