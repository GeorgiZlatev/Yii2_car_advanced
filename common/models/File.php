<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "file".
 *
 * @property int $id
 * @property string $name
 * @property string $base_url
 * @property string $mime_type
 *
 * @property CarAdvancedImage[] $carAdvancedImages
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'base_url', 'mime_type'], 'required'],
            [['name', 'base_url', 'mime_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'base_url' => Yii::t('app', 'Base Url'),
            'mime_type' => Yii::t('app', 'Mime Type'),
        ];
    }

    /**
     * Gets query for [[CarAdvancedImages]].
     *
     * @return \yii\db\ActiveQuery|CarAdvancedImageQuery
     */
    public function getCarAdvancedImages()
    {
        return $this->hasMany(CarAdvancedImage::class, ['file_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return FileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FileQuery(get_called_class());
    }

    public function absoluteUrl(){
        return $this->base_url . '/' . $this->name;
    }
}
