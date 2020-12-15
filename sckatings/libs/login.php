    <form class="form-signin" method="post">
    <div class="alert alert-danger" role="alert" id="alert_error"><?=$this->error?></div>
    <h2 class="form-signin-heading">Авторизация</h2>
    <label>Введите ваше имя(С большой буквы):</label>
    <input type="text"  name="login" placeholder="Name" class="form-control">
    <input type="password" name="pass" placeholder="Password" class="form-control">
    <div style="padding-top:10px;">
    <button type="submit" class="btn btn-lg btn-primary btn-block" id="enter">Войти</button>
    </div>
    </form>