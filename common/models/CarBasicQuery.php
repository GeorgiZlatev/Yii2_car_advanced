<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[CarBasic]].
 *
 * @see CarBasic
 */
class CarBasicQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return CarBasic[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CarBasic|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
