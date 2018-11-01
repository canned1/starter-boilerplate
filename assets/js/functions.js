var utmsource = '';
var utmmedium = '';
var utmcampaign = '';
var utmterm = '';
var utmcontent = '';

$( document ).ready(function() {
  smoothScroll.init({
      selector: '[data-scroll]', // Selector for links (must be a class, ID, data attribute, or element tag)
      selectorHeader: null, // Selector for fixed headers (must be a valid CSS selector) [optional]
      speed: 800, // Integer. How fast to complete the scroll in milliseconds
      easing: 'easeInOutCubic', // Easing pattern to use
      offset: 0, // Integer. How far to offset the scrolling anchor location in pixels
      callback: function ( anchor, toggle ) {
        
      } 
  });
      
  utmsource = getParameterByName('utm_source');
  utmmedium = getParameterByName('utm_medium');
  utmcampaign = getParameterByName('utm_campaign');
  utmterm = getParameterByName('utm_term');
  utmcontent = getParameterByName('utm_content');

  $(".preloader").fadeOut();

});

function getParameterByName(name) {
  name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
  var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
      results = regex.exec(location.search);
  return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

// Move leafs on scroll
var container = document.getElementById('container');
var windowHeight = window.innerHeight;
var windowWidth = window.innerWidth;
var scrollArea = 1000 - windowHeight;
var square1 = document.getElementsByClassName('cabezote')[0];
var square2 = document.getElementsByClassName('derecho')[0];
var square3 = document.getElementsByClassName('izquierdo')[0];

window.addEventListener('scroll', function() {
  var scrollTop = window.pageYOffset || window.scrollTop;
  var scrollPercent = scrollTop/scrollArea || 0;
  square1.style.top = -1*0.1*scrollPercent*window.innerWidth + 'px';
  square2.style.top = -1*0.05*scrollPercent*window.innerWidth+ windowHeight*1 + 'px';
  square3.style.top = -1*0.05*scrollPercent*window.innerWidth+ windowHeight*1 + 'px';
});

var focos = [
  {
    img : "https://d2axomif2iwq0z.cloudfront.net/img/monetizacion.svg",
    titulo : "Monetización",
    descripcion: "Ejemplos extraordinarios que han monetizado las industrias creativas en Colombia."
  },
  {
    img : "https://d2axomif2iwq0z.cloudfront.net/img/creativos.svg",
    titulo : "Desarrollando negocios creativos de alto potencial",
    descripcion: "Estrategias utilizadas por las compañías más relevantes de la industria creativa para desarrollar propuestas de valor innovadoras y generar negocios sostenibles."
  },
  {
    img : "https://d2axomif2iwq0z.cloudfront.net/img/re.svg",
    titulo : "RE: Reduce, Reusa, Recicla, Resignifica",
    descripcion: "Iniciativas que entienden que los recursos con los que contamos son escasos y encaminan su labor a desarrollar hábitos generales responsables, que resignifiquen reprogramen las mentes."
  },
  {
    img : "https://d2axomif2iwq0z.cloudfront.net/img/entornos.svg",
    titulo : "Entornos creativos",
    descripcion: "Espacios donde se fomenta la creatividad de los talentos extraordinarios basándose en la capacidad de rodearse y potencializarse."
  },
  {
    img : "https://d2axomif2iwq0z.cloudfront.net/img/creatividad.svg",
    titulo : "Creatividad y Cultura en los ODS",
    descripcion: "Soluciones para cumplir exitosamente los ODS desde un enfoque cultural y creativo."
  },
];

$(".foco-item").click(function() {
  $(".foco-item").removeClass("active");
  $(this).addClass("active");
  var position = $(this).data("item");
  document.getElementById("focoimg").src=focos[position].img;
  $("#focotitle").text(focos[position].titulo);
  $("#focodescription").text(focos[position].descripcion);
});

$('#detonanteform').submit(function(evt){
    
    evt.preventDefault();
    
    $('button').prop('disabled', true);
    
    var url = $(this).attr('action');

    if(!$("#email").val() || !$("#firstname").val() || !$("#lastname").val() || !$("#cellphone").val() || $("#cellphone").val().length != 10){
      !$("#email").val()? $("#email").focus():null;
      !$("#firstname").val()? $("#firstname").focus():null;
      !$("#lastname").val()? $("#lastname").focus():null;
      !$("#cellphone").val() || $("#cellphone").val().length != 10? $("#cellphone").focus():null;
      !$("#tos").val()? $("#tos").focus():null;
      $('button').prop('disabled', false);
    } else {

      var formData = {
        "campaignToken":"3d2a8c96b42f95190517397b9bd8e5c5cbbb1145602b3c56930e93c45098c980",
        "campaignKey": "9e82413d169b2efca4ea0fca15be4e5b",
        "email": $("#email").val(),
        "tos": $("#tos").val(),
        "payload":{
          "firstname": $("#firstname").val(),
          "lastname": $("#lastname").val(),
          "cellphone":$("#cellphone").val(),
          "city": $("#city").val(),
          "organizacion": $("#organizacion").val(),
          "areaconocimiento": $("#areaconocimiento").val(),
          "sector": $("#sector").val(),
          "eje": $("#eje").val(),
          "descripcion": $("#descripcion").val(),
          "utm_source":utmsource,
          "utm_medium":utmmedium,
          "utm_campaign":utmcampaign,
          "utm_term":utmterm,
          "utm_content":utmcontent
        }
      }


      $.ajax({
        type: "POST",
        data: JSON.stringify(formData),
        dataType: 'json',
        contentType: 'application/json',
        url: url,
        success: function(response){
          if(!response.error){
            $('#thankyouModal').modal('show');
            $('button').prop('disabled', false);
            $('#detonanteform')[0].reset();
          } else {
            $('button').prop('disabled', false);
          }
        }
      });
    }
    
});



