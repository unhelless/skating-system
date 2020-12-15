        <div class="form-signin">
            <h3>Регистрация группы</h3>
           <select  id="main_clss" class="form-control main_clss">
                <option disabled selected>Выберите осн.класс</option>
               <option value="ШбТ" >ШбТ</option>
               <option value="E" >E</option>
               <option value="D" >D</option>
               <option value="C" >C</option>
               <option value="B" >B</option>
               <option value="A" >A</option>
           </select>       
           <select  id="other_cls" class="form-control other_cls">
                <option disabled selected value="-">Выберите доп.класс</option>   
                <option value="ОК" >Открытый класс</option>
                <option value="ЗК" >Закрытый класс</option>
           </select>
           <select  id="cat" class="form-control cat">
                <option disabled selected>Выберите категорию</option>
               <option value="Бэби-1">Бэби-1</option>
               <option value="Бэби-2">Бэби-2</option>
               <option value="Дети-1">Дети-1</option>
               <option value="Дети-2">Дети-2</option>
               <option value="Юниоры-1">Юниоры-1</option>
               <option value="Юниоры-2">Юниоры-2</option>
               <option value="Молодежь">Молодежь</option>
               <option value="Взрослая-1">Взрослая-1</option>
               <option value="Взрослая-2">Взрослая-2</option>
               <option value="Взрослая-3">Взрослая-3</option>
               <option value="Синьоры">Синьоры</option>
           </select>
            <button type="button" id="sortgr" class="btn btn-primary btn-lg btn-block">Сортировка</button>
                </div>

    <div class="form-signin">
       <fieldset class="">
        <label for="name_group">Название группы</label>
        <input type="text" id="name_group" class="form-control" placeholder="(англ буквами, либо цифрой/ами)">
        </fieldset>
        <button type="button" id="reggroup" class="btn btn-primary btn-lg btn-block">Регистрировать</button>
    </div>

      

    <div class="panel panel-default">
    <div class="panel-heading">Участники</div>


  <table class="table">
   <thead>
    <tr>
        <th>id</th>
        <th>id участника</th>
        <th>ФИО</th>
        <th>Возраст</th>
        <th>Категория</th>
        <th>Класс</th>
        <th>Доп.Класс</th>
    </tr>
    </thead>
    <tbody id="part_view">
   <? foreach ($this->view as $key => $value): ?>
    <tr class="tr">
        <td><?=$value['id']?></td>
        <td><?=$value['id_participant']?></td>
        <td><?=$value['name']?></td>
        <td><?=$value['age']?></td>
        <td><?=$value['categoriy']?></td>
        <td><?=$value['main_class']?></td>
        <td><?=$value['other_class']?></td>
    </tr>
    <? endforeach ?>
    </tbody>
  </table>
</div>
