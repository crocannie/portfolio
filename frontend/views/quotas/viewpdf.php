<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Students;
use common\models\Sgroup;
use common\models\Sotrudnik;
use common\models\Quotas;
use common\models\Facultet;
use common\models\rating\Value;
use common\models\rating\Student;
use common\models\Articles;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
use yii\web\NotFoundHttpException;
use common\models\User;


// use common\models\Sotrudnik;

  if ((Yii::$app->user->isGuest) or (User::isStudent(Yii::$app->user->identity->email))){
    throw new NotFoundHttpException('Страница не найдена.');
}
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Groups';
$this->params['breadcrumbs'][] = $this->title;
// echo count($model1).'<br>';
$id = Yii::$app->user->identity->id;
$sotrudnik = Sotrudnik::findOne($id);
$idFacultet = $sotrudnik->idFacultet0->id;
$idUniversity = $sotrudnik->idUniversity0->id;

$university = Facultet::find()->where(['idUniversity'=>$idUniversity])->all();
foreach ($university as $row) {
            $a[] = "'".$row['name']."'";
        }
// echo $comma_separated = implode(", ", $a);
Quotas::find()->where(['idFacultet'=>$id]);
$q = (Quotas::find()->where(['idFacultet'=>$idFacultet])->all());
foreach ($q as $row) {
    $study = $row['study'];
    $science = $row['science'];
    $social = $row['social'];
    $culture = $row['culture'];
    $sport = $row['sport'];
}

echo Highcharts::widget([
    'scripts' => [
        // 'modules/exporting',
        'themes/grid-light',
    ],
    'options' => [
        'title' => [
            'text' => 'Распеределений заявлений по факультету',
        ],
        'xAxis' => [
            'categories' => ['Apples', 'Oranges'],
        ],
        'labels' => [
            'items' => [
                [
                    // 'html' => 'Распеределений заявлений по направлениям',
                    'style' => [
                        'left' => '50px',
                        'top' => '18px',
                        'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
                    ],
                ],
            ],
        ],
        'series' => [

            [
                'type' => 'pie',
                'name' => 'Всего подано заявок',
                'data' => [
                    [
                        'name' => 'Учебная',
                        'y' => count(Student::find()->where(['idFacultet'=>$idFacultet, 'idActivity'=>1])->all()),
                        'color' => new JsExpression('Highcharts.getOptions().colors[0]'), // Jane's color
                    ],
                    [
                        'name' => 'Научная',
                        'y' => count(Student::find()->where(['idFacultet'=>$idFacultet, 'idActivity'=>2])->all()),
                        'color' => new JsExpression('Highcharts.getOptions().colors[8]'), // John's color
                    ],
                    [
                        'name' => 'Общественная',
                        'y' => count(Student::find()->where(['idFacultet'=>$idFacultet, 'idActivity'=>3])->all()),
                        'color' => new JsExpression('Highcharts.getOptions().colors[2]'), // Joe's color
                    ],
                    [
                        'name' => 'Творческая',
                        'y' => count(Student::find()->where(['idFacultet'=>$idFacultet, 'idActivity'=>4])->all()),
                        'color' => new JsExpression('Highcharts.getOptions().colors[3]'), // Joe's color
                    ],
                    [
                        'name' => 'Спортивная',
                        'y' => count(Student::find()->where(['idFacultet'=>$idFacultet, 'idActivity'=>5])->all()),
                        'color' => new JsExpression('Highcharts.getOptions().colors[1]'), // Joe's color
                    ],
                ],
                'center' => [540, 80],
                'size' => 200,
                'showInLegend' => false,
                'dataLabels' => [
                    'enabled' => true,
                ],
            ],
        ],
    ]
]);

echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'themes/grid-light',
    ],
    'options' => [
        'title' => [
            'text' => 'Соотношение подданых заявлений и доступных мест',
        ],
        'xAxis' => [
            'categories' => ['Учебная', 'Научная', 'Общественная', 'Творческая', 'Спортивная'],
        ],
        'labels' => [
            'items' => [
                [
                    // 'html' => 'Total fruit consumption',
                    'style' => [
                        'left' => '50px',
                        'top' => '18px',
                        'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
                    ],
                ],
            ],
        ],
        'series' => [
            [
                'type' => 'bar',
                'name' => 'Подано',
                'data' => [count(Student::find()->where(['idFacultet'=>$idFacultet, 'idActivity'=>1])->all()), count(Student::find()->where(['idFacultet'=>$idFacultet, 'idActivity'=>2])->all()), count(Student::find()->where(['idFacultet'=>$idFacultet, 'idActivity'=>3])->all()), count(Student::find()->where(['idFacultet'=>$idFacultet, 'idActivity'=>4])->all()), count(Student::find()->where(['idFacultet'=>$idFacultet, 'idActivity'=>5])->all())],
                'color' => 'IndianRed', // Jane's color

            ],
            [
                'type' => 'bar',
                'name' => 'Квота',
                'data' => [$study, $science, $social, $culture, $spot],
                'color' => 'MediumSeaGreen', // Jane's color
            ],
        
        ],
    ]
]);
echo "<br>";

// echo Highcharts::widget([
//     'scripts' => [
//         'modules/exporting',
//         'themes/grid-light',
//     ],
//     'options' => [
//         'title' => [
//             'text' => 'Публикации',
//         ],
//         'xAxis' => [
//             'categories' => [$sotrudnik->idFacultet0->name],
//         ],
//         'labels' => [
//             'items' => [
//                 [
//                     // 'html' => 'Total fruit consumption',
//                     'style' => [
//                         'left' => '50px',
//                         'top' => '18px',
//                         'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
//                     ],
//                 ],
//             ],
//         ],
//         'series' => [
//             [
//                 'type' => 'column',
//                 'name' => 'Международные журналы (Scopus, Web ofScience и др.)',
//                 // 'data' => [count(Articles::find()->where(['idStudent'=>89]))],
//                 'data' => [4],
//             ],
//             [
//                 'type' => 'column',
//                 'name' => 'Журналы ВАК',
//                 'data' => [2],
//             ],
//             [
//                 'type' => 'column',
//                 'name' => 'Журналы РИНЦ',
//                 'data' => [3],
//             ],
//             [
//                 'type' => 'column',
//                 'name' => 'Иные журналы',
//                 'data' => [1],
//             ],
//             [
//                 'type' => 'column',
//                 'name' => 'Международные конференции (Scopus, Web of Science и др.)',
//                 'data' => [7],
//             ],
//             [
//                 'type' => 'column',
//                 'name' => 'Конференции РИНЦ',
//                 'data' => [4],
//             ],
//             [
//                 'type' => 'column',
//                 'name' => 'Иные материалы конференций',
//                 'data' => [9],
//             ],
//             [
//                 'type' => 'column',
//                 'name' => 'Тезисы докладов',
//                 'data' => [1],
//             ],
//             [
//                 'type' => 'column',
//                 'name' => 'Иные публикации',
//                 'data' => [4],
//             ],
//         ],
//     ]
// ]);


// $zip = new ZipArchive();
// $filename = "./test112.zip";

// if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
//     exit("Невозможно открыть <$filename>\n");
// }

// $zip->addFromString("testfilephp.txt" . time(), "#1 Это тестовая строка, добавленная как testfilephp.txt.\n");
// $zip->addFromString("testfilephp2.txt" . time(), "#2 Это тестовая строка, добавленная как testfilephp2.txt.\n");
// $zip->addFile($thisdir . "/too.php","/testfromfile.php");
// // echo "numfiles: " . $zip->numFiles . "\n";
// // echo "status:" . $zip->status . "\n";
// $zip->close();
?>

