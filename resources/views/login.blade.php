<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../resources/css/form.css">
    <link rel="shortcut icon" href="https://laravel.com/img/favicon/favicon.ico">
</head>

<body>
    <div class="login-page">
        <div class="form">
            <form class="register-form">
                <input type="text" placeholder="Enter Name" />
                <input type="text" placeholder="Enter Email" />
                <input type="password" placeholder="Enter Password" />
                <button onclick="create(event)">Create</button>
                <p class="message">Already registered? <a href="javascript:void(0)">Sign In</a></p>
            </form>
            <form class="login-form">
                <input type="text" placeholder="Enter Email" />
                <input type="password" placeholder="Enter Password" />
                <button onclick="login()">Login</button>
                <p class="message">Not registered? <a href="javascript:void(0)">Create an account</a></p>
            </form>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    $('.message a').click(function() {
        $('form').animate({
            height: "toggle",
            opacity: "toggle"
        });
    });
</script>
<script src="../resources/js/form.js"></script>

</html>