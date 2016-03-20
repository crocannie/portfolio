<?php
	$title = "";
	
	session_start();
	require ("Student.php");
	require ("Document.php");
	require ("Achievement.php");

	$email = $_SESSION['email'];
  	$student = Student::getStudent($email);
  	$idStudent = $student['id'];
	$typeEvent = Document::getTypeEvent();
	$statusEvent = Document::getStatusEvent();
	$documentType = Document::getDocumentType();
	$authorship= Document::getAuthorship();
	$articleType = Document::getArticleType();
	$article = new Achievement();
	$grant = new Achievement();
	$achievement = new Achievement();
	$patent = new Achievement();
	if (!isset($_SESSION['email'])) {
		header("Location: signInView.php", true,303);
	}	
?>

<html>
<head>
	<meta charset="utf-8"> 
  <title></title>
</head>
<body>
	<h3 style="margin-bottom: 11px"><p align='center'><?php echo $title; ?><p></h3>
<p align='center'><FONT SIZE=4><b>ЗАЯВЛЕНИЕ-АНКЕТА ПРЕТЕНДЕНТА</b> <br /> 	на получение повышенной стипендии за достижения студента <br />	в <b>учебной</b> деятельности</FONT></p>
		<table width="1000" border="1">
		   <col width="30" valign="top">
			<tr>
				<td>1</td>
				<td>ФИО претендента</td>
				<td><?=$student['secondName']; ?> <?=$student['firstName']; ?> <?=$student['midleName']; ?><br></td>
			</tr>
			<tr>
				<td>2</td>
				<td>Факультет</td>
				<td><?=$student['nameFacultet']; ?><br></td>
			</tr>
			<tr>
				<td>3</td>
				<td>Код и наименование направления подготовки/специальности</td>
				<td><?=$student['shifr']; ?> <?=$student['idNapravlenie']; ?> <br></td>
			</tr>
			<tr>
				<td>4</td>
				<td>Доля оценок «отлично» от общего количества оценок</td>
				<td><input type="text" name="rating" class="rating" value=""><br></td>
			</tr>
				<?php
					$ret = $achievement->getAchievement($idStudent);
					$rowspan = 4 + (3*count($ret));
					echo "<td rowspan={$rowspan}>7</td>";
				?>
				<td colspan="2">Признание претендента победителем или призером международной, всероссийской олимпиады, конкурса, соревнования, состязания, иного мероприятия, направленного на выявление учебных достижений претендента (в течение 2 лет, предшествующих назначению повышенной стипендии):</td>
			</tr>
			<?php
				$ret = $achievement->getAchievement($idStudent);
				//foreach ($ret as $row) {
					for ($i = 0; $i < count($ret); $i++){
			?>
			<tr>
				<td>вид мероприятия (конференция, семинар, соревнования)</td>
				<td>
					<?php
						$name = $ret[$i]['name'];
							echo "$name";		
						
					?>
				</td>
			</tr>
			<tr>
				<td>статус мероприятия (международное, всероссийское, региональное, ведомственное)</td>
				<td>
					<?php
						$statusEvent = $ret[$i]['statusEvent'];
							echo "$statusEvent";		
						
					?>
				</td>
			</tr>
			<tr>
				<td>год проведения </td>
				<td>
					<?php
						$dateEvent = $ret[$i]['dateEvent'];
							echo "$dateEvent";		
						
					?>
				</td>
			</tr>
			<?php

				//	}
				}
			?>

		</table>
		<p><select name="select" size="3" multiple>
		    <option selected value="s1">Чебурашка</option>
		    <option value="s2">Крокодил Гена</option>
		    <option value="s3">Шапокляк</option>
		    <option value="s4">Крыса Лариса</option>
   		</select><br>
<?php
	$ww = Achievement::getGrantsStudent($idStudent);
	$qq = Achievement::getPatent($idStudent);
	echo count($ww);
	echo count ($qq);
?>
	<input type="hidden" name="flag" value="1">
		
	</form>
</body>
</html>