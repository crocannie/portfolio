<?php
use Yii;

   	$sql = "UPDATE studentRating SET status = ".$_POST['status'];
    $status = Yii::$app->db->createCommand($sql)
                                // ->bindValue(':id', $id)
                                // ->queryAll()
                                ;
                                ?>