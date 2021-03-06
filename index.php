<?php
require "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>TO-DO</title>
    </head>
    <body>
            <section class='nav'>
                <h1 class='logo'>
                    TO - DO list
                </h1>
                <!-- <ul>
                    <li><a href="#">home</a></li>
                    <li><a href="#">about</a></li>
                    <li><a href="#">sign-in</a></li>
                    <li><a href="#">sign-up</a></li>

                </ul> -->
            </section>
            
        
            <section class="main">
                <div class="add">
                    <form action="app/add.php" method="POST" autocomplete="off">
                        <?php if( isset($_GET['mess']) &&  $_GET['mess']=='error') {?>
                            <input type="text" name='title' placeholder="This field is required" style="border-color: red;"/>
                        <?php }else{ ?>
                            <input type="text" name='title' placeholder="Enter your task here" />
                        <?php } ?>
                        <button type='submit'>Add</button>
                    </form>
                    
                </div>
                <?php
                    $todos = $conn->query("SELECT * FROM `to-dos` ORDER BY id DESC");
                ?>
                <div class='todo-show'>
                    <?php if($todos-> rowCount() < 5){ ?>
                        <div class='items'>
                            <div class='empty'>
                                    <img src="img/to-do-cartoon.jpg" width="100%" alt="">
                                
                            </div>
                        </div>

                    <?php } ?>
                    
                    <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) {?>
                        <div class='items'>
                            <span id="<?php echo $todo['id']; ?>" class='remove-to-do' >x</span>
                            
                            <?php if($todo['checked']){ ?>
                                
                                <input type="checkbox" class='check-box' data-todo-id="<?php echo $todo['id'];?>" checked>
                                <h1 class='checked'>
                                    <?php echo $todo['title'] ?>
                                </h1>
                                
                            <?php }else  {?>
                                
                                <input type="checkbox" class='check-box' data-todo-id="<?php echo $todo['id'];?>">
                                <h1 >
                                    <?php echo $todo['title'] ?>
                                </h1>
                                                               
                            <?php } ?>
                                
                            
                            <br>
                            <small>created: <?php echo $todo['date_time'] ?></small>
                        </div>
                    <?php } ?>
                    
                </div>

            </section>

            <section class='about' id='about'>
                <div class='heading'>
                    <h2>Made by DK18 <span>&#129304;</span></h2>
                    <p>
                        Used PHP(PDO) and Ajax
                    </p>
                    <div class='social-links'>
                        <a href="https://github.com/divyashk" class="fa fa-github"></a>
                    </div>
                </div>
            </section>

        <script src='js/jquery-3.5.1.min.js'></script>
        <script>
            $(document).ready(function(){
                $('.remove-to-do').click(function(){
                    const id = $(this).attr('id');
                    
                    $.post("app/remove.php",
                        {
                            id:id
                        },
                        (data) => {
                            if(data){
                                $(this).parent().hide(600);
                            }
                        }
                    );
                })
                $(".check-box").click(function(e){

                    const id = $(this).attr('data-todo-id');
                    
                    $.post('app/check.php',
                        {
                            id: id
                        },
                        (data)=>{
                            if( data != 'error'){
                                const h1 = $(this).next();
                                
                                if(data === "1"){
                                    h1.removeClass('checked');
                                }else {
                                    h1.addClass('checked');
                                }
                            }

                        }
                    )
                })
            })

        </script>
    

    </body>


</html>