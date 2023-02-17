<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông tin tạo tài khoản</title>
    <style>
        .info {
            color: #0f0f0f;
            font-size: 16px;
        }
    </style>
</head>
<body>
<section>
    <h1>Thông tin khởi tạo tài khoản</h1>
    <div>
        <p><span class="info">{{ __('common.name') }}</span>: {{ data_get($data, 'name', '') }}</p>
        <p><span class="info">{{ __('common.email') }}</span>: {{ data_get($data, 'email', '') }}</p>
        <p><span class="info">{{ __('common.password') }}</span>: {{ data_get($data, 'password', '') }}</p>
    </div>
</section>
</body>
</html>

