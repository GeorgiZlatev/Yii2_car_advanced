<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "car_basic".
 *
 * @property int $id
 * @property string $type_auto
 * @property string $brand
 * @property string $model
 * @property string $year_car
 * @property string $description
 * @property int $start_date
 * @property int|null $end_date
 *
 * @property CarBasicImage[] $carBasicImages
 */
class CarBasic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_basic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_auto', 'brand', 'model', 'year_car', 'description', 'start_date'], 'required'],
            [['description'], 'string'],
            [['start_date', 'end_date'], 'integer'],
            [['type_auto', 'brand', 'model', 'year_car'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type_auto' => Yii::t('app', 'Type Auto'),
            'brand' => Yii::t('app', 'Brand'),
            'model' => Yii::t('app', 'Model'),
            'year_car' => Yii::t('app', 'Year Car'),
            'description' => Yii::t('app', 'Description'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
        ];
    }

    /**
     * Gets query for [[CarBasicImages]].
     *
     * @return \yii\db\ActiveQuery|CarBasicImageQuery
     */
    public function getCarBasicImages()
    {
        return $this->hasMany(CarBasicImage::class, ['car_basic_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return CarBasicQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CarBasicQuery(get_called_class());
    }
}
