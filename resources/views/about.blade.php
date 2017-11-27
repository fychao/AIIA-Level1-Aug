<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>About This Project</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    About This Project
                </div>

                <div class="">
<pre>
Project Name: 服飾零售商的常客服務系統
展示情境：
請看 https://www.youtube.com/watch?v=GnNh_5VYVn8 
關鍵報告的劇情。某個客人進到服飾店進，使用人臉識別系統偵測出是某常客會員，系統中自動帶出這個常客曾經買過的商品項句，並 pop up 一個使用經驗問題。

技術說明：基本上就是本次上課的內容再加上一個購買紀錄(fake)，並從使用經驗問題庫(隨便設計個五題)中隨機選一個問題丟到顯示平台上，讓客服小姐詢問並紀錄。

系統：
1) 常客會員註冊系統(就是上傳一張照片)及填上使用者名稱，其本上只要1~2個常客資料即可。
2) 人臉識別系統串接 webcam (這個好像 open cv 有工具，需要 survey)，要配合 1) 項做到即時上傳、索引及計算。
3) 商品資料庫及購物歷史資料庫，在識別出常客後從系統中找出此位常客上次購買的商品。若沒有商品…則隨便推薦個商品。
4) 使用經驗問題庫(就 csv 吧!)及使用經驗紀綠資料庫


</pre>
                </div>
            </div>
        </div>
    </body>
</html>
