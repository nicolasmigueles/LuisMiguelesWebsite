<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="css/sty-sec.css"/>
    <link rel="stylesheet" href="css/sty.css"/>
    <title>Luis Migueles</title>
    <style>
      body{
      	background-attachment: fixed;
      }
      .container{
      	justify-content: center!important;
      }
    </style>
  </head>
  <body>
    <header><a href="?view=index">
        <h1>Luis Migueles</h1></a></header>
    <main class="full">
      <div class="container cnt-hide">
        <div class="container-header"><a href="?view=index" id="ctavolver">
            <div class="volver"><img src="img/previous.png" alt=""/></div></a>
          <div class="svg">
            <svg width="125" height="67" xmlns="http://www.w3.org/2000/svg">
             <!-- Created with Method Draw - http://github.com/duopixel/Method-Draw/ -->
             <g>
              <g id="svg_8">
               <text xml:space="preserve" text-anchor="start" font-family="Arimo" font-size="24" id="svg_1" y="18.830506" x="17.867188" stroke-width="0" stroke="#000" fill="#ffffff">TALLER</text>
               <text xml:space="preserve" text-anchor="start" font-family="Arimo" font-size="13" id="svg_2" y="36.6875" x="54.031251" stroke-width="0" stroke="#000" fill="#ffffff">DE</text>
               <text xml:space="preserve" text-anchor="start" font-family="Arimo" font-size="26" id="svg_3" y="62.369271" x="5.273438" stroke-width="0" stroke="#000" fill="#ffffff">TÉCNICA</text>
               <line stroke-linecap="undefined" stroke-linejoin="undefined" id="svg_5" y2="31.18751" x2="44.919071" y1="31.18751" x1="5.906252" stroke-width="2" stroke="#06e764" fill="none"/>
               <line stroke-linecap="undefined" stroke-linejoin="undefined" id="svg_6" y2="31.18751" x2="119.419095" y1="31.18751" x1="80.406276" stroke-width="2" stroke="#06e764" fill="none"/>
              </g>
             </g>
            </svg>
          </div>
        </div>
      </div>
      <div class="cta-ins cnt-hide ins-hide">
        <button id="cta-ins">INSCRIBITE</button>
      </div>
      <div class="container-white cnt-hide ins-hide">
        <div class="contenido">
          <h1>Taller de Técnica de la Carrera</h1>
          <div class="col">
            <div class="titulo">Temas a Tratar</div>
            <ul class="temas ul">
              <li>• Fundamentos de la técnica de carrera. </li>
              <li>• Aspectos básicos de la biomecánica. </li>
              <li>• Prevenir lesiones. </li>
              <li>• Ejercicios específicos para corredores y recomendaciones. </li>
            </ul>
          </div>
          <div class="col">
            <ul class="informacion ul">
              <div class="titulo">Información</div>
              <li>Día: 22 de Febrero</li>
              <li>Lugar: Navarro 5130</li>
              <li>Costo: $ 300</li>
              <div class="spancenter"><span>Se abona en el lugar, el día del evento.<br>Cupos limitados, al final del taller se hace entrega de un diploma de participación</span></div>
            </ul>
          </div>
        </div>
      </div>
      <div id="ins_form">
        <form action="?view=taller&mode=inscribir" id="formins" method="post" enctype="multipart/form-data">
        <input name="name" id="form-name" class="ins" type="text" placeholder="Nombre...">
        <input name="ape" id="form-apellido" class="ins" type="text" placeholder="Apellido...">
        <input name="email" id="form-email" class="ins" type="e-mail" placeholder="E-Mail...">
        <input name="tel" id="form-tel" class="ins" type="text" placeholder="Celular...">
        <input name="fecha" id="form-fecha" class="ins disabled" type="text" value="22 de enero" disabled>
        <div class="cta-ins-form">Inscribirme</div>
        </form>
      </div>
      <div class="reform" id="cnt_form">
        <div id="close"></div>
        <input type="text" name="nombre" placeholder="Nombre"/>
        <input type="email" name="email" placeholder="Correo electrónico"/>
        <textarea name="text" cols="30" rows="10" placeholder="Mensaje"></textarea>
        <button id="submit">Enviar</button>
      </div>
    </main>
    <footer class="footer-taller">
      <p>Copyright &copy; 2017 Nicolas Migueles</p>
      <div class="right">
        <div class="contacto">Contacto</div>
        <div class="social"> <a href="http://instagram.com/luismigueles800" target="_blank"><img src="img/instagram.svg" rel="nofollow"/></a><a href="https://twitter.com/luismigueles" target="_blank"><img src="img/twitter.svg" rel="nofollow"/></a></div>
      </div>
    </footer>
    <script src="js/res/jquery-3.1.1.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/ins.js"></script>
  </body>
</html>
