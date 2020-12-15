<?php 
class ctrl {

	public function __construct() {
		$this->database = new database();
        $this->user = false;
		if (!empty($_COOKIE['uid']) && !empty($_COOKIE['key']))
			$this->user = $this->database->query("SELECT * FROM judiciary WHERE id = ? AND cookie = ?",$_COOKIE['uid'],$_COOKIE['key'])->assoc();
        $this->admin = false;
		if (!empty($_COOKIE['uid']) && !empty($_COOKIE['key']))
			$this->admin = $this->database->query("SELECT * FROM judiciary WHERE id = ? AND cookie = ? AND priority = ?",$_COOKIE['uid'],$_COOKIE['key'], 1)->assoc();
	}

	public function out($libsname,$nested=false) {
		if (!$nested) {
			$this->libs = $libsname;
			include "libs/main.php";
		} else
			include "libs/" . $libsname;
	}

}

class controller extends ctrl {
    
    function index(){
        if(!$this->user){
            $name = 'login';
            $this->$name();
        }
        if($this->user){
        $this->out('start.php');
        }
    }
    
    function view(){
        $this->view = $this->database->query("SELECT * FROM participants ORDER BY id DESC")->all();
        $this->out('view_part.php');
    }
    
    function login(){      
        if(!empty($_POST)){
            $user = $this->database->query("SELECT * FROM judiciary WHERE name = ? AND pass = ?", $_POST['login'],$_POST['pass'])->assoc();
            if($user){
                $_key = (microtime().rand(0,10000));
                $_time = time()+86400*30;
                setcookie('uid',$user['id'], $_time);
                setcookie('key',$_key, $_time);
                $this->database->query("UPDATE judiciary SET cookie = ? WHERE id = ?",$_key,$user['id']);
                if($user['priority']=='1')
                    $admin = $this->user;
                header("Location: /");
            }else $this->error = "Неправильный логин или пароль";
        }
        $this->out('login.php');
    }
    
    function logout(){
        setcookie('uid',$user['id'],0);
        setcookie('key',$_key,0);
        $this->user = false;
        header("Location: /");
    }
        
    function stage(){
        
        $this->out('stage.php');
    }
    
    function result(){
        $number = $this->user['number'];
        $counter = 0;
        
    }
    
    function add(){
            if(!empty($_POST)){ 
            $id_part = $_POST['id_part'];
            $name = $_POST['name_part'];
            $born = new DateTime($_POST['age']); // дата рождения
            $main_cl = $_POST['main_cl'];
            $other = $_POST['other'];
            $age = $born->diff(new DateTime)->format('%y');   
            /** Если нам передали ID то обновляем */
            if($id_part && $name && $age && $main_cl && $other ){
               if ($age>=3 && $age<=4)
                   $cat = 'Бэби-1';
               if ($age>=5 && $age<=6)
                   $cat = 'Бэби-2';
               if ($age>=7 && $age<=9)
                   $cat = 'Дети-1';
               if ($age>=10 && $age<=11)
                   $cat = 'Дети-2';
               if ($age>=12 && $age<=13)
                   $cat = 'Юниоры-1';
               if ($age>=14 && $age<=15)
                   $cat = 'Юниоры-2';
               if ($age>=16 && $age<=18)
                   $cat = 'Молодежь';
               if ($age>=19 && $age<=24)
                   $cat = 'Взрослая-1';
               if ($age>=25 && $age<=34)
                   $cat = 'Взрослая-2';
               if ($age>=35 && $age<=49)
                   $cat = 'Взрослая-3';
               if ($age>=50)
                   $cat = 'Синьоры';
            $add = $this->database->query("INSERT INTO participants VALUES(NULL,'$id_part','$name','$age','$cat','$main_cl','$other')");
                //извлекаем все записи из таблицы
                $add2 = $this->database->query("SELECT * FROM participants ORDER BY id DESC");

                while($row = $add2->assoc()){
                    $parts['id'][] = $row['id'];
                    $parts['id_part'][] = $row['id_participant'];
                    $parts['name_part'][] = $row['name'];
                    $parts['age'][] = $row['age'];
                    $parts['cat'][] = $row['categoriy'];
                    $parts['main_cl'][] = $row['main_class'];
                    $parts['other'][] = $row['other_class'];
                }
                $message = 'Все хорошо';
            }else{
                $message = 'Не удалось записать и извлечь данные';
            }


            /** Возвращаем ответ скрипту */

            // Формируем масив данных для отправки
            $json = array(
                'message' => $message,
                'parts' => $parts
            );

            // Устанавливаем заголовот ответа в формате json
            header('Content-Type: text/json; charset=utf-8');

            // Кодируем данные в формат json и отправляем
            echo json_encode($json);     
                
            
            }
		}
    
    function editpart($id){
            if(!$this->admin) return header("Location: /");
            if(!empty($_POST)){
                $age = $_POST['age'];
                if ($age>=3 && $age<=4)
                   $cat = 'Бэби-1';
               if ($age>=5 && $age<=6)
                   $cat = 'Бэби-2';
               if ($age>=7 && $age<=9)
                   $cat = 'Дети-1';
               if ($age>=10 && $age<=11)
                   $cat = 'Дети-2';
               if ($age>=12 && $age<=13)
                   $cat = 'Юниоры-1';
               if ($age>=14 && $age<=15)
                   $cat = 'Юниоры-2';
               if ($age>=16 && $age<=18)
                   $cat = 'Молодежь';
               if ($age>=19 && $age<=24)
                   $cat = 'Взрослая-1';
               if ($age>=25 && $age<=34)
                   $cat = 'Взрослая-2';
               if ($age>=35 && $age<=49)
                   $cat = 'Взрослая-3';
               if ($age>=50)
                   $cat = 'Синьоры';
                $this->database->query("UPDATE participants SET id_participant = ?, name = ?, age = ?, categoriy = ?, main_class = ?, other_class = ? WHERE id = ?", $_POST['id_participant'], $_POST['name'], $_POST['age'], $cat,   $_POST['main_class'], $_POST['other_class'], $id);
            header("Location: /?view");
            };
            $this->view = $this->database->query("SELECT * FROM participants WHERE id = ?",$id)->assoc();
            $this->out('editpart.php');

    }
    
