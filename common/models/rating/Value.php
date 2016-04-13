<?php

namespace common\models\rating;

use Yii;
use common\models\Sotrudnik;
use common\models\ParticipationSport;

class Value {
	public function getStatus($id){
        $sql = 'select valuesRating.id as idValue, statusEvent.name, statusEvent.id, valuesRating.idTable, valuesRating.idItem, statusEvent.name, valuesRating.value, valuesRating.idFacultet from statusEvent, valuesRating where valuesRating.idFacultet = :id and statusEvent.id = valuesRating.idItem and valuesRating.idTable = 1';
        $status = Yii::$app->db->createCommand($sql)
                                ->bindValue(':id', $id)
                                ->queryAll();
        return $status;                             
    }

    public function getContest($id){
        $sql = 'select valuesRating.id as idValue, eventType.name, eventType.id, valuesRating.idTable, valuesRating.idItem, eventType.name, valuesRating.value, valuesRating.idFacultet from eventType, valuesRating where valuesRating.idFacultet = :id and eventType.id = valuesRating.idItem and valuesRating.idTable = 2';
        $status = Yii::$app->db->createCommand($sql)
                                ->bindValue(':id', $id)
                                ->queryAll();
        return $status;                             
    }

    public function getDocument($id){
        $sql = 'select valuesRating.id as idValue, typeDocument.name, typeDocument.id, valuesRating.idTable, valuesRating.idItem, typeDocument.name, valuesRating.value, valuesRating.idFacultet from typeDocument, valuesRating where valuesRating.idFacultet = :id and typeDocument.id = valuesRating.idItem and valuesRating.idTable = 3';
        $status = Yii::$app->db->createCommand($sql)
                                ->bindValue(':id', $id)
                                ->queryAll();
        return $status;                             
    }

    public function getArticle($id){
        $sql = 'select valuesRating.id as idValue, typeArticle.name, typeArticle.id, valuesRating.idTable, valuesRating.idItem, typeArticle.name, valuesRating.value, valuesRating.idFacultet from typeArticle, valuesRating where valuesRating.idFacultet = :id and typeArticle.id = valuesRating.idItem and valuesRating.idTable = 4';
        $status = Yii::$app->db->createCommand($sql)
                                ->bindValue(':id', $id)
                                ->queryAll();
        return $status;                             
    }

	public function getScience($id){
        $sql = 'select valuesRating.id as idValue, scienceDirection.name, scienceDirection.id, valuesRating.idTable, valuesRating.idItem, scienceDirection.name, valuesRating.value, valuesRating.idFacultet from scienceDirection, valuesRating where valuesRating.idFacultet = :id and scienceDirection.id = valuesRating.idItem and valuesRating.idTable = 5';
        $status = Yii::$app->db->createCommand($sql)
                                ->bindValue(':id', $id)
                                ->queryAll();
        return $status;                             
    }

	public function getPatent($id){
        $sql = 'select valuesRating.id as idValue, typePatent.name, typePatent.id, valuesRating.idTable, valuesRating.idItem, typePatent.name, valuesRating.value, valuesRating.idFacultet from typePatent, valuesRating where valuesRating.idFacultet = :id and typePatent.id = valuesRating.idItem and valuesRating.idTable = 6';
        $status = Yii::$app->db->createCommand($sql)
                                ->bindValue(':id', $id)
                                ->queryAll();
        return $status;                             
    }

	public function getTypeContest($id){
        $sql = 'select valuesRating.id as idValue, typeContest.name, typeContest.id, valuesRating.idTable, valuesRating.idItem, typeContest.name, valuesRating.value, valuesRating.idFacultet from typeContest, valuesRating where valuesRating.idFacultet = :id and typeContest.id = valuesRating.idItem and valuesRating.idTable = 7';
        $status = Yii::$app->db->createCommand($sql)
                                ->bindValue(':id', $id)
                                ->queryAll();
        return $status;                             
    }

