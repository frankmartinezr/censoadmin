(function($){
  $(function(){
  	//activa menu lateral
    $('.button-collapse').sideNav();
    //activa menu tipo acordion
    $('.collapsible').collapsible();
    //activa select
	$('select').material_select();
	//activa campos de fecha
	$('.datepicker').pickadate({
		selectMonths: true, // Creates a dropdown to control month
		selectYears: 15, // Creates a dropdown of 15 years to control year,
		today: 'Hoy',
		clear: 'Limpiar',
		close: 'Ok',
		closeOnSelect: false, // Close upon selecting a date,
		// The title label to use for the month nav buttons
		labelMonthNext: 'Mes siguiente',
		labelMonthPrev: 'Mes anterior',
		// The title label to use for the dropdown selectors
		labelMonthSelect: 'Selecciona un mes',
		labelYearSelect: 'Selecciona un año',
		// Months and weekdays
		monthsFull: [ 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' ],
		monthsShort: [ 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic' ],
		weekdaysFull: [ 'Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado' ],
		weekdaysShort: [ 'Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab' ],
		weekdaysLetter: [ 'D', 'L', 'M', 'X', 'J', 'V', 'S' ],
		formatSubmit: 'yyyy/mm/dd'
	});
	//activa campos de hora
	$('.timepicker').pickatime({
		default: 'now', // Set default time: 'now', '1:30AM', '16:30'
		fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
		twelvehour: false, // Use AM/PM or 24-hour format
		donetext: 'OK', // text for done-button
		cleartext: 'Limpiar', // text for clear-button
		canceltext: 'Cancelar', // Text for cancel-button
		autoclose: false, // automatic close timepicker
		ampmclickable: false, // make AM PM clickable
		aftershow: function(){} //Function for after opening timepicker
	});
	//activa modales
	$('.modal').modal();
	//activa menus desplegables
	$('.dropdown-button').dropdown({
              inDuration: 300,
              outDuration: 225,
              constrainWidth: false, // Does not change width of dropdown to that of the activator
              hover: false, // Activate on hover
              gutter: 0, // Spacing from edge
              belowOrigin: true, // Displays dropdown below the button
              alignment: 'right', // Displays dropdown with edge aligned to the left of button
              stopPropagation: false // Stops event propagation
            }
    );

  }); // end of document ready
})(jQuery); // end of jQuery name space

$(document).ready(function() {
    setTimeout(function(){$('body').addClass('loaded');}, 100);
});
