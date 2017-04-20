<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Gratter]].
 *
 * @see Gratter
 */
class GratterQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Gratter[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Gratter|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