	public function getEducationLevel($id){
        $sql = 'select valuesRating.id as idValue, educationLevel.name, educationLevel.id, valuesRating.idTable, valuesRating.idItem, educationLevel.name, valuesRating.value, valuesRating.idFacultet from educationLevel, valuesRating where valuesRating.idFacultet = :id and educationLevel.id = valuesRating.idItem and valuesRating.idTable = 8';
        $status = Yii::$app->db->createCommand($sql)
                                ->bindValue(':id', $id)
                                ->queryAll();
        return $status;                             
    }

	public function getAuthorship($id){
        $sql = 'select valuesRating.id as idValue, authorship.name, authorship.id, valuesRating.idTable, valuesRating.idItem, authorship.name, valuesRating.value, valuesRating.idFacultet from authorship, valuesRating where valuesRating.idFacultet = :id and authorship.id = valuesRating.idItem and valuesRating.idTable = 9';
        $status = Yii::$app->db->createCommand($sql)
                                ->bindValue(':id', $id)
                                ->queryAll();
        return $status;                             
    }
	
	public function getStatuspatent($id){
        $sql = 'select valuesRating.id as idValue, statusPatent.name, statusPatent.id, valuesRating.idTable, valuesRating.idItem, statusPatent.name, valuesRating.value, valuesRating.idFacultet from statusPatent, valuesRating where valuesRating.idFacultet = :id and statusPatent.id = valuesRating.idItem and valuesRating.idTable = 10';
        $status = Yii::$app->db->createCommand($sql)
                                ->bindValue(':id', $id)
                                ->queryAll();
        return $status;                             
    }

    public function getActivity($id){
           $sql = 'select valuesRating.id as idValue, activity.name, activity.id, valuesRating.idTable, valuesRating.idItem, activity.name, valuesRating.value, valuesRating.idFacultet from activity, valuesRating where valuesRating.idFacultet = :id and activity.id = valuesRating.idItem and valuesRating.idTable = 11';
           $status = Yii::$app->db->createCommand($sql)
                                   ->bindValue(':id', $id)
                                   ->queryAll();
           return $status;                             
    }