    function delpart($id){
        if(!$this->admin) return header("Location: /");
        $this->database->query("DELETE FROM participants WHERE id = ?",$id);
        header("Location: /?view");
    }
    
    //Вывод отборочного этапа
    function screening(){
        //временно группирует по имени группы
        $this->screening = $this->database->query("SELECT * FROM groups GROUP BY name_group")->all();
        $this->out('screening.php');
    }
    //вывод ссылки
    function formgroup(){
        $this->view = $this->database->query("SELECT * FROM participants ORDER BY id DESC")->all();
        $this->out('reggroup.php');
    }
    //вызываем таблицу участников и сортируем
    function sortgroup(){
        if (!empty($_POST)){
        $cls = $_POST['main_clss'];
        $cat = $_POST['cat'];
        $othcls = $_POST['other_cls'];
            //сделать условие "если пустой класс"
        if($cls && $cat && $othcls){
                        //извлекаем все записи из таблицы
        $this->view=$this->database->query("SELECT * FROM participants WHERE categoriy = ? AND main_class = ? AND other_class = ?",$cat,$cls,$othcls)->all();
        $sort=$this->database->query("SELECT * FROM participants WHERE categoriy = ? AND main_class = ? AND other_class = ?",$cat,$cls,$othcls);
                while($row = $sort->assoc()){
                    $group['id'][] = $row['id'];
                    $group['id_part'][] = $row['id_participant'];
                    $group['name_part'][] = $row['name'];
                    $group['age'][] = $row['age'];
                    $group['cat'][] = $row['categoriy'];
                    $group['main_cl'][] = $row['main_class'];
                    $group['other'][] = $row['other_class'];
                }
                $message = 'Все хорошо';
            }else{
                $message = 'Не удалось записать и извлечь данные';
            }


            /** Возвращаем ответ скрипту */

            // Формируем масив данных для отправки
            $json = array(
                'message' => $message,
                'group' => $group
            );
        header('Content-Type: text/json; charset=utf-8');
        echo json_encode($json);
    }
        }

    //регистрируем отборочный
    function reggroup(){
        $dance1="ча-ча-ча";
        $dance2="самба";
        $dance3="румба";
        $dance4="джайв";
        $dance5="пасадобль";

        //добавляем пользователей
        $this->database->query("INSERT INTO groups(id_participant,class,otherclass) SELECT id_participant, main_class,other_class FROM  participants WHERE main_class = ? AND categoriy = ? AND other_class = ?",$_POST['mcls'],$_POST['cat'],$_POST['othcls']);
        // вставляем имя группы
        $this->database->query("UPDATE groups SET name_group = ? WHERE class = ? AND otherclass = ?", $_POST['namegroup'], $_POST['mcls'],$_POST['othcls']);
        //массив имени группы
        $id_group = $this->database->query("SELECT name_group FROM groups WHERE name_group = ?",$_POST['namegroup'])->assoc();
        $name = $this->database->query("SELECT * FROM participants WHERE main_class = ? AND other_class = ? AND categoriy = ?",$_POST['mcls'],$_POST['othcls'],$_POST['cat'])->all();
        //условие по количеству танцев на категорию
        if ($_POST['mcls']=='ШбТ' || $_POST['mcls']=='E'){
            foreach ($name as $k=>$v){
            $this->database->query("INSERT INTO stage_1_8(name,id_part,id_group, dance) VALUES(?,?,?,?)",$v['name'],$v['id_participant'],$_POST['namegroup'],$dance1);
            $this->database->query("INSERT INTO stage_1_8(name,id_part,id_group, dance) VALUES(?,?,?,?)",$v['name'],$v['id_participant'],$_POST['namegroup'],$dance2);}
        }    
        if ($_POST['mcls']=="D" ) {
            foreach ($name as $k=>$v){
            $this->database->query("INSERT INTO stage_1_8(name,id_part,id_group, dance) VALUES(?,?,?,?)",$v['name'],$v['id_participant'],$_POST['namegroup'],$dance1);
            $this->database->query("INSERT INTO stage_1_8(name,id_part,id_group, dance) VALUES(?,?,?,?)",$v['name'],$v['id_participant'],$_POST['namegroup'],$dance2);
            $this->database->query("INSERT INTO stage_1_8(name,id_part,id_group, dance) VALUES(?,?,?,?)",$v['name'],$v['id_participant'],$_POST['namegroup'],$dance3);
            $this->database->query("INSERT INTO stage_1_8(name,id_part,id_group, dance) VALUES(?,?,?,?)",$v['name'],$v['id_participant'],$_POST['namegroup'],$dance4);}
        }    
        if ($_POST['mcls']=="A" || $_POST['mcls']=="B" || $_POST['mcls']=="C") {
            foreach ($name as $k=>$v){
            $this->database->query("INSERT INTO stage_1_8(name,id_part,id_group, dance) VALUES(?,?,?,?)",$v['name'],$v['id_participant'],$_POST['namegroup'],$dance1);
            $this->database->query("INSERT INTO stage_1_8(name,id_part,id_group, dance) VALUES(?,?,?,?)",$v['name'],$v['id_participant'],$_POST['namegroup'],$dance2);
            $this->database->query("INSERT INTO stage_1_8(name,id_part,id_group, dance) VALUES(?,?,?,?)",$v['name'],$v['id_participant'],$_POST['namegroup'],$dance3);
            $this->database->query("INSERT INTO stage_1_8(name,id_part,id_group, dance) VALUES(?,?,?,?)",$v['name'],$v['id_participant'],$_POST['namegroup'],$dance4);
            $this->database->query("INSERT INTO stage_1_8(name,id_part,id_group, dance) VALUES(?,?,?,?)",$v['name'],$v['id_participant'],$_POST['namegroup'],$dance5);}
        } 

            //добавляем в результат
            $this->database->query("INSERT INTO result_1_8(id_part,otherclass,class) SELECT groups.id_participant, participants.other_class,participants.main_class FROM groups, participants WHERE groups.id_participant = participants.id_participant AND groups.name_group = ?",$_POST['namegroup']);
            if ($_POST['mcls']=='ШбТ' || $_POST['mcls']=='E' && $_POST['othcls']=='Закрытый'){
            $this->database->query("UPDATE result_1_8 SET dance_1 = ?, dance_2 = ? WHERE class = ? AND otherclass = ?", $dance1,$dance2,$_POST['mcls'],$_POST['othcls']);}
            if ($_POST['mcls']=="D" && $_POST['othcls']=="-") {
            $this->database->query("UPDATE result_1_8 SET dance_1 = ?, dance_2 = ?, dance_3 = ?, dance_4 = ? WHERE class = ? AND otherclass = ?", $dance1,$dance2,$dance3,$dance4,$_POST['mcls'],$_POST['othcls']);}
            else {
            $this->database->query("UPDATE result_1_8 SET dance_1 = ?, dance_2 = ?, dance_3 = ?, dance_4 = ?, dance_5 = ? WHERE class = ? AND otherclass = ?", $dance1,$dance2,$dance3,$dance4,$dance5,$_POST['mcls'],$_POST['othcls']);   
            }
    }
    
