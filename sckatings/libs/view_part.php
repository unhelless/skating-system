
<div class="panel panel-default">
<? if($this->admin){?>    
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed" id="coll">
          <i>Регистрация участников</i>
        </a>
      </h4>
    </div>
<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" style="height: 0px;" aria-expanded="false">
      <div class="panel-body">
       <form method="post" class="form-signin">
       <div class="alert alert-success" role="alert" id="alert_success"><?=@$this->true_res?></div>
       <div class="alert alert-error" role="alert" id="alert_error"></div>
        <h4>Регистрация</h4> 
        <input type="text" id="id_participant" placeholder="id участника" class="form-control">    
        <input type="text" id="name_part" placeholder="ФИО" class="form-control">
        <input type="text" id="age" placeholder="Дата рождения(формата Д.М.Г)" class="form-control">
<!--        <input type="text" id="main_class" placeholder="Класс" class="form-control">-->
<!--        <input type="text" id="other_class" placeholder="Доп. класс (ОК или ЗК)" class="form-control">-->
        <select  id="main_class" class="form-control">
                <option disabled selected>Выберите осн.класс</option>
               <option value="ШбТ" >ШбТ</option>
               <option value="E" >E</option>
               <option value="D" >D</option>
               <option value="C" >C</option>
               <option value="B" >B</option>
               <option value="A" >A</option>
        </select> 
        <select  id="other_class" class="form-control">
                <option disabled selected value="-">Выберите доп.класс</option>   
                <option value="ОК" >Открытый класс</option>
                <option value="ЗК" >Закрытый класс</option>
        </select>
        <button type="button" id="reg_sub" class="btn btn-lg btn-primary btn-block">Зарегистрировать</button>
    </form>
      </div>
    </div>
  </div>

<?}?>
  <div class="panel-heading">Участники</div>
  <div class="panel-body">
    <p>Здесь находится весь список участников, которые присутствуют в данном соревновании.</p>
  </div>

  <table class="table">
   <thead >
    <tr>
        <th>id</th>
        <th>id участника</th>
        <th>ФИО</th>
        <th>Возраст</th>
        <th>Категория</th>
        <th>Класс</th>
        <th>Доп.Класс</th>
        <? if($this->admin){?>
        <th>Правки</th>
        <?}?>
    </tr>
    </thead>
    <tbody id="part_view">
   <? foreach ($this->view as $key => $value): ?>
    <tr>
        <td><?=$value['id']?></td>
        <td><?=$value['id_participant']?></td>
        <td><?=$value['name']?></td>
        <td><?=$value['age']?></td>
        <td><?=$value['categoriy']?></td>
        <td><?=$value['main_class']?></td>
        <td><?=$value['other_class']?></td>
        <? if($this->admin){?>
        <td><a href="/?editpart/<?=$value['id']?>" style="text-decoration: none;"><i class="glyphicon glyphicon-pencil"  data-toggle="modal" data-target="#myModal" value="<?=$tupe=$value['id']?>"></i></a><a href="/?delpart/<?=$value['id']?>" style="padding:15px; text-decoration: none;"><i class="glyphicon glyphicon-remove"></i></a></td>
        <?}?>
    </tr>
    <? endforeach ?>
    </tbody>
  </table>

</div>
