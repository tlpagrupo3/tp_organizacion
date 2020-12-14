
    function nombre() {
        let lista = document.cookie.split(";");
        for (i in lista) {
            let busca = lista[i].search('PHPSESSID');
            if (busca > -1) {micookie=lista[i]}
            }
        let igual = micookie.indexOf("=");
        let valor = micookie.substring(igual+1);
        return valor;
        }
    let session=nombre()
    toString(session)

    let datos= new FormData()
    datos.append('session',session)
    fetch('http://localhost/sadop/src/public/php/consultas/consulta_session.php',{
        method: 'POST',
        body: datos
    })
    .then(res=>res.json())
    .then(session=>{
        let sidebar=`<ul class="nav nav-list">`
        if (session.id_tipo_genero==undefined) {
            window.location.assign('http://localhost/sadop/')
        }
        document.getElementById('usuario').innerHTML=session.nombre + ' '+ session.apellido+`<p id='usuarioActual' hidden>${session.id_usuarios}</p>`
        if(session.codigo_acceso==='WK90e'||session.codigo_acceso===('D53KP')||session.codigo_acceso===('53C91')){
            sidebar+=`<li class="">
            <a href="http://localhost/sadop/src/public/modulos/miembros/">
                <i class="ace-icon fa fa-users"></i>
                <span class="menu-text">Administrar Miembros</span>
            </a>

            <b class="arrow"></b>
        </li>`      
        }
        if (session.codigo_acceso==='NH5T1'||session.codigo_acceso===('D53KP')||session.codigo_acceso===('53C91')) {
            sidebar+=`<li class="">
            <a href="http://localhost/sadop/src/public/modulos/usuarios/">
                <i class="ace-icon glyphicon glyphicon-user"></i>
                <span class="menu-text">Administrar Usuarios</span>
            </a>

            <b class="arrow"></b>
        </li>`
        }
        sidebar+=`<li class="">
        <a href="http://localhost/sadop/src/public/modulos/calendario/">
            <i class="ace-icon fa fa-calendar"></i>
            <span class="menu-text">Agenda<span class="badge badge-transparent tooltip-error" title="2 Important Events"></span></span>
        </a>
        <b class="arrow"></b>
    </li>`
        sidebar+=`<li class="">
        <a href="http://localhost:3000">
            <i class="ace-icon fa fa-envelope"></i>
            <span class="menu-text">Chat</span>
        </a>

        <b class="arrow"></b>
    </li>`
        if (session.codigo_acceso===('RDO1')||session.codigo_acceso===('D53KP')||session.codigo_acceso===('53C91')) {
            sidebar+=`<li class="">
            <a href="http://localhost/sadop/src/public/modulos/actividades//" class="">
            <i class="ace-icon glyphicon glyphicon-book"></i>
                <span class="menu-text">Generar de Actividades</span>
            </a>
        </li>`
        }
        if (session.codigo_acceso==='76YP0'||session.codigo_acceso===('D53KP')||session.codigo_acceso===('53C91')) {
            sidebar+=`<li class="">
            <a href="http://localhost/sadop/src/public/modulos/noticias/">
                <i class="ace-icon glyphicon glyphicon-align-center"></i>
                <span class="menu-text">Generador de Noticias</span>
            </a>

            <b class="arrow"></b>
        </li>`
        }
        if (session.codigo_acceso==='WK90e'||session.codigo_acceso===('D53KP')||session.codigo_acceso===('53C91')) {
            sidebar+=`<li class="">
            <a href="http://localhost/sadop/src/public/modulos/gestion_documental/">
                <i class="ace-icon fa fa-folder-open"></i>
                <span class="menu-text">Gestión Documental</span>
            </a>

            <b class="arrow"></b>
        </li>`
        }
        if (session.codigo_acceso===('D53KP')||session.codigo_acceso===('53C91')) {
            sidebar+=`<li class="">
            <a href="http://localhost/sadop/src/public/modulos/notificaciones/">
                <i class="ace-icon fa fa-bell-o"></i>
                <span class="menu-text">Notificaciones</span>
            </a>

            <b class="arrow"></b>
        </li>`
        }
        sidebar+=`</ul>`
        document.querySelector('#barraLateral').innerHTML=sidebar
        
        let datos= new FormData()
        datos.append('accion', 'cargar')
        fetch('http://localhost/sadop/src/public/php/agregarHistorialChat.php',{
            method: 'POST',
            body: datos
        })
        .then(res=>res.json())
        .then(mensajes=>{
            let listaMensajes=''
            mensajes.forEach(mensaje => {
                listaMensajes+=
                `<div class="chat-bubble chat-bubble--right">
				    <li>${mensaje.mensaje}</li>
			    </div>
                `
            });
            document.querySelector('#messages').innerHTML= listaMensajes
        })
    
    })

