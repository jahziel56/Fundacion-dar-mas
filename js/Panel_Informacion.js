function selectedPage(ID){
    var general_detalle = document.getElementById('Registros_general_detalle');
    var totales_detalle = document.getElementById('Registros_totales_detalle');
    var este_año_detalle = document.getElementById('Registros_este_año_detalle');
    var loader = document.getElementById('loader');


    switch(ID){
        case 'Registros_general':
            general_detalle.style.display='flex';
            totales_detalle.style.display='none';
            este_año_detalle.style.display='none';
            break;
        case 'Registros_totales':
            totales_detalle.style.display='flex';
            general_detalle.style.display='none';
            este_año_detalle.style.display='none';
            break;
        case 'Registros_Este_año':
            este_año_detalle.style.display='flex';
            general_detalle.style.display='none';
            totales_detalle.style.display='none';
            break;
    }
}
