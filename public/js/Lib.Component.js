var LibComponent = {

	init: function(){
		LibComponent.LoadComponent();
	},

	LoadComponent: function(componentName){
		var component = 'div[data-component]';
		if( typeof componentName !== 'undefined'){
			component = componentName;
		}

		$(component).each(function(){
			var element = $(this);
			var url = $(this).data('component');

			$.get(url, function (data) {
				element.html(data);
			});
		});

		return false;
	},

	CallReloadAllComponents: function(){
		$(document).on('click', '*[data-reload-components]', function(){
			Component.LoadComponent();
		});
	}
};
