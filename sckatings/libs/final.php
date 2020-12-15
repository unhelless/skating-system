<div>

  <!-- Навигационные вкладки -->  
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active dance" value="1"><a href="#dance1" aria-controls="home" role="tab" data-toggle="tab">ча-ча-ча</a></li>
    <li role="presentation" class="dance" value="2"><a href="#dance2" aria-controls="messages" role="tab" data-toggle="tab">самба</a></li>
    <li role="presentation" class="dance" value="3"><a href="#dance3" aria-controls="messages" role="tab" data-toggle="tab">румба</a></li>
    <li role="presentation" class="dance" value="4"><a href="#dance4" aria-controls="messages" role="tab" data-toggle="tab">джайв</a></li>
    <li role="presentation" class="dance" value="5"><a href="#dance5" aria-controls="messages" role="tab" data-toggle="tab">пасадобль</a></li>
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
        <td><?=$value['id_participant']?></td>
        <td><?=$value['name']?></td>
        <td><?=$value['dance']?></td>
        <td class='resfinal'>
            <button class="btn btn-info resultfin d1r1" value="<?=$value['id_participant']?>">1</button>
            <button class="btn btn-info resultfin d1r2" value="<?=$value['id_participant']?>">2</button>
            <button class="btn btn-info resultfin d1r3" value="<?=$value['id_participant']?>">3</button>
            <button class="btn btn-info resultfin d1r4" value="<?=$value['id_participant']?>">4</button>
            <button class="btn btn-info resultfin d1r5" value="<?=$value['id_participant']?>">5</button>
            <button class="btn btn-info resultfin d1r6" value="<?=$value['id_participant']?>">6</button>
        </td>
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
        <td><?=$value['id_participant']?></td>
        <td><?=$value['name']?></td>
        <td><?=$value['dance']?></td>
        <td class='resfinal'>
            <button class="btn btn-info resultfin d2r1" value="<?=$value['id_participant']?>">1</button>
            <button class="btn btn-info resultfin d2r2" value="<?=$value['id_participant']?>">2</button>
            <button class="btn btn-info resultfin d2r3" value="<?=$value['id_participant']?>">3</button>
            <button class="btn btn-info resultfin d2r4" value="<?=$value['id_participant']?>">4</button>
            <button class="btn btn-info resultfin d2r5" value="<?=$value['id_participant']?>">5</button>
            <button class="btn btn-info resultfin d2r6" value="<?=$value['id_participant']?>">6</button>
        </td>
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
        <td><?=$value['id_participant']?></td>
        <td><?=$value['name']?></td>
        <td><?=$value['dance']?></td>
        <td class='resfinal'>
            <button class="btn btn-info resultfin d3r1" value="<?=$value['id_participant']?>">1</button>
            <button class="btn btn-info resultfin d3r2" value="<?=$value['id_participant']?>">2</button>
            <button class="btn btn-info resultfin d3r3" value="<?=$value['id_participant']?>">3</button>
            <button class="btn btn-info resultfin d3r4" value="<?=$value['id_participant']?>">4</button>
            <button class="btn btn-info resultfin d3r5" value="<?=$value['id_participant']?>">5</button>
            <button class="btn btn-info resultfin d3r6" value="<?=$value['id_participant']?>">6</button>
        </td>
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
        <td><?=$value['id_participant']?></td>
        <td><?=$value['name']?></td>
        <td><?=$value['dance']?></td>
        <td class='resfinal'>
            <button class="btn btn-info resultfin d4r1" value="<?=$value['id_participant']?>">1</button>
            <button class="btn btn-info resultfin d4r2" value="<?=$value['id_participant']?>">2</button>
            <button class="btn btn-info resultfin d4r3" value="<?=$value['id_participant']?>">3</button>
            <button class="btn btn-info resultfin d4r4" value="<?=$value['id_participant']?>">4</button>
            <button class="btn btn-info resultfin d4r5" value="<?=$value['id_participant']?>">5</button>
            <button class="btn btn-info resultfin d4r6" value="<?=$value['id_participant']?>">6</button>
        </td>
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
        <td><?=$value['id_participant']?></td>
        <td><?=$value['name']?></td>
        <td><?=$value['dance']?></td>
        <td class='resfinal'>
            <button class="btn btn-info resultfin d5r1" value="<?=$value['id_participant']?>">1</button>
            <button class="btn btn-info resultfin d5r2" value="<?=$value['id_participant']?>">2</button>
            <button class="btn btn-info resultfin d5r3" value="<?=$value['id_participant']?>">3</button>
            <button class="btn btn-info resultfin d5r4" value="<?=$value['id_participant']?>">4</button>
            <button class="btn btn-info resultfin d5r5" value="<?=$value['id_participant']?>">5</button>
            <button class="btn btn-info resultfin d5r6" value="<?=$value['id_participant']?>">6</button>
        </td>
    </tr>
    <? endforeach ?>
    </tbody>
  </table>  
    </div>
    
  </div>
 <form action="?allfinal" method="post">
    <button type="submit" class="btn btn-lg btn-primary btn-block">Перейти к анализу участников</button></form>
</div>
