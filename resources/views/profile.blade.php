<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>پروفایل</title>


    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:weight@100;200;300;400;500;600;700;800&display=swap");

        body {
            background-color: #545454;
            font-family: "Poppins", sans-serif;
            font-weight: 300
        }

        .container {
            height: 100vh
        }

        .card {
            width: 380px;
            border: none;
            border-radius: 15px;
            padding: 8px;
            background-color: #fff;
            position: relative;
            height: 370px
        }

        .upper {
            height: 100px
        }

        .upper img {
            width: 100%;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px
        }

        .user {
            position: relative
        }

        .profile img {
            height: 80px;
            width: 80px;
            margin-top: 2px
        }

        .profile {
            position: absolute;
            top: -50px;
            left: 38%;
            height: 90px;
            width: 90px;
            border: 3px solid #fff;
            border-radius: 50%
        }

        .follow {
            border-radius: 15px;
            padding-left: 20px;
            padding-right: 20px;
            height: 35px
        }

        .stats span {
            font-size: 29px
        }

        #header {
            max-width: 100%;
            height: 100% ;
            object-fit: cover;
        }
    </style>
</head>
<body dir="rtl">
<div class="container d-flex justify-content-center align-items-center">
    <div class="card">
        <div class="upper"><img src="{{asset('img/profile-background.jpg')}}" class="img-fluid" id="header"></div>
        <div class="user text-center">
            <div class="profile"><img src="{{asset('img/blank-profile.png')}}" class="rounded-circle" width="80"></div>
        </div>
        <div class="mt-5 text-center">
            <h4 class="mb-0">زهرا بخشی</h4> <span class="text-muted d-block mb-2">قم</span>
            {{--            <button class="btn btn-primary btn-sm follow">اطلاعات بیشتر</button>--}}
            <div class="d-flex justify-content-center align-items-center mt-4 px-4">
                <div class="stats">
                    <h6 class="mb-0">سن</h6> <span>22</span>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
