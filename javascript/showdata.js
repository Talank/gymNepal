$(document).ready(function(){
    $("button").click(function(){
        var id=$(this).parent('.s1').attr('value');
        $.post("../info.php",
        {
          id:id
        },
        function(data){
            $('#id01').html(data);
        });
    });
});