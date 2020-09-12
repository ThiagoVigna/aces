
$(document).ajaxStart( Screen.Lock );
$(document).ajaxStop( Screen.UnLock );

LibGamification.init();
LibNight.init();
LibComponent.init();
Screen.init();
LibNotification.init();
LibCRUD.init();

console.log("[Main.js] Scripts carregados.");
