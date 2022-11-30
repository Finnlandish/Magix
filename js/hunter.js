$("#foo").mousemove(function(event) {
    $("#bee1").stop().animate({left: event.pageX, top: event.pageY}, 5000)
});

