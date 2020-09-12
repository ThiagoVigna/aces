var LibCRUD = {

	init: function(){
		LibCRUD.Save();
		LibCRUD.Delete();
	},

	Save: function(){
		$(document).on('click', '*[data-action="dynamic-form"]', function () {
			var formId		= $(this).data('form');
			var serialized	= $(formId).serialize();
			var formAct		= $(formId).attr('action');
			var reload	    = $(formId).data('reload');

			$.ajax({
				url: formAct,
				data:serialized,
				method: "POST"
			})
				.done(function(result) {

					if(result.code == '200 OK'){
						toastr['success'](result.message);
					} else {
						toastr['error']('Desculpe. Houve um erro inexperado ao tentar executar a ação desejada.');
					};

					// Recarrega todos os componentes dinâmicos da página.
					LibComponent.LoadComponent();

					if(reload === true && result.goUrl != null)
						window.location.href = result.goUrl;
					if(reload === true){
						setTimeout(function () {
							window.location.reload();
						}, 3000);
					}

					// oculta o modal (independente se for modal ou não)
					$('#defaultModal').modal('hide');

				})
				.fail(function(result){
					var messages = result.responseJSON.result;

					messages.forEach(function (item, index) {
						toastr['error'](item.message);
					});

				});
		});
	},

	Delete: function(){
		$(document).on('click', '*[data-action="delete"]', function(){
			var destiny = $(this).val();
			var reload	= $(this).data('reload');

			Swal.fire({
				title: "Você tem certeza?",
				text: "Esta ação irá apagar o registro informado.",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: '#DD6B55',
				confirmButtonText: 'Continuar',
				cancelButtonText: "Cancelar"
			}).then(function(isConfirm) {
				if(isConfirm.value == true){
					$.getJSON(destiny, function(result){
						if(result.code == '200 OK'){
							Swal.fire("Parabéns!", result.message, 'success' );
						} else {
							Swal.fire("Erro!", result.message, 'warning');
						};

						// oculta o modal (independente se for modal ou não)
						$('#defaultModal').modal('hide');

						// Recarrega todos os componentes (se houver)
						Component.LoadComponent();

						if(reload === true) {
							setTimeout(function () {
								window.location.reload();
							}, 3000);
						}
					});
				};
			});
		});
	},
}
