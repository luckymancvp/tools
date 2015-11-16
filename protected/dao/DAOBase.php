<?php

abstract class DAOBase extends CActiveRecord
{
    public function findByRewrite($rewrite)
    {
        return $this->findByAttributes(array(
            'rewrite' => $rewrite,
        ));
    }

    public function sort($param, $order = 'DESC', $page = 1, $itemsPerPage = 10)
    {
        $criteria = new CDbCriteria();
        $criteria->order = "`$param` $order";
        $criteria->limit = $itemsPerPage;
        $criteria->offset = $itemsPerPage * ($page - 1);

        return $this->findAll($criteria);
    }

    protected function beforeSave()
    {
        if ($this->hasAttribute('updatedAt')) {
            $this->updatedAt = new CDbExpression('NOW()');
            if ($this->isNewRecord) {
                if ($this->hasAttribute('createdAt'))
                    $this->createdAt = new CDbExpression('NOW()');
            };
        };
        return parent::beforeSave();
    }
}