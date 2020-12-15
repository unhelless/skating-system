
<div class="panel panel-default">  
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
          <i>Регистрация судий</i>
        </a>
      </h4>
    </div>
<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" style="height: 0px;" aria-expanded="false">
      <div class="panel-body">
       <div class="form-signin">
       <div class="alert alert-success" role="alert" id="alert_success"><?=@$this->true_res?></div>
       <div class="alert alert-error" role="alert" id="alert_error"></div>
        <h4>Регистрация</h4> 
        <input type="text" id="name" placeholder="Имя судьи" class="form-control">    
        <input type="text" id="pass" placeholder="Пароль" class="form-control">
        <select  id="num" class="form-control">
                <option disabled selected>Выберите номер судьи</option>
               <option value="A" id="A">A</option>
               <option value="B" id="B">B</option>
               <option value="C" id="C">C</option>
               <option value="D" id="D">D</option>
               <option value="E" id="E">E</option>
        </select>
        <button type="button" id="reg_jud" class="btn btn-lg btn-primary btn-block">Зарегистрировать</button>
    </div>
      </div>
    </div>
  </div>
  <div class="panel-heading">Судьи</div>
  <div class="panel-body">
    <p>Здесь находится список всех судий. Здесь можно регистрировать, редактировать или же удалить судий.</p>
  </div>

  <table class="table" >
   <thead>
    <tr>
        <th>id</th>
        <th>ФИО</th>
        <th>Пароль</th>
        <th>Номер (A-E)</th>
        <th>Правки</th>
    </tr>
      </thead>
    <tbody id="part_view">
   <? foreach ($this->judiciary as $key => $value): ?>
    <tr>
        <td><?=$value['id']?></td>
        <td><?=$value['name']?></td>
        <td><?=$value['pass']?></td>
        <td><?=$value['number']?></td>
         <td><a href="/?editjud/<?=$value['id']?>" style="text-decoration: none;"><i class="glyphicon glyphicon-pencil"  data-toggle="modal" data-target="#myModal" value="<?=$tupe=$value['id']?>"></i></a><a href="/?deljud/<?=$value['id']?>" style="padding:15px; text-decoration: none;"><i class="glyphicon glyphicon-remove"></i></a></td>
    </tr>
    <? endforeach ?>
      </tbody>
  </table>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Регистрация</h4>
      </div>
      <div class="modal-body">
        <form action="/?editpart/<?=$value['id']?>">
            <input type="text" class="" name="id_part">
            <input type="text" class="" name="name_part">
            <input type="text" class="" name="age">
            <input type="text" class="" name="cat">
            <input type="text" class="" name="main_class">
            <input type="text" class="" name="other_class">
            <input type="text" class="" name="org">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary" id="editpart">Сохранить</button>
      </div>
    </div>
  </div>
</div>
</div>