    //1/16
    function selected($id){
        $dance1="ча-ча-ча";
        $dance2="самба";
        $dance3="румба";
        $dance4="джайв";
        $dance5="пасадобль";
        $this->dance_1 = $this->database->query("SELECT * FROM stage_1_8 WHERE id_group = ? AND dance = ?", $id, $dance1)->all();
        $this->dance_2 = $this->database->query("SELECT * FROM stage_1_8 WHERE id_group = ? AND dance = ?",$id,$dance2)->all();
        $this->dance_3 = $this->database->query("SELECT * FROM stage_1_8 WHERE id_group = ? AND dance = ?",$id,$dance3)->all();
        $this->dance_4 = $this->database->query("SELECT * FROM stage_1_8 WHERE id_group = ? AND dance = ?",$id,$dance4)->all();
        $this->dance_5 = $this->database->query("SELECT * FROM stage_1_8 WHERE id_group = ? AND dance = ?",$id,$dance5)->all();
        
        $this->out('selected.php');
    }
    //1/8 судейский result
    function selresult($id,$uid,$dance_num){
        $res="+";
        if ($dance_num == 1) $dance = 'ча-ча-ча';
        if ($dance_num == 2) $dance = 'самба';
        if ($dance_num == 3) $dance = 'румба';
        if ($dance_num == 4) $dance = 'джайв';
        if ($dance_num == 5) $dance = 'пасадобль';
        $judiciary = $this->user['number'];
        if ($judiciary == 'A') 
            $this->database->query("UPDATE stage_1_8 SET A = ? WHERE id = ? AND dance = ?", $res, $id, $dance);
        if ($judiciary == 'B') 
            $this->database->query("UPDATE stage_1_8 SET B = ? WHERE id = ? AND dance = ?", $res, $id, $dance);
        if ($judiciary == 'C') 
            $this->database->query("UPDATE stage_1_8 SET C = ? WHERE id = ? AND dance = ?", $res, $id, $dance);
        if ($judiciary == 'D') 
            $this->database->query("UPDATE stage_1_8 SET D = ? WHERE id = ? AND dance = ?",$res, $id, $dance);
        if ($judiciary == 'E') 
            $this->database->query("UPDATE stage_1_8 SET E = ? WHERE id = ? AND dance = ?", $res, $id, $dance);
        
        $trueres = $this->database->query("SELECT * FROM stage_1_8 WHERE id = ?",$id)->assoc();
        
        $A = $trueres['A'];
        $B = $trueres['B'];
        $C = $trueres['C'];
        $D = $trueres['D'];
        $E = $trueres['E'];
        
        $arr_res = array($A,$B,$C,$D,$E);
        $arr_count = array_count_values($arr_res);
        $resplus = $arr_count['+'];
        $this->database->query("UPDATE stage_1_8 SET count = ? WHERE id = ?",$resplus,$id);
        if ($dance_num == 1)
        $this->database->query("UPDATE result_1_8 SET dance_1 = ?, count_1 = ? WHERE id_part = ?", $dance, $resplus, $trueres['id_part']);
        if ($dance_num == 2)
        $this->database->query("UPDATE result_1_8 SET dance_2 = ?, count_2 = ? WHERE id_part = ?", $dance, $resplus, $trueres['id_part']);
        if ($dance_num == 3)
        $this->database->query("UPDATE result_1_8 SET dance_3 = ?, count_3 = ? WHERE id_part = ?", $dance, $resplus, $trueres['id_part']);
        if ($dance_num == 4)
        $this->database->query("UPDATE result_1_8 SET dance_4 = ?, count_4 = ? WHERE id_part = ?", $dance, $resplus, $trueres['id_part']);
        if ($dance_num == 5)
        $this->database->query("UPDATE result_1_8 SET dance_5 = ?, count_5 = ? WHERE id_part = ?", $dance, $resplus, $trueres['id_part']);
        $full = $this->database->query("SELECT * FROM result_1_8 WHERE id_part = ?",$trueres['id_part'])->assoc();
        $count_1 = $full['count_1'];
        $count_2 = $full['count_2'];
        $count_3 = $full['count_3'];
        $count_4 = $full['count_4'];
        $count_5 = $full['count_5'];
        $fullcount = $count_1 + $count_2 + $count_3 + $count_4 + $count_5;
        $fullcount_result = $this->database->query("UPDATE result_1_8 SET fullcount = ? WHERE id_part = ?",$fullcount, $trueres['id_part']);

        
        header("Location: /?selected/$uid");
    }
    
