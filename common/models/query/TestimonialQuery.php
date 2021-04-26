<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Testimonial]].
 *
 * @see \common\models\Testimonial
 */
class TestimonialQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Testimonial[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Testimonial|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
