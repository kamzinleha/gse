<?php

class Day_Rabochi_Nerabochi {
  // Свойства
  public $date_day; //Рабочие/Нерабочие дни
  public $kol_day; //количество выходных

  // Методы
  function dayRabochi($d): bool  {
	//  Метод, который принимает `дату` и возвращает `bool` - является ли дата _рабочим_ днем или нет.

	$day_week=date("N", strtotime($d)); // Вычесляем день недели
	$r=true; //По умолчанию всегда True

	if (($day_week==6)or($day_week==7)) {$r=false;} //Если день субота или воскресение, то выходной

	return (in_array(date("d.m.Y",strtotime($d)),$this->date_day))? !$r:$r; //Если день попадает в масив, то меняем на противоположенный

  }
  
  function dayNext($d, $kol):string {
	// Метод, который принимает `дату` и `число` (смещение). Возвращает `дату`, которая смещена относительно входной на указанное количество _рабочих_ дней.  
	$this->kol_day=0; //по умолчанию выходных нет
	$d_new=$d; //переменная с которой будем работать
	
	//цикл, смещение на количество рабочих дней
	for($i=1;$i<=$kol;$i++){ 
		$d_new=date("d.m.Y", strtotime($d_new.'+ '.'1'.' days'));

		//Проверяем если день не рабочий, то смещаемся дополнительно.
		if (!$this->dayRabochi($d_new))
			{	//смещаемся пока день не будет рабочим
				while ( !$this->dayRabochi($d_new)){
					$d_new=date("d.m.Y", strtotime($d_new.'+ 1 days'));	
					$this->kol_day++;
				}
			}
	}	
	return $d_new;
  }
}

?>