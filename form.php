<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/form.css">
    <script src="form.js" defer></script>
    <title>Formulário</title>
</head>
<body>
    <section>
        <form id="postreg" name="form1" action="form_php.php" method="POST">

            <!--Bolas de progresso-->
            <div style="text-align:center;margin-top:30px;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div><br>

            <!--Ilustração do form-->
            <div class="img">
                <img src="images/formillust.svg" alt="">
            </div>

            <!--Primeira Parte-->
            <div class="tab">
                <h1>Qual seu sexo?</h1>
                <select name="sexo">
                    <option value="0">Selecionar sexo:</option>
                    <option data-icon="images/masc.svg" value="1" oninput="this.className = ''">Masculino</option>
                    <option value="2" oninput="this.className = ''">Feminino</option>
                </select>
                <br>
            </div>

            <!--Segunda Parte-->
            <div class="tab">
                <h1>Qual seu objetivo?</h1>
                <select name="objetivo">
                    <option value="0">Selecionar objetivo:</option>
                    <option value="1" oninput="this.className = ''">Emagrecer</option>
                    <option value="2" oninput="this.className = ''">Ganhar peso</option>
                    <option value="3" oninput="this.className = ''">Manter peso</option>
                </select>
                <br>
            </div>


            <!--Terceira Parte-->
            <div class="tab">
                <h1>Qual seu peso?</h1>
                <p class="kgp"><input name="txtPeso" type="text" placeholder="Peso" oninput="this.className = ''">KG</p>
                <img src="images/kg.svg" alt="">
                <img src="images/libra.svg" alt="">
                <br>
            </div>


            <div class="tab">
                <h1>Qual sua altura?</h1>
                <p class="kgp"><input name="txtAltura" type="text" placeholder="Altura" oninput="this.className = ''">CM</p>
                <img src="images/kg.svg" alt="">
                <img src="images/ruler.svg" alt="">
                <br>
            </div>


            <div class="tab">
                <h1>Qual seu nível de atividades físicas?</h1>
                <select name="atividade">
                    <option value="0">Selecionar nível:</option>
                    <option value="1" oninput="this.className = ''">Leve</option>
                    <option value="2" oninput="this.className = ''">Moderado</option>
                    <option value="3" oninput="this.className = ''">Intenso</option>
                </select><br>
               
            </div>

            <div class="next" style="overflow:auto;">
                <div class="nextoptions" style="float:right;">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Voltar</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Proximo</button>
                </div>
            </div>


            <a href="/">Deixar para mais tarde</a>


        </form>
    </section>
</body>
</html>