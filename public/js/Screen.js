var Screen = {
	init: function (){
		Screen.ClearLog();
		Screen.Modal();
	},

	ClearLog: function () {
		console.log('[Screen.js] O console será limpo após 2 segundos');
		setTimeout(function(){
			console.clear();
		}, 2000)
	},

	Lock: function(message){
		$('#ScreenLock').fadeIn('slow');
		if(typeof message !== "undefined"){
			$('#ScreenLockMessage').html(message);
		}
	},

	UnLock: function(){
		$('#ScreenLock').fadeOut('slow');
	},

	Modal: function () {
		$(document).on('click', '*[data-action="open-dynamic-modal"]', function () {
			var modalContent = null;
			var size = $(this).data('size');

			if(typeof size !== 'undefined'){
				$('#defaultModal > .modal-dialog').css({
					'width': size
				});
			}else{

			}

			// verifica se é um botão ou link
			if($(this).is('button')){
				modalContent = $(this).val();
			}else{
				modalContent = $(this).attr('href');
			};

			// carrega o conteúdo e exibe o modal
			$('#defaultModalContent').load(modalContent, function () {
				//Interface.MaskForms();
				//Interface.EnableSelectTwo();
				$('#defaultModal').modal('show');
			});

			return;
		}).trigger('mask-it');
	},
};
