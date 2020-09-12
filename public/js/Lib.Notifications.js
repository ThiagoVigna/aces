var LibNotification = {

	init: function(){

		/* Configura o toastr */
		toastr.options = {
			"closeButton": true,
			"debug": false,
			"newestOnTop": false,
			"progressBar": true,
			"positionClass": "toast-bottom-right",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "5000",
			"timeOut": "5000",
			"extendedTimeOut": "2000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut",
			"escapeHtml": true
		}
	},

	notifications: [],

	SetNotification : function(property, message, type){
		toastr[type](message);
	},

}
