<div>

  <!-- Навигационные вкладки -->  
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active" value="1"><a href="#dance1" aria-controls="home" role="tab" data-toggle="tab">ча-ча-ча</a></li>
    <li role="presentation" value="2"><a href="#dance2" aria-controls="messages" role="tab" data-toggle="tab">самба</a></li>
    <li role="presentation" value="3"><a href="#dance3" aria-controls="messages" role="tab" data-toggle="tab">румба</a></li>
    <li role="presentation" value="4"><a href="#dance4" aria-controls="messages" role="tab" data-toggle="tab">джайв</a></li>
    <li role="presentation" value="5"><a href="#dance5" aria-controls="messages" role="tab" data-toggle="tab">пасадобль</a></li>
  </ul>

  <!-- Вкладки панелей -->  
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="dance1"><div class="panel panel-default">
 <div class="panel-heading">Участники</div>
  <div class="panel-body">
    <p>Здесь находятся участники данной группы.</p>
  </div>
  
  <table class="table">
   <thead class="">
    <tr>
        <th>id</th>
        <th>id участника</th>
        <th>ФИО</th>
        <th>Танец</th>
        <th>Ваша оценка</th>
    </tr>
    </thead>
    <tbody id="part_view">
   <? foreach ($this->dance_1 as $key => $value): ?>
    <tr class="num">
        <td><?=$value['id']?></td>
        <td><?=$value['id_part']?></td>
        <td><?=$value['name']?></td>
        <td><?=$value['dance']?></td>
        <td class='ressel'>
        <input type="hidden" class="id_quar" value="<?=$value['id']?>">
        <i class="glyphicon glyphicon-plus id_group"  data-toggle="modal" data-target="#myModal"><i style="visibility:hidden"><?=$value['id_group']?></i></i></td>
    </tr>
    <? endforeach ?>
    </tbody>
  </table>
</div></div>
    <div role="tabpanel" class="tab-pane" id="dance2">
    <div class="panel panel-default">
 <div class="panel-heading">Участники</div>
  <div class="panel-body">
    <p>Здесь находятся участники данной группы.</p>
  </div>
  
  <table class="table">
   <thead class="">
    <tr>
        <th>id</th>
        <th>id участника</th>
        <th>ФИО</th>
        <th>Танец</th>
        <th>Ваша оценка</th>
    </tr>
    </thead>
    <tbody id="part_view">
   <? foreach ($this->dance_2 as $key => $value): ?>
    <tr class="num">
        <td><?=$value['id']?></td>
        <td><?=$value['id_part']?></td>
        <td><?=$value['name']?></td>
        <td><?=$value['dance']?></td>
        <td class='ressel'>
        <input type="hidden" class="id_quar" value="<?=$value['id']?>">
        <i class="glyphicon glyphicon-plus id_group"  data-toggle="modal" data-target="#myModal"><i style="visibility:hidden"><?=$value['id_group']?></i></i></td>
    </tr>
    <? endforeach ?>
    </tbody>
  </table>  
    </div>
    
  </div>
      <div role="tabpanel" class="tab-pane" id="dance3">
    <div class="panel panel-default">
 <div class="panel-heading">Участники</div>
  <div class="panel-body">
    <p>Здесь находятся участники данной группы.</p>
  </div>
  
  <table class="table">
   <thead class="">
    <tr>
        <th>id</th>
        <th>id участника</th>
        <th>ФИО</th>
        <th>Танец</th>
        <th>Ваша оценка</th>
    </tr>
    </thead>
    <tbody id="part_view">
   <? foreach ($this->dance_3 as $key => $value): ?>
    <tr class="num">
        <td><?=$value['id']?></td>
        <td><?=$value['id_part']?></td>
        <td><?=$value['name']?></td>
        <td><?=$value['dance']?></td>
        <td class='ressel'>
        <input type="hidden" class="id_quar" value="<?=$value['id']?>">
        <i class="glyphicon glyphicon-plus id_group"  data-toggle="modal" data-target="#myModal"><i style="visibility:hidden"><?=$value['id_group']?></i></i></td>
    </tr>
    <? endforeach ?>
    </tbody>
  </table>  
    </div>
    
  </div>
      <div role="tabpanel" class="tab-pane" id="dance4">
    <div class="panel panel-default">
 <div class="panel-heading">Участники</div>
  <div class="panel-body">
    <p>Здесь находятся участники данной группы.</p>
  </div>
  
  <table class="table">
   <thead class="">
    <tr>
        <th>id</th>
        <th>id участника</th>
        <th>ФИО</th>
        <th>Танец</th>
        <th>Ваша оценка</th>
    </tr>
    </thead>
    <tbody id="part_view">
   <? foreach ($this->dance_4 as $key => $value): ?>
    <tr class="num">
        <td><?=$value['id']?></td>
        <td><?=$value['id_part']?></td>
        <td><?=$value['name']?></td>
        <td><?=$value['dance']?></td>
        <td class='ressel'>
        <input type="hidden" class="id_quar" value="<?=$value['id']?>">
        <i class="glyphicon glyphicon-plus id_group"  data-toggle="modal" data-target="#myModal"><i style="visibility:hidden"><?=$value['id_group']?></i></i></td>
    </tr>
    <? endforeach ?>
    </tbody>
  </table>  
    </div>
    
  </div>
      <div role="tabpanel" class="tab-pane" id="dance5">
    <div class="panel panel-default">
 <div class="panel-heading">Участники</div>
  <div class="panel-body">
    <p>Здесь находятся участники данной группы.</p>
  </div>
  
  <table class="table">
   <thead class="">
    <tr>
        <th>id</th>
        <th>id участника</th>
        <th>ФИО</th>
        <th>Танец</th>
        <th>Ваша оценка</th>
    </tr>
    </thead>
    <tbody id="part_view">
   <? foreach ($this->dance_5 as $key => $value): ?>
    <tr class="num">
        <td><?=$value['id']?></td>
        <td><?=$value['id_part']?></td>
        <td><?=$value['name']?></td>
        <td><?=$value['dance']?></td>
        <td class='ressel'>
        <input type="hidden" class="id_quar" value="<?=$value['id']?>">
        <i class="glyphicon glyphicon-plus id_group"  data-toggle="modal" data-target="#myModal"><i style="visibility:hidden"><?=$value['id_group']?></i></i></td>
    </tr>
    <? endforeach ?>
    </tbody>
  </table>  
    </div>
    
  </div>
 <form action="?screening" method="post">
    <button type="submit" class="btn btn-lg btn-primary btn-block">Вернуться</button></form>
</div>
