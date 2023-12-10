<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "car_advanced".
 *
 * @property int $id
 * @property string $type_auto
 * @property string $brand
 * @property string $model
 * @property string $year_car
 * @property string $description
 * @property string|null $start_date
 * @property string|null $end_date
 *
 * @property CarAdvancedImage[] $carAdvancedImages
 */
class CarAdvanced extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_advanced';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_auto', 'brand', 'model', 'year_car', 'description'], 'required'],
            [['brand', 'model', 'year_car', 'description'], 'string'],
            [['start_date', 'end_date'], 'safe'],
            [['type_auto'], 'string', 'max' => 255],
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
     * Gets query for [[CarAdvancedImages]].
     *
     * @return \yii\db\ActiveQuery|CarAdvancedImageQuery
     */
    public function getCarAdvancedImages()
    {
        return $this->hasMany(CarAdvancedImage::class, ['car_advanced_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return CarAdvancedQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CarAdvancedQuery(get_called_class());
    }
}
