<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style.css">
    <title>TO-DO</title>
</head>
<body>
        <section class='nav'>
            <h1 class='logo'>
                TO - DO list
            </h1>
            <ul>
                <li><a href="#">home</a></li>
                <li><a href="#">about</a></li>
                <li><a href="#">sign-in</a></li>
                <li><a href="#">sign-up</a></li>

            </ul>
        </section>
        
    
        <section class="main">
            <div class="add">
                <form action="">
                    <input type="text" name='title' placeholder="Enter your task here" />
                    <button type='submit'>Add</button>
                </form>
                
            </div>
            
            <div class='todo-show'>
                <div class='items'>
                    <div class='task'>
                        <input type="checkbox">
                        <h1>
                            First task
                        </h1>
                    </div>
                    <small>created: somedate</small>
                </div>
                <div class='items'>
                    <div class='task'>
                        <input type="checkbox">
                        <h1>
                            First task
                        </h1>
                    </div>
                    <small>created: somedate</small>
                </div>
            </div>

        </section>
</body>
</html>