document.querySelector('form').addEventListener('submit',(e)=>{
    e.preventDefault();
    let usuario= document.querySelector('#usuarioActual').innerText
    let mensaje= document.querySelector('#m').value
    let datos= new FormData(e.target)
    datos.append('id_usuarios',usuario)
    datos.append('mensaje',mensaje)
    datos.append('accion','agregar')
    fetch('http://localhost/sadop/src/public/php/agregarHistorialChat.php',{
        method: 'POST',
        body: datos
    })
    .then(res=>res.json())
    .then(respuesta=>{
        // alert(respuesta)
    })
})




// // <!-- inline scripts related to this page -->

//     jQuery(function($) {
//         $('.easy-pie-chart.percentage').each(function(){
//             var $box = $(this).closest('.infobox');
//             var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
//             var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
//             var size = parseInt($(this).data('size')) || 50;
//             $(this).easyPieChart({
//                 barColor: barColor,
//                 trackColor: trackColor,
//                 scaleColor: false,
//                 lineCap: 'butt',
//                 lineWidth: parseInt(size/10),
//                 animate: ace.vars['old_ie'] ? false : 1000,
//                 size: size
//             });
//         })
    
//         $('.sparkline').each(function(){
//             var $box = $(this).closest('.infobox');
//             var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
//             $(this).sparkline('html',
//                              {
//                                 tagValuesAttribute:'data-values',
//                                 type: 'bar',
//                                 barColor: barColor ,
//                                 chartRangeMin:$(this).data('min') || 0
//                              });
//         });
    
    
//       //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
//       //but sometimes it brings up errors with normal resize event handlers
//       $.resize.throttleWindow = false;
    
//       var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
//       var data = [
//         { label: "social networks",  data: 38.7, color: "#68BC31"},
//         { label: "search engines",  data: 24.5, color: "#2091CF"},
//         { label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
//         { label: "direct traffic",  data: 18.6, color: "#DA5430"},
//         { label: "other",  data: 10, color: "#FEE074"}
//       ]
//       function drawPieChart(placeholder, data, position) {
//            $.plot(placeholder, data, {
//             series: {
//                 pie: {
//                     show: true,
//                     tilt:0.8,
//                     highlight: {
//                         opacity: 0.25
//                     },
//                     stroke: {
//                         color: '#fff',
//                         width: 2
//                     },
//                     startAngle: 2
//                 }
//             },
//             legend: {
//                 show: true,
//                 position: position || "ne", 
//                 labelBoxBorderColor: null,
//                 margin:[-30,15]
//             }
//             ,
//             grid: {
//                 hoverable: true,
//                 clickable: true
//             }
//          })
//      }
//      drawPieChart(placeholder, data);
    
//      /**
//      we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
//      so that's not needed actually.
//      */
//      placeholder.data('chart', data);
//      placeholder.data('draw', drawPieChart);
    
    
//       //pie chart tooltip example
//       var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
//       var previousPoint = null;
    
//       placeholder.on('plothover', function (event, pos, item) {
//         if(item) {
//             if (previousPoint != item.seriesIndex) {
//                 previousPoint = item.seriesIndex;
//                 var tip = item.series['label'] + " : " + item.series['percent']+'%';
//                 $tooltip.show().children(0).text(tip);
//             }
//             $tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
//         } else {
//             $tooltip.hide();
//             previousPoint = null;
//         }
        