    function allselected(){
        $this->allselected = $this->database->query("SELECT * FROM result_1_8 ORDER BY fullcount desc")->all();
        $this->out('allselected.php');
    }
    //общий результат в отборочном 
    function admselres(){
        $true="прошел";
        $result=$this->database->query("UPDATE result_1_8 SET conclusion = ? ORDER BY fullcount DESC LIMIT 24", $true);
        //ассоциативный массив
        $true_part = $this->database->query("INSERT INTO result_1_4 SELECT * FROM result_1_8 WHERE result_1_8.conclusion = ?",$true);
        $this->database->query("UPDATE result_1_4 SET conclusion = 0, count_1 = 0, count_2 = 0,count_3 = 0,count_4 = 0,count_5 = 0, fullcount = 0");
        $stages = $this->database->query("SELECT * FROM result_1_4")->all();
        foreach ($stages as $k => $v)
            $this->database->query("UPDATE stage_1_8 SET result = ? WHERE id_part = ?",$true,$v['id_part']);
        $this->database->query("INSERT INTO stage_1_4 SELECT * FROM stage_1_8 WHERE result = ?",$true);
        $this->database->query("UPDATE stage_1_4 SET A = '-',B = '-',C = '-',D = '-',E = '-',count = 0, result = ?",0);
        
        //переносим на след этап
        
        header("Location: /?allselected ");
        
       }
    //финал
    function finalstage(){
        $dance1="ча-ча-ча";
        $dance2="самба";
        $dance3="румба";
        $dance4="джайв";
        $dance5="пасадобль";
        $this->dance_1 = $this->database->query("SELECT * FROM stage_final WHERE dance = ?", $dance1)->all();
        $this->dance_2 = $this->database->query("SELECT * FROM stage_final WHERE dance = ?",$dance2)->all();
        $this->dance_3 = $this->database->query("SELECT * FROM stage_final WHERE dance = ?",$dance3)->all();
        $this->dance_4 = $this->database->query("SELECT * FROM stage_final WHERE dance = ?",$dance4)->all();
        $this->dance_5 = $this->database->query("SELECT * FROM stage_final WHERE dance = ?",$dance5)->all();
        
        $this->out('final.php');
    }
    //финальный результат судий
    function finalresult(){
        $id = $_POST['id'];
        $res=intval($_POST['result']);
        $judiciary = $this->user['number'];
        $dancenumber = $_POST['dance'];
        if($dancenumber == 1) $dance = 'ча-ча-ча';
        if($dancenumber == 2) $dance = 'самба';
        if($dancenumber == 3) $dance = 'румба';
        if($dancenumber == 4) $dance = 'джайв';
        if($dancenumber == 5) $dance = 'пасадобль';
        if ($judiciary == 'A') {
            $this->database->query("UPDATE stage_final SET A = ? WHERE id_participant = ? AND dance = ?", $res, $id,$dance);}
        if ($judiciary == 'B') {
            $this->database->query("UPDATE stage_final SET B = ? WHERE id_participant = ? AND dance = ?", $res, $id,$dance);}
        if ($judiciary == 'C') {
            $this->database->query("UPDATE stage_final SET C = ? WHERE id_participant = ? AND dance = ?", $res, $id,$dance);}
        if ($judiciary == 'D') {
            $this->database->query("UPDATE stage_final SET D = ? WHERE id_participant = ? AND dance = ?",$res, $id,$dance);}
        if ($judiciary == 'E') {
        $this->database->query("UPDATE stage_final SET E = ? WHERE id = ? AND dance = ?", $res, $id,$dance);}
        $res_fin=$this->database->query("SELECT * FROM stage_final WHERE id_participant = ? AND dance = ?",$id, $dance)->assoc(); 
        $tre='';
        $A=intval($res_fin['A']);
        $B=intval($res_fin['B']); 
        $C=intval($res_fin['C']); 
        $D=intval($res_fin['D']); 
        $E=intval($res_fin['E']);
        $arr_res = array($A,$B,$C,$D,$E);
        $allowed = [1,2,3,4,5,6]; //разрешенные ключи
        $result = array_count_values($arr_res); //подсчитываем 
        $filtered = array_intersect_key($result, array_flip($allowed));
        //проверяем по 5 правилу
        if($filtered[1]>2  || $filtered[2]>2 || $filtered[3]>2 || $filtered[4]>2 || $filtered[5]>2 || $filtered[6]>2){
        $max = array_search(max($filtered),$filtered);// находим самое максимальное значение
        $this->database->query("UPDATE stage_final SET one = ?, one_2 = ?, one_3 = ?, one_4 = ?, one_5 = ?, one_6 = ?, result = ? WHERE id_participant = ? AND dance = ?",$filtered[1],$filtered[2],$filtered[3],$filtered[4],$filtered[5],$filtered[6],$max,$id, $dance);
        }else{
            $t = 0;
        //ищем диапазон мест
        //2 место
        if ($filtered[2]>1){
        $filt_count_1 = $filtered[1]+(2 * $filtered[2]);
        $filtered[2] = $filtered[1] + $filtered[2];
        $t = $filtered[2];
        }
       
        //3 место
        if ($filtered[3]>1){
        $filt_count_2 = (1*$filtered[1])+(2*$filtered[2])+(3*$filtered[3]);
        $filtered[3] = $filtered[1] + $filtered[2] + $filtered[3];
        }
       
        //4 место
        if ($filtered[4]>1){
        $filt_count_3 = (1*$filtered[1])+(2*$filtered[2])+(3*$filtered[3])+(4*$filtered[4]);
        $filtered[4] = $filtered[1] + $filtered[2] + $filtered[3] + $filtered[4];
        }
       
        //5 место
        if ($filtered[5]>1){
        $filt_count_4 = (1*$filtered[1])+(2*$filtered[2])+(3*$filtered[3])+(4*$filtered[4])+(5*$filtered[5]);
        $filtered[5] = $filtered[1] + $filtered[2] + $filtered[3] + $filtered[4]+ $filtered[5];
        }
       
        //6 место
        if ($filtered[6]>1){
        $filt_count_5 = (1*$filtered[1])+(2*$filtered[2])+(3*$filtered[3])+(4*$filtered[4])+(5*$filtered[5])+(6*$filtered[6]);
        $filtered[6] = $filtered[1] + $filtered[2] + $filtered[3] + $filtered[4] + $filtered[5] + $filtered[6];
        }
       
        //создаем массив который будет работать по 6 правилу
        $array_6_pravila = array($filtered[1], $filtered[2], $filtered[3], $filtered[4], $filtered[5], $filtered[6]);
        $max_6 = array_search(max($array_6_pravila),$array_6_pravila);
        //заносим в массив
        
        $this->database->query("UPDATE stage_final SET 
        one = ?, one_2 = ?,one_2_count = ?, 
        one_3 = ?,one_3_count = ?, 
        one_4 = ?,one_4_count = ?,  
        one_5 = ?,one_5_count = ?, 
        one_6 = ?,one_6_count = ?, 
        result = ? WHERE id_participant = ? AND dance = ?",
        $filtered[1], $filtered[2], $filt_count_1, $filtered[3], $filt_count_2, 
        $filtered[4], $filt_count_3, 
        $filtered[5], $filt_count_4,
        $filtered[6], $filt_count_5, 
        $max_6+1, $id,$dance);
        $tre = $max_6+1;
        //проверить на одинаковые оценки, если есть, то посмотреть какие остались. затем проверить на схожесть по кол-ву очков. если сумма =, но кол-во разное, то тот, у кого меньшее кол-во на след место
        $out_rule_6 = $this->database->query("SELECT * FROM stage_final WHERE result = ? AND dance = ?", $tre,$dance)->all();
           $count_rule_6 = count($out_rule_6);
        $test = 0;
        if (count($out_rule_6)>1){
            if ($tre == '2'){
                foreach ($out_rule_6 as $k => $v){
                    $new[$k] = $v['one_2'];  
            if ($new[$k] != $new[$k+1])    
            $test = 1; else $test = 0;
                };
                if ($test == 1){
                $min_count_6 = min($new);
                $new_result = '3';
                $comprasion_result = $this->database->query("UPDATE stage_final SET result = ? WHERE one_2 = ? AND dance = ?",$new_result, $min_count_6,$dance);
            }};
            if ($tre == '3'){
                foreach ($out_rule_6 as $k => $v){
                    $new[$k] = $v['one_2'];            
                    if ($new[$k] != $new[$k+1])    
            $test = 1; else $test = 0;
                };
                if ($test == 1){
                $min_count_6 = min($new);
                $new_result = '4';
                $comprasion_result = $this->database->query("UPDATE stage_final SET result = ? WHERE one_3 = ? dance=?",$new_result, $min_count_6,$dance);
            }};
            if ($tre == '4'){
                foreach ($out_rule_6 as $k => $v){
                    $new[$k] = $v['one_2'];
            if ($new[$k] != $new[$k+1])    
            $test = 1; else $test = 0;
                };
                if ($test == 1){
                $min_count_6 = min($new);
                $new_result = '5';
                $comprasion_result = $this->database->query("UPDATE stage_final SET result = ? WHERE one_4 = ? dance=?",$new_result, $min_count_6,$dance);
                } };
        }; 
$test_8 = false;
        //проверяем по 7 правилу
        $rule_7 = $this->database->query("SELECT * FROM stage_final WHERE result = ? AND dance = ?", $tre,$dance)->all();
        $count_rule_7 = count($rule_7);
/*       if ($count_rule_7>1){
            if ($tre = '2' && $test == 0){
                foreach($rule_7 as $k => $v){
                    $new[$k] = $v['one_2_count'];
                if ($new[$k] == $new[$k+1])
                    $test_8 = false; else $test_8 = true;}
                if ($test_8 == false){
                $max_count_7 = max($new);
                $new_result = '3';
                $where_part = $this->database->query("SELECT * FROM stage_final WHERE one_2_count = ? AND one_2 = ? AND result = ?", $max_count_7,$filtered[2],2)->assoc();
                $comprasion_result = $this->database->query("UPDATE stage_final SET one_3 = ?, one_3_count = ?, result = ? WHERE id_participant = ? ",$t,$filt_count_1,$new_result, $where_part['id_participant']);
                }
            }
            // мин на 3 макс на 4    
            if ($tre == '3' && $test == 0){
                foreach($rule_7 as $k => $v){
                    $new[$k] = $v['one_3_result'];
                if ($new[$k] == $new[$k+1])
                    $test_8 = false; else $test_8 = true;}
                if ($test_8 == false){
                $max_count_7 = max($new);
                $new_result = '4';
                $where_part = $this->database->query("SELECT * FROM stage_final WHERE one_2_count = ? AND one_2 = ? AND result = ?", $max_count_7,$filtered[3],3)->assoc();
                $comprasion_result = $this->database->query("UPDATE stage_final SET one_4 = ?, one_4_count = ?, result = ? WHERE id_participant = ? ",$t,$filt_count_2,$new_result, $where_part['id_participant']);
                }
                }
            
            // мин на 4 макс на 5    
            if ($tre == '4' && $test == 0){
                foreach($rule_7 as $k => $v){
                    $new[$k] = $v['one_4_result'];
                if ($new[$k] == $new[$k+1])
                    $test_8 = false; else $test_8 = true;}
                if ($test_8 == false){
                $max_count_7 = max($new);
                $new_result = '5';
                $where_part = $this->database->query("SELECT * FROM stage_final WHERE one_2_count = ? AND one_2 = ? AND result = ?", $max_count_7,$filtered[4],4)->assoc();
                $comprasion_result = $this->database->query("UPDATE stage_final SET one_5 = ?, one_5_count = ?, result = ? WHERE id_participant = ? ",$t,$filt_count_3,$new_result, $where_part['id_participant']);
                }
                }
            }*/
        }
        if ($dancenumber == 1){
            $result=$this->database->query("SELECT * FROM stage_final WHERE dance = ? AND id_participant = ?",$dance,$id)->assoc();
        $this->database->query("UPDATE result_final SET dance_1 = ?, count_1 = ? WHERE id_part = ?", $dance, $result['result'], $id);}
        if ($dancenumber == 2){
            $result=$this->database->query("SELECT * FROM stage_final WHERE dance = ? AND id_participant = ?",$dance,$id)->assoc();
        $this->database->query("UPDATE result_final SET dance_2 = ?, count_2 = ? WHERE id_part = ?", $dance, $result['result'], $id);}
        if ($dancenumber == 3){
            $result=$this->database->query("SELECT * FROM stage_final WHERE dance = ? AND id_participant = ?",$dance,$id)->assoc();
        $this->database->query("UPDATE result_final SET dance_3 = ?, count_3 = ? WHERE id_part = ?", $dance, $result['result'], $id);}
        if ($dancenumber == 4){
            $result=$this->database->query("SELECT * FROM stage_final WHERE dance = ? AND id_participant = ?",$dance,$id)->assoc();
        $this->database->query("UPDATE result_final SET dance_4 = ?, count_4 = ? WHERE id_part = ?", $dance, $result['result'], $id);}
        if ($dancenumber == 5){
            $result=$this->database->query("SELECT * FROM stage_final WHERE dance = ? AND id_participant = ?",$dance,$id)->assoc();
        $this->database->query("UPDATE result_final SET dance_5 = ?, count_5 = ? WHERE id_part = ?", $dance, $result['result'], $id);}
        
        $fullfinal = $this->database->query("SELECT * FROM result_final WHERE id_part = ?",$id)->assoc();
        $count_1 = $fullfinal['count_1'];
        $count_2 = $fullfinal['count_2'];
        $count_3 = $fullfinal['count_3'];
        $count_4 = $fullfinal['count_4'];
        $count_5 = $fullfinal['count_5'];
        $fullcounts = $count_1 + $count_2 + $count_3 + $count_4 + $count_5;
        $fullcount_result = $this->database->query("UPDATE result_final SET fullcount = ? WHERE id_part = ?",$fullcounts, $id);
        
        header("Location: /?finalstage/$uid");                
        }
    //1/4 финала
    function quartergroup(){
        $this->view = $this->database->query("SELECT * FROM groups GROUP BY name_group")->all();
        $this->out("quartergroups.php");
    }
    function quarterfinal($id){
        $dance1="ча-ча-ча";
        $dance2="самба";
        $dance3="румба";
        $dance4="джайв";
        $dance5="пасадобль";
        $this->dance_1 = $this->database->query("SELECT * FROM stage_1_4 WHERE id_group = ? AND dance = ?", $id, $dance1)->all();
        $this->dance_2 = $this->database->query("SELECT * FROM stage_1_4 WHERE id_group = ? AND dance = ?",$id,$dance2)->all();
        $this->dance_3 = $this->database->query("SELECT * FROM stage_1_4 WHERE id_group = ? AND dance = ?",$id,$dance3)->all();
        $this->dance_4 = $this->database->query("SELECT * FROM stage_1_4 WHERE id_group = ? AND dance = ?",$id,$dance4)->all();
        $this->dance_5 = $this->database->query("SELECT * FROM stage_1_4 WHERE id_group = ? AND dance = ?",$id,$dance5)->all();
        $this->out('quarterfinal.php');
    }
    
