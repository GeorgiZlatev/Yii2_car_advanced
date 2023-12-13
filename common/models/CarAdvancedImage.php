<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "car_advanced_image".
 *
 * @property int $id
 * @property int $car_advanced_id
 * @property int $file_id
 *
 * @property CarAdvanced $carAdvanced
 * @property File $file
 */
class CarAdvancedImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_advanced_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_advanced_id', 'file_id'], 'required'],
            [['car_advanced_id', 'file_id'], 'integer'],
            [['car_advanced_id'], 'exist', 'skipOnError' => true, 'targetClass' => CarAdvanced::class, 'targetAttribute' => ['car_advanced_id' => 'id']],
            [['file_id'], 'exist', 'skipOnError' => true, 'targetClass' => File::class, 'targetAttribute' => ['file_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'car_advanced_id' => Yii::t('app', 'Car Advanced ID'),
            'file_id' => Yii::t('app', 'File ID'),
        ];
    }

    /**
     * Gets query for [[CarAdvanced]].
     *
     * @return \yii\db\ActiveQuery|CarAdvancedQuery
     */
    public function getCarAdvanced()
    {
        return $this->hasOne(CarAdvanced::class, ['id' => 'car_advanced_id']);
    }

    /**
     * Gets query for [[File]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getFile()
    {
        return $this->hasOne(File::class, ['id' => 'file_id']);
    }

    /**
     * {@inheritdoc}
     * @return CarAdvancedImageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CarAdvancedImageQuery(get_called_class());
    }

    public function getProject()
    {
        return $this->hasOne(CarAdvanced::class, ['id' => 'car_advanced_id']);
    }
}