<div class="group-index">
	<div class="row">
		<div align="left" class="col-md-9">
			<table  width=850px>
	       		<col width="600px">
		    	<col width="600px">
    			<tr>
     				<td><font face="serif">Факультет <?= Facultet::findOne($idFacultet)->name?></font></td>
     				<td  style="text-align:right;"><font face="serif">Ректору АГУ <br> профессору А.П. Луневу</font></td>
        		</tr>
			</table>
		</div>
	</div>
	<div class="row">
		<div align="left" class="col-md-6">
			<br>
			<font face="serif">Служебная записка </font>
		</div>
	</div>
	<div class="row">
		<div align="left" class="col-md-6">
			<br>
			<font face="serif"><?= date("d.m.Y") ?></font>
		</div>
	</div>
	<div class="row">
		<div align="left" class="col-md-6">
			<br>
			<font face="serif">о претендентах на повышенную стипендию</font>
		</div>
	</div>
	<div class="row">
		<div align="left" class="col-md-9">
			<br>
			<br>
			<br>
			<p style="text-indent: 47px"> 
				<font face="serif">Деканат <?= Facultet::findOne($idFacultet)->name ?> направляет список претендентов на получение повышенной стипендии:</font>
			</p>
			<br>
			<table style="border-collapse: collapse; border:1px solid black;">
		       	<col width="30px">
	    		<col width="250px"/>
		       	<col width="50px">
		       	<col width="180px">
		       	<col width="180px">
		       	<col width="180px">
		       	<col width="180px">
		       	<col width="180px">
    			<tr style="border: 1px solid black; text-align:center; text-align:center;">
     				<th style="border: px solid black; text-align:center; padding: 5px;" rowspan="2"> <font face="serif">№</font></th>
     				<th style="border: 1px solid black; text-align:center; padding: 5px;" rowspan="2"><font face="serif">ФИО претендента</font></th>
     				<th style="border: 1px solid black; text-align:center; padding: 5px;" rowspan="2"><font face="serif">Группа</font></th>
    				<th style="border: 1px solid black; text-align:center; padding: 5px;" colspan="5"><font face="serif">Достижения</font></th>
        		</tr>
    			<tr style="border: 1px solid black; text-align:center; text-align:center;">
        			<th style="border: 1px solid black; text-align:center;  padding: 5px;"><font face="serif">учебная деятельность</font></th>
        			<th style="border: 1px solid black; text-align:center;  padding: 5px;"><font face="serif">научная деятельность</font></th>
        			<th style="border: 1px solid black; text-align:center;  padding: 5px;"><font face="serif">общественная деятельность</font></th>
        			<th style="border: 1px solid black; text-align:center;  padding: 5px;"><font face="serif">культурно-творческая деятельность</font></th>
        			<th style="border: 1px solid black; text-align:center; padding: 5px;"><font face="serif">спортивная деятельность</font></th>
    			</tr>
    			<?php 
			        $count = Quotas::find()->where(['idFacultet'=>$idFacultet])->all();
			        foreach ($count as $row) {
			            $cnt = $row['cnt'];
			        }
			        $activity = Value::getActivity($idFacultet);
			        foreach ($activity as $row ) {
			            if ($row['id'] == 1) {
			                $studyValue = $row['value']*10;
			            }
			            if ($row['id'] == 2) {
			                $scienceValue = $row['value']*10;
			            }
			            if ($row['id'] == 3) {
			                $socialValue = $row['value']*10;
			            }
			           if ($row['id'] == 4) {
			               $cultureValue = $row['value']*10;
			           }
			            if ($row['id'] == 5) {
			                $sportValue = $row['value']*10;
			            }
			        }
			        $studyCnt   = round(($cnt * $studyValue)      / 100);
			        $scienceCnt = round(($cnt * $scienceValue)    / 100);
			        $socialCnt  = round(($cnt * $socialValue)     / 100);
			        $cultureCnt = round(($cnt * $cultureValue)    / 100);
			        $sportCnt   = round(($cnt * $sportValue)      / 100);

    			for ($i = 1; $i < 6; $i++){
    				if ($i == 1){
						$cnt = $studyCnt;
    				}
    				if ($i == 2){
						$cnt = $scienceCnt;
    				}
    				if ($i == 3){
						$cnt = $socialCnt;
    				}
    				if ($i == 4){
						$cnt = $cultureCnt;
    				}
    				if ($i == 5){
						$cnt = $sportCnt;
    				}
    				// $cnt = 10;
    				// $model1 = Student::find()->where(['idFacultet'=>$idFacultet, 'idActivity'=>$i])->all();
			        $sql = 'SELECT r.*, concat(s.secondName, " ", s.firstName) as Fio, concat(e.name, ", ", g.name) as study, concat(n.shifr, " ", n.name) as napravlenie FROM studentRating r, students s, sgroup g, educationLevel e, napravlenie n  WHERE r.idFacultet = :idFacultet and r.idActivity = :idActivity and r.idStudent = s.idStudent and s.idGroup = g.id and s.idLevel = e.id and s.idNapravlenie = n.id ORDER BY r1 DESC limit '.$cnt;
			        $model1 = Yii::$app->db->createCommand($sql)
			                                ->bindValues([':idFacultet' => $idFacultet, ':idActivity' => $i])
			                                ->queryAll();
    				for ($j = 0; $j < count($model1); $j++){// echo $model1[$i]['idStudent'].' ';
    					$k = 0;?>
    			<tr style="border: 1px solid black;">
    				<td style="border: 1px solid black; text-align:right; padding: 5px;"><font face="serif"></font><?= $i;?></td>
    				<td style="border: 1px solid black; text-alignleft:; padding: 5px;"><font face="serif"><?php echo Students::findOne($model1[$j]['idStudent'])->secondName.' '.Students::findOne($model1[$j]['idStudent'])->firstName.' '.Students::findOne($model1[$j]['idStudent'])->midleName;?></font></td>
    				<td style="border: 1px solid black; text-align:left;  padding: 5px;"><font face="serif"><?php echo Sgroup::findOne(Students::findOne($model1[$j]['idStudent'])->idGroup)->name;?></font></td>
    				<?php
    					if ($model1[$j]['idActivity'] == 1){?>
    				<td style="border: 1px solid black; text-align:center;"><font face="serif">+</font></td>
    				<?php
    					} else {?>
    				<td style="border: 1px solid black; text-align:center;"><font face="serif"></font></td>
    				<?php
    					}
    					if ($model1[$j]['idActivity'] == 2){?>
    				<td style="border: 1px solid black; text-align:center;"><font face="serif">+</font></td>
    				<?php
    					} else {?>
    				<td style="border: 1px solid black; text-align:center;"><font face="serif"></font></td>		
    				<?php
    					}
    					if ($model1[$j]['idActivity'] == 3){?>
    				<td style="border: 1px solid black; text-align:center;"><font face="serif">+</font></td>
    				<?php
    					} else {?>
    				<td style="border: 1px solid black; text-align:center;"><font face="serif"></font></td>  				
    				<?php
    					}
    					if ($model1[$j]['idActivity'] == 4){?>
    				<td style="border: 1px solid black; text-align:center;"><font face="serif">+</font></td>
    				<?php
    					} else {?>
    				<td style="border: 1px solid black; text-align:center;"><font face="serif"></font></td>   				
    				<?php
    					}
    					if ($model1[$j]['idActivity'] == 5){?>
    				<td style="border: 1px solid black; text-align:center;"><font face="serif">+</font></td>
    				<?php
    					}else {?>
    				<td style="border: 1px solid black; text-align:center;"><font face="serif"></font></td>   
    				<?php }
    				// $k++;
    				?>    			
    			</tr>
    			<?php }
    		} 
    		?>
			</table>
			<br>
			<p style="text-indent: 47px">
				<font face="serif">Пакет документов прилагается.</font>
			</p>
			<br>
			<br>
			<div class="row">
				<div align="left" class="col-md-9">
					<table  width=850pxm>
			       		<col width="600px">
				    	<col width="600px">
		    			<tr>
		     				<td><font face="serif">Декан ФМиИТ</font></td>
		     				<td  style="text-align:right;"><font face="serif"><?= Facultet::findOne($idFacultet)->dekan ?> </font></td>
		        		</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