    function quaterresult($id,$uid,$dance_num){
        $res="+";
        if ($dance_num == 1) $dance = 'ча-ча-ча';
        if ($dance_num == 2) $dance = 'самба';
        if ($dance_num == 3) $dance = 'румба';
        if ($dance_num == 4) $dance = 'джайв';
        if ($dance_num == 5) $dance = 'пасадобль';
        $judiciary = $this->user['number'];
        if ($judiciary == 'A') 
            $this->database->query("UPDATE stage_1_4 SET A = ? WHERE id = ? AND dance = ?", $res, $id, $dance);
        if ($judiciary == 'B') 
            $this->database->query("UPDATE stage_1_4 SET B = ? WHERE id = ? AND dance = ?", $res, $id, $dance);
        if ($judiciary == 'C') 
            $this->database->query("UPDATE stage_1_4 SET C = ? WHERE id = ? AND dance = ?", $res, $id, $dance);
        if ($judiciary == 'D') 
            $this->database->query("UPDATE stage_1_4 SET D = ? WHERE id = ? AND dance = ?",$res, $id, $dance);
        if ($judiciary == 'E') 
            $this->database->query("UPDATE stage_1_4 SET E = ? WHERE id = ? AND dance = ?", $res, $id, $dance);
        
        $trueres = $this->database->query("SELECT * FROM stage_1_4 WHERE id = ?",$id)->assoc();
        
        $A = $trueres['A'];
        $B = $trueres['B'];
        $C = $trueres['C'];
        $D = $trueres['D'];
        $E = $trueres['E'];
        
        $arr_res = array($A,$B,$C,$D,$E);
        $arr_count = array_count_values($arr_res);
        $resplus = $arr_count['+'];
        $this->database->query("UPDATE stage_1_4 SET count = ? WHERE id = ?",$resplus,$id);
        if ($dance_num == 1)
        $this->database->query("UPDATE result_1_4 SET dance_1 = ?, count_1 = ? WHERE id_part = ?", $dance, $resplus, $trueres['id_part']);
        if ($dance_num == 2)
        $this->database->query("UPDATE result_1_4 SET dance_2 = ?, count_2 = ? WHERE id_part = ?", $dance, $resplus, $trueres['id_part']);
        if ($dance_num == 3)
        $this->database->query("UPDATE result_1_4 SET dance_3 = ?, count_3 = ? WHERE id_part = ?", $dance, $resplus, $trueres['id_part']);
        if ($dance_num == 4)
        $this->database->query("UPDATE result_1_4 SET dance_4 = ?, count_4 = ? WHERE id_part = ?", $dance, $resplus, $trueres['id_part']);
        if ($dance_num == 5)
        $this->database->query("UPDATE result_1_4 SET dance_5 = ?, count_5 = ? WHERE id_part = ?", $dance, $resplus, $trueres['id_part']);
        $full = $this->database->query("SELECT * FROM result_1_4 WHERE id_part = ?",$trueres['id_part'])->assoc();
        $count_1 = $full['count_1'];
        $count_2 = $full['count_2'];
        $count_3 = $full['count_3'];
        $count_4 = $full['count_4'];
        $count_5 = $full['count_5'];
        $fullcount = $count_1 + $count_2 + $count_3 + $count_4 + $count_5;
        $fullcount_result = $this->database->query("UPDATE result_1_4 SET fullcount = ? WHERE id_part = ?",$fullcount, $trueres['id_part']);

        
        header("Location: /?quarterfinal/$uid");
    }
    
