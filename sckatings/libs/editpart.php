
        <form class="form-signin" method="post" >
          <h3>Редактирование</h3>
           <input type="hidden" value="<?=$this->view['id']?>">
            <input type="text" class="form-control" id="id_participant" name="id_participant" value="<?=$this->view['id_participant']?>">
            <input type="text" class="form-control" id="name" name="name" value="<?=$this->view['name']?>">
            <input type="text" class="form-control" id="age" name="age" value="<?=$this->view['age']?>">
            <input type="text" class="form-control" id="main_class" name="main_class" value="<?=$this->view['main_class']?>">
            <input type="text" class="form-control" id="other_class" name="other_class" value="<?=$this->view['other_class']?>">
      <div class="modal-footer">
       <button type = "button" class="btn btn-secondary">
        <a href="?view" style="text-decoration:none;">Закрыть</a></button>
        <button type="submit" class="btn btn-primary">Сохранить</button>
      </div>
    </form>