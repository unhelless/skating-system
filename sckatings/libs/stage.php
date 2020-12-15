
        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="offcanvas">Категории</button>
        </p>
          <div class="jumbotron">
            <h3>Этапы</h3>
            <p>Перед вами этапы соревнования. Чтобы перейти на отдельный этап, нажмите на "Категории" и выберите категорию</p>
          </div>
          <div class="row">

          </div>
        </div>

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <a href="?screening" class="list-group-item">Отборочный</a>
            <a href="?quartergroup" class="list-group-item">Четвертьфинала</a>
            <a href="?semigroup" class="list-group-item">Полуфинал</a>
            <a href="?finalstage" class="list-group-item">Финал</a>
            <? if ($this->admin) {?>
            <label for=""></label>
            <a href="?formgroup" class="list-group-item">Зарегистрировать группу</a>
            <?}?>
          </div>
        </div>