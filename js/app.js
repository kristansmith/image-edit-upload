$(function () {
    
    "use strict";
    
    var mouseDown_left, mouseDown_top, dragInProgress = true;
    
    $("#uploaded_image").mousedown(function (evt) {
        dragInProgress = true;
        $("#drag_box").remove();
        $("<div>").appendTo("body").attr("id", "drag_box").css({left: evt.clientX, top: evt.clientY});
        
        // creating global vars so they can be accessed later
        mouseDown_left = evt.clientX;
        mouseDown_top = evt.clientY;
        
        // FF and IE will think you are trying to drag an img to desktop, so ..
        return false;
    });
    
    $(window).mouseup(function () {
        dragInProgress = false;
    });
    
    $("#uploaded_image").mousemove(function (evt) {

        var newLeft, newWidth, newTop, newHeight;
        
        if (!dragInProgress) {
            return;
        }
        
        newLeft = mouseDown_left < evt.clientX ? mouseDown_left : evt.clientX;
        newWidth = Math.abs(mouseDown_left - evt.clientX);
        newTop = mouseDown_top < evt.clientY ? mouseDown_top : evt.clientY;
        newHeight = Math.abs(mouseDown_top - evt.clientY);
        
        $("#drag_box").css({left: newLeft, top: newTop, width: newWidth, height: newHeight});
        
        // FF and IE will think you are trying to drag an img to desktop, so ..
        return false;
    });
    
    $("#uploaded_image").mousedown(function (evt) {
        dragInProgress = true;
    });
});