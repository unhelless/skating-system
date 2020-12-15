
<div class="panel panel-default"> 
  
        
  <div class="panel-body">
   <form action="?admselres" method="post">
    <button type="submit" class="btn btn-lg btn-primary btn-block">Анализировать</button></form>
  </div>

  <table class="table">
   <thead>
    <tr>
        <th>id</th>
        <th>id участника</th>
        <th>Класс</th>
        <th>Доп.Класс</th>
        <th>+ Танец 1</th>
        <th>+ Танец 2</th>
        <th>+ Танец 3</th>
        <th>+ Танец 4</th>
        <th>+ Танец 5</th>
        <th>Количество +</th>
        <th>Результат</th>
<!--        <th>Баллы</th>-->
    </tr>
    </thead>
    <tbody id="part_view">
   <? foreach ($this->allselected as $key => $value): ?>
    <tr>
        <td><?=$value['id']?></td>
        <td><?=$value['id_part']?></td>
        <td><?=$value['class']?></td>
        <td><?=$value['otherclass']?></td>
        <td><?=$value['count_1']?></td>
        <td><?=$value['count_2']?></td>
        <td><?=$value['count_3']?></td>
        <td><?=$value['count_4']?></td>
        <td><?=$value['count_5']?></td>
        <td><?=$value['fullcount']?></td>
        <td><?=$value['conclusion']?></td>
    </tr>
    <? endforeach ?>
    </tbody>
  </table>

</div>