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

    public function getLevel($id){
           $sql = 'select valuesRating.id as idValue, level.name, level.id, valuesRating.idTable, valuesRating.idItem, level.name, valuesRating.value, valuesRating.idFacultet from level, valuesRating where valuesRating.idFacultet = :id and level.id = valuesRating.idItem and valuesRating.idTable = 12';
           $status = Yii::$app->db->createCommand($sql)
                                   ->bindValue(':id', $id)
                                   ->queryAll();
           return $status;                             
    }

    public function getGrant($id){
           $sql = 'select valuesRating.id as idValue, grantType.name, grantType.id, valuesRating.idTable, valuesRating.idItem, grantType.name, valuesRating.value, valuesRating.idFacultet from grantType, valuesRating where valuesRating.idFacultet = :id and grantType.id = valuesRating.idItem and valuesRating.idTable = 13';
           $status = Yii::$app->db->createCommand($sql)
                                   ->bindValue(':id', $id)
                                   ->queryAll();
           return $status;                             
    }

    public function getTypeParticipant($id){
           $sql = 'select valuesRating.id as idValue, typeParticipant.name, typeParticipant.id, valuesRating.idTable, valuesRating.idItem, typeParticipant.name, valuesRating.value, valuesRating.idFacultet from typeParticipant, valuesRating where valuesRating.idFacultet = :id and typeParticipant.id = valuesRating.idItem and valuesRating.idTable = 14';
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
                            select r.value, a.dateEvent, a.name, a.idEventType, r.idItem
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
                            select r.value, a.dateEvent, a.name, a.idDocumentType, r.idItem
                            from valuesRating r, achievements a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 3
                            and r.idItem = a.idDocumentType
                            and a.idStudent = :idStudent
                            and a.dateEvent BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();

        $level = Yii::$app->db->createCommand('
                            select r.value, a.dateEvent, a.name, a.idLevel, r.idItem
                            from valuesRating r, achievements a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 12
                            and r.idItem = a.idLevel
                            and a.idStudent = :idStudent
                            and a.dateEvent BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();

        $R1 = null;
        for ($i = 0; $i < count($status); $i++){
            $R1 =+ ($status[$i]['value'] * $type[$i]['value'] * $doc[$i]['value'] * $level[$i]['value']);
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

        $level = Yii::$app->db->createCommand('
                            select r.value, a.year, a.name, a.idLevel, r.idItem
                            from valuesRating r, achievementsSport a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 12
                            and r.idItem = a.idLevel
                            and a.idStudent = :idStudent
                            and a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();
        $R1 = null;
            for ($i = 0; $i < count($status); $i++){
                $R1 += ($status[$i]['value'] * $type[$i]['value'] * $doc[$i]['value'] * $level[$i]['value']);
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

        $status1 = Yii::$app->db->createCommand('
                            select r.value, a.date, a.description, a.idStatus, r.idItem
                            from valuesRating r, sportParticipation a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 1
                            and r.idItem = a.idStatus
                            and a.idStudent = :idStudent
                            and a.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();
        $type1 = Yii::$app->db->createCommand('
                            select r.value, a.date, a.description, a.idTypeParticipant, r.idItem
                            from valuesRating r, sportParticipation a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 2
                            and r.idItem = a.idTypeParticipant
                            and a.idStudent = :idStudent
                            and a.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();


        $level1 = Yii::$app->db->createCommand('
                            select r.value, a.date, a.description, a.idLevel, r.idItem
                            from valuesRating r, sportParticipation a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 12
                            and r.idItem = a.idLevel
                            and a.idStudent = :idStudent
                            and a.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();
        $R2 = null;                    
        // foreach ($cnt as $row){
        //     $R2 += $row['count']*0.5;
        // }
        for ($i = 0; $i < count($status1); $i++){
            $R2 += ($status1[$i]['value'] * $type1[$i]['value']  * $level1[$i]['value']);
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

        $status = Yii::$app->db->createCommand('
                            select r.value, a.date, a.description, a.idStatus, r.idItem
                            from valuesRating r, socialParticipation a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 1
                            and r.idItem = a.idStatus
                            and a.idStudent = :idStudent
                            and a.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();

        $level = Yii::$app->db->createCommand('
                            select r.value, a.date, a.description, a.idLevel, r.idItem
                            from valuesRating r, socialParticipation a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 12
                            and r.idItem = a.idLevel
                            and a.idStudent = :idStudent
                            and a.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();

        $type = Yii::$app->db->createCommand('
                            select r.value, a.date, a.description, a.idTypeParticipant, r.idItem
                            from valuesRating r, socialParticipation a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 14
                            and r.idItem = a.idTypeParticipant
                            and a.idStudent = :idStudent
                            and a.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();
        // $R1 = null;                    
        // foreach ($cnt as $row){
        //     $R1 += $row['count']*0.5;
        // }
        $R1 = null;
            for ($i = 0; $i < count($status); $i++){
                $R1 += ($status[$i]['value'] * $level[$i]['value'] * $type[$i]['value']);
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
                            select r.value, a.year, a.name, a.idTypeContest, r.idItem
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
                            select r.value, a.year, a.name, a.idDocumentType, r.idItem
                            from valuesRating r, achievementsKTD a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 3
                            and r.idItem = a.idDocumentType
                            and a.idStudent = :idStudent
                            and a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();

        $level1 = Yii::$app->db->createCommand('
                            select r.value, a.year, a.name, a.idLevel, r.idItem
                            from valuesRating r, achievementsKTD a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 12
                            and r.idItem = a.idLevel
                            and a.idStudent = :idStudent
                            and a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();
        $R1 = null;
            for ($i = 0; $i < count($status1); $i++){
                $R1 += ($status1[$i]['value'] * $type[$i]['value'] * $doc1[$i]['value'] *$level1[$i]['value']);
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
        // $type2 = Yii::$app->db->createCommand('
        //                     select r.value, a.year, a.name, a.idTypePublicPerformance, r.idItem
        //                     from valuesRating r, publicPerformance a
        //                     where r.idFacultet = :idFacultet
        //                     and r.idTable = 2
        //                     and r.idItem = a.idTypePublicPerformance
        //                     and a.idStudent = :idStudent
        //                     and a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
        //                     ->bindValue(':idFacultet', $idFacultet)
        //                     ->bindValue(':idStudent', $idStudent)
        //                     ->queryAll();

        $doc2 = Yii::$app->db->createCommand('
                            select r.value, a.year, a.name, a.idDocumentType, r.idItem
                            from valuesRating r, publicPerformance a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 3
                            and r.idItem = a.idDocumentType
                            and a.idStudent = :idStudent
                            and a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();

        $level2 = Yii::$app->db->createCommand('
                            select r.value, a.year, a.name, a.idLevel, r.idItem
                            from valuesRating r, publicPerformance a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 12
                            and r.idItem = a.idLevel
                            and a.idStudent = :idStudent
                            and a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();

        $R2 = null;
            for ($i = 0; $i < count($status2); $i++){
                $R2 += ($status2[$i]['value'] * $doc2[$i]['value'] * $level2[$i]['value']);
            }

        $cnt = Yii::$app->db->createCommand('
                            select a.*
                            from ktdParticipation  a
                            where a.idStudent = :idStudent
                            and a.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();

        $status3 = Yii::$app->db->createCommand('
                            select r.value, a.date, a.description, a.idStatus, r.idItem
                            from valuesRating r, ktdParticipation a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 1
                            and r.idItem = a.idStatus
                            and a.idStudent = :idStudent
                            and a.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();
        $type3 = Yii::$app->db->createCommand('
                            select r.value, a.date, a.description, a.idTypeParticipant, r.idItem
                            from valuesRating r, ktdParticipation a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 2
                            and r.idItem = a.idTypeParticipant
                            and a.idStudent = :idStudent
                            and a.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();

        // $doc3 = Yii::$app->db->createCommand('
        //                     select r.value, a.year, a.name, a.idStatus, r.idItem
        //                     from valuesRating r, ktdParticipation a
        //                     where r.idFacultet = :idFacultet
        //                     and r.idTable = 3
        //                     and r.idItem = a.idDocumentType
        //                     and a.idStudent = :idStudent
        //                     and a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
        //                     ->bindValue(':idFacultet', $idFacultet)
        //                     ->bindValue(':idStudent', $idStudent)
        //                     ->queryAll();

        $level3 = Yii::$app->db->createCommand('
                            select r.value, a.date, a.description, a.idLevel, r.idItem
                            from valuesRating r, ktdParticipation a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 12
                            and r.idItem = a.idLevel
                            and a.idStudent = :idStudent
                            and a.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();
        $R3 = null;                    
            for ($i = 0; $i < count($status2); $i++){
                $R3 += ($status3[$i]['value'] * $type3[$i]['value'] *$level3[$i]['value']);
            }
        return $R1 + $R2 + $R3;
    }

    public function getScienceR($idFacultet, $idStudent){
        $status = Yii::$app->db->createCommand('
                            select r.value, a.dateBegin, a.nameProject, a.idStatus, r.idItem
                            from valuesRating r, grants a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 1
                            and r.idItem = a.idStatus
                            and a.idStudent = :idStudent
                            and a.dateBegin BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();

        $level = Yii::$app->db->createCommand('
                            select r.value, a.dateBegin, a.nameProject, a.idLevel, r.idItem
                            from valuesRating r, grants a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 12
                            and r.idItem = a.idLevel
                            and a.idStudent = :idStudent
                            and a.dateBegin BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();
        
        $type = Yii::$app->db->createCommand('
                            select r.value, a.dateBegin, a.nameProject, a.idTypeContest, r.idItem
                            from valuesRating r, grants a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 7
                            and r.idItem = a.idTypeContest
                            and a.idStudent = :idStudent
                            and a.dateBegin BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();
        
        $grantType = Yii::$app->db->createCommand('
                            select r.value, a.dateBegin, a.nameProject, a.typeGrant, r.idItem
                            from valuesRating r, grants a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 13
                            and r.idItem = a.typeGrant
                            and a.idStudent = :idStudent
                            and a.dateBegin BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();
        $R1 = null;
        for ($i = 0; $i < count($type); $i++){
            $R1 =+ ($type[$i]['value'] * $grantType[$i]['value'] * $status[$i]['value'] * $level[$i]['value']);
        }

        $typepatent = Yii::$app->db->createCommand('
                            select r.value, a.dateApp, a.name, a.idTypePatent, r.idItem
                            from valuesRating r, patents a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 6
                            and r.idItem = a.idTypePatent
                            and a.idStudent = :idStudent
                            and a.dateApp BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();
        
        $statuspatent = Yii::$app->db->createCommand('
                            select r.value, a.dateApp, a.name, a.status, r.idItem
                            from valuesRating r, patents a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 10
                            and r.idItem = a.status
                            and a.idStudent = :idStudent
                            and a.dateApp BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();
        $R2 = null;
        for ($i = 0; $i < count($typepatent); $i++){
            $R2 =+ ($typepatent[$i]['value'] * $statuspatent[$i]['value']);
        }
        return $R1 + $R2;
    }

    public function getArticleR($idFacultet, $idStudent){

        $status = Yii::$app->db->createCommand('
                            select r.value, a.year, a.name, a.idStatus, r.idItem
                            from valuesRating r, articles a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 1
                            and r.idItem = a.idStatus
                            and a.idStudent = :idStudent
                            AND a.year BETWEEN (YEAR( CURDATE( ) ) -2) AND (YEAR( CURDATE( ) ))')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();

        $type = Yii::$app->db->createCommand('
                            select r.value, a.year, a.name, a.idType, r.idItem
                            from valuesRating r, articles a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 4
                            and r.idItem = a.idType
                            and a.idStudent = :idStudent
                            AND a.year BETWEEN (YEAR( CURDATE( ) ) -2) AND (YEAR( CURDATE( ) ))')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();

        $authorship = Yii::$app->db->createCommand('
                            select r.value, a.year, a.name, a.idAuthorship, r.idItem
                            from valuesRating r, articles a
                            where r.idFacultet = :idFacultet
                            and r.idTable = 9
                            and r.idItem = a.idAuthorship
                            and a.idStudent = :idStudent
                            AND a.year BETWEEN (YEAR( CURDATE( ) ) -2) AND (YEAR( CURDATE( ) ))')
                            ->bindValue(':idFacultet', $idFacultet)
                            ->bindValue(':idStudent', $idStudent)
                            ->queryAll();

        $R1 = null;
        for ($i = 0; $i < count($status); $i++){
            $R1 =+ ($status[$i]['value'] * $type[$i]['value'] * $authorship[$i]['value']);
        }
        return $R1;
    }
}