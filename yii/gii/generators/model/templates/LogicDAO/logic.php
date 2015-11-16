<?php echo "<?php\n"; ?>
class <?php echo $modelClass; ?> extends <?php echo $modelClass."Base\n"; ?>
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return <?php echo $modelClass; ?> the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}