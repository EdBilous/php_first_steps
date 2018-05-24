<?php
if ($_POST)
    goto end;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>
<body>
<form class="form-horizontal" role="form" action="action.php" method="post">
    <div class="form-group">
        <label  class="col-sm-2 control-label">Введите имя</label>
        <div class="col-sm-2">
            <input type="text" required="required" name="name" class="form-control" id="inputEmail3" placeholder="Имя">
        </div>
    </div>
    <div class="form-group">
        <label  class="col-sm-2 control-label">Введите возраст</label>
        <div class="col-sm-2">
            <input type="text" required="required" name="age"  class="form-control"  placeholder="Возраст">
        </div>
    </div>
    </div>
    </div>
    <div class="form-group">
        <label  class="col-sm-2 control-label">Введите день своего рождения</label>
        <div class="col-sm-2">
            <input type="text" required="required" name="day"  class="form-control"  placeholder="День">
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">Введите номер месяца своего рождения</label>
            <div class="col-sm-2">
                <input type="text" required="required" name="month"  class="form-control"  placeholder="месяц">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary" type="button" class="btn btn-primary">Отправить</button>
            </div>
        </div>
</form>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<?php
end:
if ($_POST) {
    function getZodiacalSign($month, $day) {
        $signs = array("Козерог", "Водолей", "Рыбы", "Овен", "Телец", "Близнецы", "Рак", "Лев", "Девы", "Весы", "Скорпион", "Стрелец");
        $signsstart = array(1=>21, 2=>20, 3=>20, 4=>20, 5=>20, 6=>20, 7=>21, 8=>22, 9=>23, 10=>23, 11=>23, 12=>23);
        return $day < $signsstart[$month + 1] ? $signs[$month - 1] : $signs[$month % 12];
    }
    $zodiac = getZodiacalSign($_POST["month"], $_POST["day"]);
    $numericArray = array_values($_POST);
    $months =["Январь", "Февраль", "Март", "Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"];
    $month = $months[$numericArray[3]-1];
    $pictures = ["Козерог" => "http://www.missfit.ru/zodiac/i/2-18120741.jpg","Водолей" => "http://www.missfit.ru/zodiac/i/2-18120735.jpg",
        "Рыбы" => "http://www.missfit.ru/zodiac/i/2-18120745.jpg","Овен" => "http://www.missfit.ru/zodiac/i/2-18120738.jpg",
        "Телец" => "http://www.missfit.ru/zodiac/i/2-18120748.jpg","Близнецы" => "http://www.missfit.ru/zodiac/i/2-18120742.jpg",
        "Рак" => "http://www.missfit.ru/zodiac/i/2-18120739.jpg","Лев" => "http://www.missfit.ru/zodiac/i/2-18120747.jpg",
        "Девы" => "http://www.missfit.ru/zodiac/i/2-18120751.jpg","Весы" => "http://www.missfit.ru/zodiac/i/2-18120744.jpg",
        "Скорпион" => "http://www.missfit.ru/zodiac/i/2-18120743.jpg","Стрелец" => "http://www.missfit.ru/zodiac/i/2-18120746.jpg"];
    $zodiacPicture = $pictures[$zodiac];
    $hrefs = ["Козерог" => "https://horoscopes.rambler.ru/capricorn/",
        "Водолей" => "https://horoscopes.rambler.ru/aquarius/",
        "Рыбы" => "https://horoscopes.rambler.ru/pisces/",
        "Овен" => "https://horoscopes.rambler.ru/aries/",
        "Телец" => "https://horoscopes.rambler.ru/taurus/",
        "Близнецы" => "https://horoscopes.rambler.ru/gemini/",
        "Рак" => "https://horoscopes.rambler.ru/cancer/",
        "Лев" => "https://horoscopes.rambler.ru/leo/",
        "Девы" => "https://horoscopes.rambler.ru/virgo/",
        "Весы" => "https://horoscopes.rambler.ru/libra/",
        "Скорпион" => "https://horoscopes.rambler.ru/scorpio/",
        "Стрелец" => "https://horoscopes.rambler.ru/sagittarius/"];
    $zodiacHref = $hrefs[$zodiac];
    $handle = fopen ("create.txt","w+");
    fwrite($handle, implode("  ",$_POST));
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Zodiac</title>
    <style>
        .fig {
            text-align: center;
        }
       td{
           font-weight: bold;
       }
    </style>
</head>
<body>
<?php
?>
<h1 class="fig">Вот что мы имеем</h1>
<table class="table table-hover table table-bordered" >
    <tr>
        <td class="fig">Имя</td>
        <td class="fig">Возраст</td>
        <td class="fig">Месяц</td>
        <td class="fig">Число</td>
        <td class="fig">Знак зодиака</td>
    </tr>
    <tr>
        <td class="fig"><?php echo "$numericArray[0]"; ?></td>
        <td class="fig"><?php echo "$numericArray[1]"; ?></td>
        <td class="fig"><?php echo "$month"; ?></td>
        <td class="fig"><?php echo "$numericArray[3]"; ?></td>
        <td class="fig"><?php echo "$zodiac"; ?></td>
    </tr>
    </table>
<p class="fig"><a href="<?php echo "$zodiacHref"; ?>"><img src="<?php echo "$zodiacPicture"; ?>"></a></p>
<h1 class="fig">Хочешь узнать свой гороскоп</br> на сегодня, нажми на картинку </h1>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>







