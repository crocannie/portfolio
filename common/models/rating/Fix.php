<?php

namespace common\models\rating;

use Yii;
use common\models\Sotrudnik;
use common\models\ParticipationSport;
error_reporting(E_ERROR);

class Fix {
	public function all($idFacultet, $idActivity, $cnt){
        $all = 'SELECT tt.* FROM studentrating tt INNER JOIN (SELECT idStudent, MAX(r1) AS maxr FROM studentrating where idFacultet=:id GROUP BY idStudent) groupedtt ON tt.idStudent = groupedtt.idStudent AND tt.r1 = groupedtt.maxr';
        $st = Yii::$app->db->createCommand($all)
                                ->bindValue(':id', $idFacultet)
                                ->queryAll();
        foreach ($st as $row) {
            $a[] = $row['id'];
        }
        $comma_separated = implode(",", $a);

        $sql = 'SELECT r.* FROM studentRating r, students s, sgroup g, educationLevel e, napravlenie n  WHERE r.idFacultet = :idFacultet and r.idActivity = :idActivity and r.idStudent = s.idStudent and s.idGroup = g.id and s.idLevel = e.id and s.idNapravlenie = n.id and r.id in('.$comma_separated.') ORDER BY r1 DESC limit '.$cnt;
        $students_study = Yii::$app->db->createCommand($sql)
                                ->bindValue(':idFacultet', $idFacultet)
                                ->bindValue(':idActivity', $idActivity)
                                // ->bindValue(':cnt', $cnt)
                                ->queryAll();
        $array_student = [];
        foreach ($students_study as $row ) {
            array_push($array_student, $row['idStudent']);
        }
        return $array_student;
	}
	public function updateRating($array_student, $idActivity){
        for ($i = 0; $i < count($array_student); $i++){
            // $update_study = Yii::$app->db->createCommand()->update('studentRating', array(
            //     'status'=>'1',
            //     ), 'idStudent=:idStudent', 'idActivity=:idActivity', array(':idStudent'=>$array_student[$i], ':idActivity'=>$idActivity))->execute();
           $update_study = Yii::$app->db->createCommand("UPDATE studentRating SET status=2 WHERE idStudent= ".$array_student[$i]." and idActivity = ".$idActivity)->execute();
        
        }
	}
}