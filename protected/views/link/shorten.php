<form method="post">
    <?php
    echo CHtml::textArea('raw', $raw, array(
        'cols' => 100,
        'rows' => 20
    ));
    echo CHtml::textArea('res', $res, array(
        'cols' => 100,
        'rows' => 20
    ));
    ?>

    <input type="submit">
</form>