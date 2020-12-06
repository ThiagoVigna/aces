var ScreenPost = {
    init: () => {
        ScreenPost.setLikeOrDislike();
    },

    setLikeOrDislike: () => {
        $(document).on('click', '.set-like', function () {
            var url = $(this).val();
            var likeId = 'likeId' + $(this).data('likeId');


            /*
            TODO: pesquisar o porque de não contabilizar automaticamente. Provavelmente porque o conteúdo está sendo carregado
            automaticamente via AJAX. Ver se é possível fazer por "on".
             */

            $.getJSON(url, function (result) {
                $(likeId).html(result.TotalLikes);
                location.reload();
            });

        });

    },

}