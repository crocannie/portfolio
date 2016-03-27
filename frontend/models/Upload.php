<?php
namespace frontend\models;
use yii\base\Model;
use Yii;
use yii\web\UploadedFile;

 error_reporting (E_ERROR);
class Upload extends Model
{

    public function upload($model, $id)
    {                
        $path = 'uploads/'.$id.'/';
            if (!file_exists($path)){
                mkdir('uploads/'.$id, 0777, true);
            }

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        for ($i = 0; $i < 10; $i++) {
            $code = substr (str_shuffle ($characters), 0, 3);
        }
        $model->file = UploadedFile::getInstance($model, 'file');
        $filename = $model->file->baseName;
        $filename = str_replace(" ",'', $filename);
        $model->file->saveAs( $path.$filename.'('.$code.').'.$model->file->extension);
        $model->location = $path.$filename.'('.$code.').'.$model->file->extension;
        $model->idStudent = Yii::$app->user->identity->id;
        $model->save();
        return $path;
    }
}
