<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Форма обратной связи на AJAX</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <!--[if lt IE 9]>
		 <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script >
		 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>

<body>

    <style>
    #message {
        padding-top: 50px;
        padding-bottom: 70px;
        background-color: #f8f8f8;
        border-top: 1px solid #e5e5e5
    }

    #message h2 {
        margin-bottom: 30px
    }

    #message h2 span {
        border-bottom: 5px solid #ed1d25
    }

    #message label {
        color: #666;
        margin-bottom: 10px;
        font-size: 1.2em
    }

    #message #form_email,
    #message #form_message,
    #message #form_name {
        box-sizing: border-box;
        border: 1px solid #fff;
        box-shadow: none
    }

    #message #form_email,
    #message #form_name {
        padding: 25px;
        border: 1px solid #ccc;
        font-size: 1.1em
    }

    #message #form_message {
        height: 249px;
        padding: 25px;
        border: 1px solid #ccc;
        font-size: 1.2em
    }

    #message #button_contacts {
        background: #666;
        padding: 15px 0;
        width: 100%;
        border: 2px solid #666;
        color: #fff;
        cursor: pointer;
        font-size: 1.3em;
        text-transform: uppercase;
        transition: background .6s, color .6s
    }

    #message #button_contacts:hover {
        background: 0 0;
        color: #666
    }
    </style>

    <section id="message">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><span>Форма</span> обратной связи</h2>
                    <div id="contact-form">
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_email">Ваш Email *</label>
                                        <input id="form_email" type="email" class="form-control"
                                            placeholder="Введите адрес электронной почты*" required=""
                                            data-error="Требуется действующее электронное письмо.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">Ваше имя *</label>
                                        <input id="form_name" type="text" class="form-control" required=""
                                            placeholder="Как к Вам обращаться?">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 checkbox-data">
                                    <label>
                                        <input type="checkbox" checked="checked" id="person_data" required="">
                                        <i class="fa fa-2x icon-checkbox"></i>
                                        <span>Подтверждаю согласие на обработку <a href="#" target="_blank">персональных
                                                данных</a></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea id="form_message" name="text_comment" class="form-control"
                                            placeholder="Пожалуйста, оставьте сообщение" rows="4" required=""
                                            data-error="Пожалуйста, оставьте нам сообщение."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="messages"></div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <input type="submit" name="btn_submit" id="button_contacts"
                                        value="Отправить сообщение">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
    $(document).ready(function() {
        $('#button_contacts').click(function() {
            var form_name = $('#form_name').val();
            var form_email = $('#form_email').val();
            var form_message = $('#form_message').val();
            $.ajax({
                url: "post.php",
                type: "post",
                dataType: "json",
                data: {
                    "form_name": form_name,
                    "form_email": form_email,
                    "form_message": form_message
                },
                success: function(data) {
                    $('.messages').html(data.result);
                }
            });
        });
    });
    </script>

</body>

</html>