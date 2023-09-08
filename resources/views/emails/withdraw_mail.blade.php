<!DOCTYPE html>
<html lang="jp">
        
    <head>
        <meta charset="utf-8">
    </head>

    <body>

        <p>
            {{ $user }}様こんにちは。
        </p>

        <p>
            {{ config('app.name')}}です。
        </p>

        <p>
            {{ $date }}に出金が行われました。
        </p>

        <p>
            よろしくお願いします、 
            
            {{ config('app.name')}}
        </p>

        
    </body>

</html>