    function allquarter(){
        $this->allquarter = $this->database->query("SELECT * FROM result_1_4 ORDER BY fullcount desc")->all();
        $this->out('allquarter.php');
    }
    
        function admquarres(){
        $true="прошел";
        $result=$this->database->query("UPDATE result_1_4 SET conclusion = ? ORDER BY fullcount DESC LIMIT 12", $true);
        //ассоциативный массив
        $true_part = $this->database->query("INSERT INTO result_1_2 SELECT * FROM result_1_4 WHERE result_1_4.conclusion = ?",$true);
        $this->database->query("UPDATE result_1_2 SET conclusion = 0, count_1 = 0, count_2 = 0,count_3 = 0,count_4 = 0,count_5 = 0, fullcount = 0");
        $stages = $this->database->query("SELECT * FROM result_1_2")->all();
        foreach ($stages as $k => $v)
            $this->database->query("UPDATE stage_1_4 SET result = ? WHERE id_part = ?",$true,$v['id_part']);
        $this->database->query("INSERT INTO stage_1_2 SELECT * FROM stage_1_4 WHERE result = ?",$true);
        $this->database->query("UPDATE stage_1_2 SET A = '-',B = '-',C = '-',D = '-',E = '-',count = 0, result = ?",0);
        
        //переносим на след этап
        
        header("Location: /?allquarter ");
        
       }
    
