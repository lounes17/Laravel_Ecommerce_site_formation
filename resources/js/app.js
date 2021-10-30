require('select2');
require('bootstrap');
//var tinymce = require("tinymce")
window.$ = window.jQuery = require('jquery');
require('jquery-ui');
import"jquery-ui/ui/widgets/sortable";



jQuery(document).ready(function($){
     var langswitchform=$('#langswitch');
     var langform=$('#language');
     langform.on('change',function(){
        langswitchform.submit();
     });
$('select#country').select2();
$('select#course_category').select2();
var $gotop = $('a.gotop');
$gotop.on('click',function(e){
e.preventDefault();
$("body").animate({scrollTop: 0}, 400);
})
});
$('.addsectionbtn').on(
    'click',function(e){
        $('#section_id').val($(this).data("section"))
    }
)
$( function() {
    $( ".section-sortable" ).sortable({
         stop: function( event, ui ) {
        var section=ui.item.data('section');
        var index=ui.item.index();
        console.log('section ',section);
        console.log('index ',index);
        console.log(ui.sender);
        $.ajax({
            url:"/switch-index-section",
            dataType:'json',
            type:'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                index:index,
                section:section,
            },
            success:function(response){
                console.log(response);

            }
        })
    }
});
} );
$( function() {
    $( ".lesson-sortable" ).sortable({
         stop: function( event, ui ) {
        var lesson=ui.item.data('lesson');
        var section=ui.item.data('section');
        var index=ui.item.index();
        console.log('section lessson',section);
        console.log('index lesson',section);
        console.log(ui.sender);
        $.ajax({
            url:"/switch-index",
            dataType:'json',
            type:'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                lesson:lesson,
                index:index,
                section:section,
            },
            success:function(response){
                console.log(response);

            }
        })
    }
});
} );
$('.lesson-delete-class').on(
    'click',function(e){
        $('#lesson_id').val($(this).data("delete_lesson_id"))
    }
)
$('.deletesectionbtn').on(
    'click',function(e){
        $('#section_delete_id').val($(this).data("section_delete"))
    }
)




