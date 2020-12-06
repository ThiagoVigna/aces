
$(document).ajaxStart( Screen.Lock );
$(document).ajaxStop( Screen.UnLock );

LibGamification.init();
LibNight.init();
LibComponent.init();
Screen.init();
ScreenUploadPhoto.init();
LibNotification.init();
LibCRUD.init();
ScreenPost.init();

console.log("[Main.js] Scripts carregados.");
