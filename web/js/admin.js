//tab hash
$(function(){
    function updateHashInput(hash)
    {
        $('.hash-input').val(hash.slice(1));
    }

    var hash = window.location.hash;
    hash && $('ul.nav a[href="' + hash + '"]').tab('show');

    updateHashInput(hash);

    $('.nav-tabs a').click(function (e) {
        $(this).tab('show');
        var scrollmem = $('body').scrollTop();
        window.location.hash = this.hash;
        updateHashInput(this.hash);
        $('html,body').scrollTop(scrollmem);
    });

    $('#menu-search').hideseek({
        highlight: true,
        nodata: 'Ничего не найдено'
    });
});
