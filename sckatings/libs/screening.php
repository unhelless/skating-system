
         <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="offcanvas">Категории</button>
        </p>
          <div class="jumbotron">
            <h3>Отборочный этап</h3>
            <p>Перед вами список групп, которые находятся в отборочном этапе</p>
          </div>
          <div class="row">
            <? foreach ($this->screening as $key => $value): ?>
            
            <div class="col-xs-6 col-lg-4">
              <h3>Класс: <?=$value['class']?></h3>
              <h3>Доп.Класс: <?=$value['otherclass']?></h3>
              <p><a class="btn btn-default" href="/?selected/<?=$value['name_group']?>" role="button">Подробно &raquo;</a></p>
            </div>
            
            <? endforeach?>
          </div>
        </div>
        
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <a href="?screening" class="list-group-item active">Отборочный</a>
            <a href="?quartergroup" class="list-group-item">Четвертьфинала</a>
            <a href="?semigroup" class="list-group-item">Полуфинал</a>
            <a href="?finalstage" class="list-group-item">Финал</a>
            <? if ($this->admin) {?>
            <label for=""></label>
            <a href="?allselected" class="list-group-item">Общий список</a><?}?>
          </div>
        </div>