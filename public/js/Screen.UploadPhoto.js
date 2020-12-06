var ScreenUploadPhoto = {
    init: function (){
        ScreenUploadPhoto.ListenChangePhoto();
    },

    ListenChangePhoto: function(){
        $('.photoUpload').change(function(){
            var form = $(this).data('form');
            $('#' + form).submit();
        });
    }
}