    //полуфинал
    function semigroup(){
        $this->view = $this->database->query("SELECT * FROM groups GROUP BY name_group")->all();
        $this->out("semigroup.php");
    }
    function semifinal($id){
        $dance1="ча-ча-ча";
        $dance2="самба";
        $dance3="румба";
        $dance4="джайв";
        $dance5="пасадобль";
        $this->dance_1 = $this->database->query("SELECT * FROM stage_1_2 WHERE id_group = ? AND dance = ?", $id, $dance1)->all();
        $this->dance_2 = $this->database->query("SELECT * FROM stage_1_2 WHERE id_group = ? AND dance = ?",$id,$dance2)->all();
        $this->dance_3 = $this->database->query("SELECT * FROM stage_1_2 WHERE id_group = ? AND dance = ?",$id,$dance3)->all();
        $this->dance_4 = $this->database->query("SELECT * FROM stage_1_2 WHERE id_group = ? AND dance = ?",$id,$dance4)->all();
        $this->dance_5 = $this->database->query("SELECT * FROM stage_1_2 WHERE id_group = ? AND dance = ?",$id,$dance5)->all();
        $this->out('semifinal.php');
    }
    
    function semiresult($id,$uid,$dance_num){
        $res="+";
        if ($dance_num == 1) $dance = 'ча-ча-ча';
        if ($dance_num == 2) $dance = 'самба';
        if ($dance_num == 3) $dance = 'румба';
        if ($dance_num == 4) $dance = 'джайв';
        if ($dance_num == 5) $dance = 'пасадобль';
        $judiciary = $this->user['number'];
        if ($judiciary == 'A') 
            $this->database->query("UPDATE stage_1_2 SET A = ? WHERE id = ? AND dance = ?", $res, $id, $dance);
        if ($judiciary == 'B') 
            $this->database->query("UPDATE stage_1_2 SET B = ? WHERE id = ? AND dance = ?", $res, $id, $dance);
        if ($judiciary == 'C') 
            $this->database->query("UPDATE stage_1_2 SET C = ? WHERE id = ? AND dance = ?", $res, $id, $dance);
        if ($judiciary == 'D') 
            $this->database->query("UPDATE stage_1_2 SET D = ? WHERE id = ? AND dance = ?",$res, $id, $dance);
        if ($judiciary == 'E') 
            $this->database->query("UPDATE stage_1_2 SET E = ? WHERE id = ? AND dance = ?", $res, $id, $dance);
        
        $trueres = $this->database->query("SELECT * FROM stage_1_2 WHERE id = ?",$id)->assoc();
        
        $A = $trueres['A'];
        $B = $trueres['B'];
        $C = $trueres['C'];
        $D = $trueres['D'];
        $E = $trueres['E'];
        
        $arr_res = array($A,$B,$C,$D,$E);
        $arr_count = array_count_values($arr_res);
        $resplus = $arr_count['+'];
        $this->database->query("UPDATE stage_1_2 SET count = ? WHERE id = ?",$resplus,$id);
        if ($dance_num == 1)
        $this->database->query("UPDATE result_1_2 SET dance_1 = ?, count_1 = ? WHERE id_part = ?", $dance, $resplus, $trueres['id_part']);
        if ($dance_num == 2)
        $this->database->query("UPDATE result_1_2 SET dance_2 = ?, count_2 = ? WHERE id_part = ?", $dance, $resplus, $trueres['id_part']);
        if ($dance_num == 3)
        $this->database->query("UPDATE result_1_2 SET dance_3 = ?, count_3 = ? WHERE id_part = ?", $dance, $resplus, $trueres['id_part']);
        if ($dance_num == 4)
        $this->database->query("UPDATE result_1_2 SET dance_4 = ?, count_4 = ? WHERE id_part = ?", $dance, $resplus, $trueres['id_part']);
        if ($dance_num == 5)
        $this->database->query("UPDATE result_1_2 SET dance_5 = ?, count_5 = ? WHERE id_part = ?", $dance, $resplus, $trueres['id_part']);
        $full = $this->database->query("SELECT * FROM result_1_2 WHERE id_part = ?",$trueres['id_part'])->assoc();
        $count_1 = $full['count_1'];
        $count_2 = $full['count_2'];
        $count_3 = $full['count_3'];
        $count_4 = $full['count_4'];
        $count_5 = $full['count_5'];
        $fullcount = $count_1 + $count_2 + $count_3 + $count_4 + $count_5;
        $fullcount_result = $this->database->query("UPDATE result_1_2 SET fullcount = ? WHERE id_part = ?",$fullcount, $trueres['id_part']);
    }
    