    //Студенты по учебной
    public function getStudent($id){
           $sql = ' select s.idFacultet, rs.idStudent, s.firstName, s.secondName, s.midleName, el.name as kurs, n.name as napravlenie, n.shifr, sg.name as groupn, rs.mark, ac.name as activity, (rs.R1+rs.R2+rs.R3) as sum
                    from students s, educationLevel el, napravlenie n, sgroup sg, studentRating rs, activity ac
                    WHERE s.idFacultet = :id
                    and s.idStudent = rs.idStudent
                    and el.id = s.idLevel
                    and n.id = s.idNapravlenie
                    and sg.id = s.idGroup
                    and rs.idActivity = ac.id
                    ';
           $status = Yii::$app->db->createCommand($sql)
                                   ->bindValue(':id', $id)
                                   ->queryAll();
           return $status;                             
    }
    //Рейтинг по учебной
    public function getStudy($idFacultet, $idStudent){

        $status = Yii::$app->db->createCommand('
                            select r.value, a.dateEvent, a.name, a.idStatus, r.idItem
                            from valuesRating r, achievements a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 1
                            and r.idItem = a.idStatus
                            and a.idStudent = :idStudent
                            and a.dateEvent BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();
        $type = Yii::$app->db->createCommand('
                            select r.value, a.dateEvent, a.name, a.idStatus, r.idItem
                            from valuesRating r, achievements a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 2
                            and r.idItem = a.idEventType
                            and a.idStudent = :idStudent
                            and a.dateEvent BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();

        $doc = Yii::$app->db->createCommand('
                            select r.value, a.dateEvent, a.name, a.idStatus, r.idItem
                            from valuesRating r, achievements a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 3
                            and r.idItem = a.idDocumentType
                            and a.idStudent = :idStudent
                            and a.dateEvent BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();
        $R1 = null;
        for ($i = 0; $i < count($status); $i++){
            $R1 =+ ($status[$i]['value'] * $type[$i]['value'] * $doc[$i]['value']);
        }
        return $R1;
    }

    //Рейтинг по спортивной
    public function getSport($idFacultet, $idStudent){

        $status = Yii::$app->db->createCommand('
                            select r.value, a.year, a.name, a.idStatus, r.idItem
                            from valuesRating r, achievementsSport a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 1
                            and r.idItem = a.idStatus
                            and a.idStudent = :idStudent
                            and a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();
        $type = Yii::$app->db->createCommand('
                            select r.value, a.year, a.name, a.idStatus, r.idItem
                            from valuesRating r, achievementsSport a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 2
                            and r.idItem = a.idTypeContest
                            and a.idStudent = :idStudent
                            and a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();

        $doc = Yii::$app->db->createCommand('
                            select r.value, a.year, a.name, a.idStatus, r.idItem
                            from valuesRating r, achievementsSport a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 3
                            and r.idItem = a.idDocumentType
                            and a.idStudent = :idStudent
                            and a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();
        $R1 = null;
            for ($i = 0; $i < count($status); $i++){
                $R1 += ($status[$i]['value'] * $type[$i]['value'] * $doc[$i]['value']);
            }

        $today = date("Y-m-d");
        $last = date('Y-m-d', strtotime('-2 years'));
       
        $cnt = Yii::$app->db->createCommand('
                            select a.*
                            from sportParticipation  a
                            where a.idStudent = :idStudent
                            and a.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();
        $R2 = null;                    
        foreach ($cnt as $row){
            $R2 += $row['count']*0.5;
        }
        // return $R2 = $count * 1;
        // return $R1;
        return $R1 + $R2;
    }

    public function getSociety($idFacultet, $idStudent){
        $cnt = Yii::$app->db->createCommand('
                            select a.*
                            from socialParticipation  a
                            where a.idStudent = :idStudent
                            and a.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();
        $R1 = null;                    
        foreach ($cnt as $row){
            $R1 += $row['count']*0.5;
        }
        return $R1;
    }

    public function getCulture($idFacultet, $idStudent){
        $status1 = Yii::$app->db->createCommand('
                            select r.value, a.year, a.name, a.idStatus, r.idItem
                            from valuesRating r, achievementsKTD a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 1
                            and r.idItem = a.idStatus
                            and a.idStudent = :idStudent
                            and a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();
        $type = Yii::$app->db->createCommand('
                            select r.value, a.year, a.name, a.idStatus, r.idItem
                            from valuesRating r, achievementsKTD a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 2
                            and r.idItem = a.idTypeContest
                            and a.idStudent = :idStudent
                            and a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();

        $doc1 = Yii::$app->db->createCommand('
                            select r.value, a.year, a.name, a.idStatus, r.idItem
                            from valuesRating r, achievementsKTD a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 3
                            and r.idItem = a.idDocumentType
                            and a.idStudent = :idStudent
                            and a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();
        $R1 = null;
            for ($i = 0; $i < count($status1); $i++){
                $R1 += ($status1[$i]['value'] * $type[$i]['value'] * $doc1[$i]['value']);
            }

        $status2 = Yii::$app->db->createCommand('
                            select r.value, a.year, a.name, a.idStatus, r.idItem
                            from valuesRating r, publicPerformance a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 1
                            and r.idItem = a.idStatus
                            and a.idStudent = :idStudent
                            and a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();

        $doc2 = Yii::$app->db->createCommand('
                            select r.value, a.year, a.name, a.idStatus, r.idItem
                            from valuesRating r, publicPerformance a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 3
                            and r.idItem = a.idDocumentType
                            and a.idStudent = :idStudent
                            and a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();

        $R2 = null;
            for ($i = 0; $i < count($status2); $i++){
                $R2 += ($status2[$i]['value'] * $doc2[$i]['value']);
            }

        $cnt = Yii::$app->db->createCommand('
                            select a.*
                            from ktdParticipation  a
                            where a.idStudent = :idStudent
                            and a.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();
        $R3 = null;                    
        foreach ($cnt as $row){
            $R3 += $row['count']*0.5;
        }
        return $R1 + $R2 + $R3;
    }
}