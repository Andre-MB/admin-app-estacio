<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastro2.css">
    <link rel="stylesheet" href="../css/padroes.css">
    <title>Form 2-5</title>
</head>
<body>
    <div class="bg-main-content">
        <div class="bg-user-form">
            <div>
                <img src="../images/IconUser.png" alt="ICON USER" width="200" height="200">

            </div>
            <div>
                <section> 
                <p>QUAL SEU PÉRIODO?</p>   
                <label for="box1">1º</label><br>
                <input type="checkbox" id="box1" name="box1" value="">
                <label for="box2">2º</label><br>
                <input type="checkbox" id="box2" name="box2" value="">
                <label for="box3">3º</label><br>            
                <input type="checkbox" id="box3" name="box3" value="">
                <label for="box4">4º</label><br>            
                <input type="checkbox" id="box4" name="box4" value="">
                <label for="box5">5º</label><br>            
                <input type="checkbox" id="box5" name="box5" value="">
                <label for="box6">6º</label><br>            
                <input type="checkbox" id="box6" name="box6" value="">
                <label for="box7">7º</label><br>            
                <input type="checkbox" id="box7" name="box7" value="">
                <label for="box8">8º</label><br>            
                <input type="checkbox" id="box8" name="box8" value="">
                </section>

                <section>
                <label for="Outro">Outro:</label><br>
                <input type="checkbox" id="Outro" name="Outro" value="">
                <input type="text" id="Outro" name="Outro" placeholder="período..."/>


                <label class="picture" for="picture_input"><span class="picture__image">Carregar uma foto</span></label>
                <input type="file" accept="image/*" id="picture_input">
                </section>


            </div>
        </div>
    </div>
</body>
</html>