    function allsemifinal(){
        $this->allsemifinal = $this->database->query("SELECT * FROM result_1_2 ORDER BY fullcount desc")->all();
        $this->out('allsemifinal.php');
    }
    
        function admsemires(){
        $true="прошел";
        $result=$this->database->query("UPDATE result_1_2 SET conclusion = ? ORDER BY fullcount DESC LIMIT 6", $true);
        //ассоциативный массив
        $true_part = $this->database->query("INSERT INTO result_final SELECT * FROM result_1_2 WHERE result_1_2.conclusion = ?",$true);
        $this->database->query("UPDATE result_final SET conclusion = 0, count_1 = 0, count_2 = 0,count_3 = 0,count_4 = 0,count_5 = 0, fullcount = 0");
        $stages = $this->database->query("SELECT * FROM result_1_2")->all();
        foreach ($stages as $k => $v)
            $this->database->query("UPDATE stage_1_2 SET result = ? WHERE id_part = ?",$true,$v['id_part']);
        $this->database->query("INSERT INTO stage_final(id_participant,name, dance) SELECT id_part,name,dance FROM stage_1_2 WHERE result = ?",$true);
        
        //переносим на след этап
        
        header("Location: /?allsemifinal ");
        
       }
    
    
    function allfinal(){
        $this->allfinal = $this->database->query("SELECT * FROM result_final ORDER BY fullcount ASC")->all();
        $this->out("allfinal.php");
    }
    
    function admfinalres(){
        $result = $this->database->query("SELECT * FROM result_final ORDER BY fullcount ASC")->all();
        $spot = 1;
        foreach ($result as $k => $v){
        $this->database->query("UPDATE result_final SET conclusion = ? WHERE id_part = ?",$spot,$v['id_part']);
        $spot++;
        }
        
        //переносим на след этап
        
        header("Location: /?allfinal ");
        
       }
    //настройки
    function setting(){
        $this->out("setting.php");
    }
    //страница регистраций судий
    function judiciary(){
        $this->judiciary = $this->database->query("SELECT * FROM judiciary WHERE number != '' ")->all();
        $this->out("judiciary.php");
    }
    //регистрация судий
    function regjud(){
        if(!empty($_POST)){
            $name = $_POST['name'];
            $pass = $_POST['pass'];
            $number = $_POST['number'];
            if($name && $pass && $number){
            $add1 = $this->database->query("INSERT INTO judiciary(name,pass,number) VALUES(?,?,?)",$name,$pass,$number);
                //извлекаем все записи из таблицы
                $add = $this->database->query("SELECT * FROM judiciary ORDER BY number ASC");

                while($row = $add->assoc()){
                    $jud['id'][] = $row['id'];
                    $jud['name'][] = $row['name'];
                    $jud['pass'][] = $row['pass'];
                    $jud['number'][] = $row['number'];
                }
                $message = 'Все хорошо';
            }else{
                $message = 'Не удалось записать и извлечь данные';
            }


            /* Возвращаем ответ скрипту */

            // Формируем масив данных для отправки
            $json = array(
                'message' => $message,
                'jud' => $jud
            );

            // Устанавливаем заголовот ответа в формате json
            header('Content-Type: text/json; charset=utf-8');

            // Кодируем данные в формат json и отправляем
            echo json_encode($json);     
                
            
            }
    }
    
    }
?>