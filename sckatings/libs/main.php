<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <title>Scating System</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand">Scating System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
                       <? if($this->user) {?>
            <li><a href="/?view">Участники</a></li>
            <li><a href="/?stage">Этапы</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a><?=$this->user['name']?></a></li>
            <? if($this->admin) {?>
            <li><a href="/?setting">Настройки</a></li>
            <?}?>
            <li><a href="/?logout">Выход</a></li>
          <?}?>
            <? if (!$this->user) {?>
              <li><a href="/?login">Войти</a></li>
            <?}?>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
        
    <div class="row row-offcanvas row-offcanvas-right">
        <? $this->out($this->libs,true); ?>
      </div>
  <hr>

    </div> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="/js/jquery.js"></script>
    <script src="/js/script.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>

</html>    
