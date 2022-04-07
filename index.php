<?php 

//Подключаем модули
require_once __DIR__ . '/date_day.php';
require_once __DIR__ . '/day_rabochi_nerabochi.php';


$d_tek = '03.03.2022'; //выставим дату по умолчанию 
$smeh_kol=0; //количество дней смещения по умолчанию

if (isset($_POST['dat'])) {$d_tek=$_POST['dat']; $smeh_kol=$_POST['kol'];}
?>
<?php //форма для уудобного просмотра ?>
<html>
	<head>
	</head>
	<body>
		<!-- Форма -->
		<form action="<?php $_SERVER['PHP_SELF'] ?>" method = "post">
			<label>День<input type="date"  name="dat" value="<?php echo date("Y-m-d",strtotime($d_tek));?>"></label>
			<label>Cмещение<input type="number"  name="kol" value="<?php echo $smeh_kol;?>"></label>
			<button type='submit'>Показать результат</button>
		</form>
		<!-- Форма /-->
	</body>
</html>

<?php

if (isset($_POST['dat'])) {
	
	//Переменнык указанные в форме
	$day=date("d.m.Y",strtotime($_POST['dat']));
	$kol=$_POST['kol'];


	//переменная для работы
	$dr = new Day_Rabochi_Nerabochi();
	$dr->date_day=$date_day;

	//выводим информацию на просмотр 
	echo 'Задан день '.$day. '.<br>';
	echo 'Смешение дней: '.$kol.'.<br>';
	echo '<br>';
	echo $dr->dayRabochi($day)? 'true - Рабочий день.' : 'false - День не является рабочим.';
	echo '<br>';
	echo 'Смещение на '.$dr->dayNext($day,$kol).'.<br>';
	echo 'Выходных дней '.$dr->kol_day.'.<br>';

	//var_dump($date_day);

}

?>