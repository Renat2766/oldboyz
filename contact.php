<?php

    // Если заполненны все поля формы тогда готовим письмо и отпраляем
    if ( !empty($_POST) && trim($_POST['name']) != '' && trim($_POST['email']) != '' && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && trim($_POST['message']) != ''  ) {

        // Формируем текст письма
        $message =  "Вам пришло новое сообщение с сайта: <br><br>\n" .
                    "<strong>Имя отправителя:</strong>" . strip_tags($_POST['name']) . "<br>\n" .
                    "<strong>Email отправителя: </strong>". strip_tags($_POST['email']) . "<br>\n" .
                    "<strong>Сообщение: </strong>". strip_tags($_POST['message']);

        // Формируем тему письма, специально обрабатывая её
        $subject = "=?utf-8?B?".base64_encode("Сообщение с сайта!")."?=";

        // Указываем от кого будет отправлено письмо
        $email_from = "duce201@gmail.com";
        $name_from = "OldBoyz";

        // Формируем заголовки письма
        $headers = "MIME-Version: 1.0" . PHP_EOL .
                    "Content-Type: text/html; charset=utf-8" . PHP_EOL .
                    "From: " . "=?utf-8?B?".base64_encode($name_from)."?=" . "<" . $email_from . ">" .  PHP_EOL .
                    "Reply-To: " . $email_from . PHP_EOL;

        // Выполняем отправку письма
        $sendResult = mail('duce201@yandex.ru', $subject, $message, $headers);

        if ( $sendResult ) {
        
      $success = "<div class=\"success\">Сообщение успешно отправлено.</div>";
    } else {
        $failure = "<div class=\"error\">Письмо не было отправлено. Повторите отправку еще раз.</div>";
    }

  }


    // Проверка переменной на ее наличие и на заполненность
    function checkValue($item, $message ) {
        if ( isset($item) && trim($item) == ''  ) {
            echo '<div class="error">' . $message . '</div>';
        }
    }

    // Распечатка заполненных полей из формы, если произошел вывод ошибок
    function printPostValue($item){
        if ( isset($item) && strlen(trim($item)) > 0 ) {
            echo $item;
        }
    }

    // Проверка email на наличие, заполненность и корректность email формата
    function checkEmail($email){
        if ( isset($email) && trim($email) == '' ) {
            echo '<div class="error">Email не может быть пустым. Введите email.</div>';
        } else if ( isset($email) && !filter_var($email, FILTER_VALIDATE_EMAIL) ){
            echo '<div class="error">Введите корректный адрес email.</div>';
        }
    }

?>
