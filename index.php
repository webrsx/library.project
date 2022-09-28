<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>main page</title>
</head>
<body>
  <header class="container">
    <div class="row">
      <div class="col-md-4">logo</div>
      <div class="col-md-4">some inform</div>
      <div class="col-md-4">
        <button>
          sign in
        </button>
        <button class="test">
          sign up
        </button>
      </div>
    </div>
  </header>

<div class="container">
  
    <div class="row justify-content-md-center">
      <div class="col-md-6">
        <h3>Панелька запросов</h3>
      </div>
    </div>
   
    <div class="row">
      <div class="col-md-3 border border-dark">
      <form method="POST" action="#">
        <P>создание книги</P>
          <div>
            <label for="name-book">название книги</label>
            <input type="text" name="name-book">
          </div>
          <div>
            <label for="description">описание</label>
            <input type="text" name="description">
          </div>
          <div>
            <label for="date-publication">дата публикации</label>
            <input type="text" name="date-publication">
          </div>
        <input type="submit" value="создать">
      </form>



      </div>
      <div class="col-md-3 border border-dark">
        <form class="form-example" action="#" method="get">
          <p>получение списка книг по 2 критериям</p>
          <div>
            <label for="count-authors">количество авторов </label>
            <input type="text" name="count-authors">
          </div>
          <div>
            <label for="date-publication">год публикации</label>
            <input type="date-publication" name="date-publication">
          </div>
          <div class="form-example">
            <input type="submit" value="показать">
          </div>
        </form>
      </div>
      <div class="col-md-3 border border-dark">
        <form action="" method="get">
          <p>получение списка авторов</p>
          <div>
            <label for="count-authors">количество написавших книгу авторов</label>
            <input type="text" name="count-authors">
          </div>
          <div class="form-example">
            <input type="submit" value="показать">
          </div>
        </form>
      </div>
    </div>
    

    <div class="row">
      <div class="row justify-content-md-center">
        <div class="col-md-4">
          <h3>Книги</h3>
        </div>
      </div>

      <div class="col-md-3">
        <p>book1</p>
        <p>author1</p>
        <p>img1</p>
        <button>подробнее</button>
        <button>редактировать</button>
      </div>
      <div class="col-md-3">
        <p>book2</p>
        <p>author2</p>
        <p>img2</p>
        <button>подробнее</button>
        <button>редактировать</button>
      </div>
      <div class="col-md-3">
        <p>book3</p>
        <p>author3</p>
        <p>img3</p>
        <button>подробнее</button>
        <button>редактировать</button>
      </div>
      <div class="col-md-3">
        <p>book4</p>
        <p>author4</p>
        <p>img4</p>
        <button>подробнее</button>
        <button>редактировать</button>
      </div>


      <div class="row">
        <div class="row justify-content-md-center">
          <div class="col-md-4">
            <h3>Авторы</h3>
          </div>
        </div>

        <div class="col-md-3">
          <p>id-1</p>
          <p>Иванов Иван Иванович</p>
          <p>Опубликовано книг: 2</p>
          <p>Название книг: книга1, книга2</p>
          <button>редактировать</button>
        </div>
        <div class="col-md-3">
          <p>id-1</p>
          <p>Иванов Иван Иванович</p>
          <p>Опубликовано книг: 2</p>
          <p>Название книг: книга1, книга2</p>
          <button>редактировать</button>
        </div>
        <div class="col-md-3">
          <p>id-1</p>
          <p>Иванов Иван Иванович</p>
          <p>Опубликовано книг: 2</p>
          <p>Название книг: книга1, книга2</p>
          <button>редактировать</button>
        </div>
        <div class="col-md-3">
          <p>id-1</p>
          <p>Иванов Иван Иванович</p>
          <p>Опубликовано книг: 2</p>
          <p>Название книг: книга1, книга2</p>
          <button>редактировать</button>
        </div>
    </div>

      
</div>


  
  
    <script src="public/scripts/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>