//      });
    
//         /////////////////////////////////////
//         $(document).one('ajaxloadstart.page', function(e) {
//             $tooltip.remove();
//         });
    
    
    
    
//         var d1 = [];
//         for (var i = 0; i < Math.PI * 2; i += 0.5) {
//             d1.push([i, Math.sin(i)]);
//         }
    
//         var d2 = [];
//         for (var i = 0; i < Math.PI * 2; i += 0.5) {
//             d2.push([i, Math.cos(i)]);
//         }
    
//         var d3 = [];
//         for (var i = 0; i < Math.PI * 2; i += 0.2) {
//             d3.push([i, Math.tan(i)]);
//         }
        
    
//         var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
//         $.plot("#sales-charts", [
//             { label: "Domains", data: d1 },
//             { label: "Hosting", data: d2 },
//             { label: "Services", data: d3 }
//         ], {
//             hoverable: true,
//             shadowSize: 0,
//             series: {
//                 lines: { show: true },
//                 points: { show: true }
//             },
//             xaxis: {
//                 tickLength: 0
//             },
//             yaxis: {
//                 ticks: 10,
//                 min: -2,
//                 max: 2,
//                 tickDecimals: 3
//             },
//             grid: {
//                 backgroundColor: { colors: [ "#fff", "#fff" ] },
//                 borderWidth: 1,
//                 borderColor:'#555'
//             }
//         });
    
    
//         $('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
//         function tooltip_placement(context, source) {
//             var $source = $(source);
//             var $parent = $source.closest('.tab-content')
//             var off1 = $parent.offset();
//             var w1 = $parent.width();
    
//             var off2 = $source.offset();
//             //var w2 = $source.width();
    
//             if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
//             return 'left';
//         }
    
    
//         $('.dialogs,.comments').ace_scroll({
//             size: 300
//         });
        
        
//         //Android's default browser somehow is confused when tapping on label which will lead to dragging the task
//         //so disable dragging when clicking on label
//         var agent = navigator.userAgent.toLowerCase();
//         if(ace.vars['touch'] && ace.vars['android']) {
//           $('#tasks').on('touchstart', function(e){
//             var li = $(e.target).closest('#tasks li');
//             if(li.length == 0)return;
//             var label = li.find('label.inline').get(0);
//             if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
//           });
//         }
    
//         $('#tasks').sortable({
//             opacity:0.8,
//             revert:true,
//             forceHelperSize:true,
//             placeholder: 'draggable-placeholder',
//             forcePlaceholderSize:true,
//             tolerance:'pointer',
//             stop: function( event, ui ) {
//                 //just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
//                 $(ui.item).css('z-index', 'auto');
//             }
//             }
//         );
//         $('#tasks').disableSelection();
//         $('#tasks input:checkbox').removeAttr('checked').on('click', function(){
//             if(this.checked) $(this).closest('li').addClass('selected');
//             else $(this).closest('li').removeClass('selected');
//         });
    
    
//         //show the dropdowns on top or bottom depending on window height and menu position
//         $('#task-tab .dropdown-hover').on('mouseenter', function(e) {
//             var offset = $(this).offset();
    
//             var $w = $(window)
//             if (offset.top > $w.scrollTop() + $w.innerHeight() - 100) 
//                 $(this).addClass('dropup');
//             else $(this).removeClass('dropup');
//         });
    
//     })



//     if('ontouchstart' in document.documentElement) document.write("<script src='../../css/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");




//     $(function () {
//       var socket = io();
//       $('form').submit(function(e) {
//         e.preventDefault(); // prevents page reloading
//         socket.emit('chat message', $('#m').val());
//         $('#m').val('');
//         return false;
//       });
//     });

//       $(function () {
//         var socket = io();
//         $('form').submit(function(e){
//           e.preventDefault(); // prevents page reloading
//           socket.emit('chat message', $('#m').val());
//           $('#m').val('');
//           return false;
//         });
//         socket.on('chat message', function(msg){
//           $('#messages').append($('<li>').text(msg));
//         });
//       });

      
      