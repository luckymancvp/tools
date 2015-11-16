<?php
/**
 * Created by PhpStorm.
 * User: luckymancvp
 * Date: 11/16/15
 * Time: 12:05 PM
 * @var Campaigns $model
 */
?>

<tr class="<?php echo $count % 2 == 0 ? 'odd' : 'even' ?>">
    <td>
        <?php echo $count?>
    </td>
    <td>
        <?php echo CHtml::link(
            $model->key,
            $this->createUrl('/campaigns/view', array('key'=>$model->key))
        );?>
    </td>
    <td>
        <?php echo CHtml::link(
            $model->shorten,
            $model->shorten
        );?>
    </td>
    <td>
        <?php echo CHtml::link(
            $model->src,
            $model->src
        );?>
    </td>
    <td class="center">
        <?php
        echo CHtml::link(
            'Edit',
            array('/campaign/edit', 'key' => $model->key),
            array(
                'class' => 'btn btn-info',
                'onclick' => "return edit($(this), '{$model->key}')"
            )
        );

        echo " ";

        echo CHtml::link(
            'Delete',
            array('#'),
            array(
                'class' => 'btn btn-danger',
                'onclick' => "return del($(this), '$model->key')",
            )
        );
        ?>
    </td>
</tr>
