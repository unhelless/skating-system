//ожидание отправки
$(document).ready(function () {
function funcBefore() {
    $("#alert_error").text ('Ожидание... Подождите'); 
};
//успешная отправка
function funcSuccess (){
    $("#alert_success").text ('Успешно'); 
};
  $('[data-toggle="offcanvas"]').click(function () {
    $('.row-offcanvas').toggleClass('active')
  });
    $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 

  var recipient = button.data('whatever')
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
    if($("#alert_error").is(":empty")){
        $("#alert_error").hide();
    };    
    if($("#alert_success").is(":empty")){
        $("#alert_success").hide();
    };
    
    //3 переменные для рандома
    var num_1 = '';
    var num_2 = '';
    var num_3 = '';
    var arr_num = ['Q','W','E','R','T','Y','U','I','O','P','A','S','D','F','G','H','J','K','L','Z','X','C','V','B','N','M','0','1','2','3','4','5','6','7','8','9'];
    $("#coll").bind("click",function(){
        var rand1 = Math.floor(Math.random() * arr_num.length);
        num_1 = arr_num[rand1];
        var rand2 = Math.floor(Math.random() * arr_num.length);
        num_2 = arr_num[rand2];
        var rand3 = Math.floor(Math.random() * arr_num.length);
        num_3 = arr_num[rand3];
        $("#id_participant").val(num_1+num_2+num_3);
        console.log(num_1+num_2+num_3);
    });
    //Регистрация участников
    $("#reg_sub").bind("click", function(){
        var id_part = $("#id_participant").val();
        var name = $("#name_part").val();
        var age = $("#age").val();
        var main_class = $("#main_class").val();
        var other_class = $("#other_class").val();
        $.ajax({
            url: "/?add",
            type: "POST",
            data: ({
                id_part:id_part,
                name_part:name,
                age:age,
                main_cl:main_class,
                other:other_class,
            }),
            dataType: "json",
            beforeSend: funcBefore,
            success: function(result){
                if (result){ 
					$('#part_view tr').remove();
                    $('.table').append(function(){
						var res = '';
						for(var i = 0; i < result.parts.id_part.length; i++){
							res += '<tr><td>' + result.parts.id[i] + '</td><td>' + result.parts.id_part[i] + '</td><td>' + result.parts.name_part[i] + '</td><td>' + result.parts.age[i] + '</td><td>' + result.parts.cat[i] + '</td> <td>' + result.parts.main_cl[i] + '</td><td>' + result.parts.other[i] + '</td><td><a href="/?editpart/'+result.parts.id[i]+'"><i class="glyphicon glyphicon-pencil"  data-toggle="modal" data-target="#myModal"></i></a><a href="/?delpart/'+result.parts.id[i]+'" style="padding:15px;"><i class="glyphicon glyphicon-remove"></i></a></td></tr>';
						}
							return res;
					});
                }else{
                    alert(result.message);
                }
				return false;
            }
    });
        //рандом id_part
        var rand1 = Math.floor(Math.random() * arr_num.length);
        num_1 = arr_num[rand1];
        var rand2 = Math.floor(Math.random() * arr_num.length);
        num_2 = arr_num[rand2];
        var rand3 = Math.floor(Math.random() * arr_num.length);
        num_3 = arr_num[rand3];
        $('#name_part').val();
        $('#age').val();
        $('#main_class').val();
        $('#other_class').val();
    });
    
    //сортировка перед регистрацией групп
    //frontend регистрации групп.
    $('#sortgr').bind("click", function(){
        var mcls = $("#main_clss").val();
        var othcls = $("#other_cls").val();
        var cat = $('#cat').val();
        var clss_m = 'HbT';
        var cats = '';
        var clsoth = '';
        if (cat == 'Бэби-1') cats = 'Baby-1';
        if (cat == 'Бэби-2') cats = 'Baby-2';
        if (cat == 'Дети-1') cats = 'Kids-1';
        if (cat == 'Дети-2') cats = 'Kids-2';
        if (cat == 'Юниоры-1') cats = 'Junior-1';
        if (cat == 'Юниоры-2') cats = 'Junior-2';
        if (cat == 'Молодежь') cats = 'Youth';
        if (cat == 'Взрослая-1') cats = 'Grownup-1';
        if (cat == 'Взрослая-2') cats = 'Grownup-2';
        if (cat == 'Взрослая-3') cats = 'Grownup-3';
        if (cat == 'Синьоры') cats = 'Signor';
        if (othcls == 'ОК') clsoth = 'Open';
        if (othcls == 'ЗК') clsoth = 'Close';
        if (mcls == 'ШбТ'){
        $("#name_group").val('Class_'+clss_m+'_'+'Cat_'+cats+'_'+'Othcls_'+clsoth);
            }else{
        $("#name_group").val('Class_'+mcls+'_'+'Cat_'+cats+'_'+'Othcls_'+clsoth);}
        $.ajax({
            url:'?sortgroup', 
            type:'POST',
            data:({main_clss:mcls ,
                cat:cat ,
                other_cls:othcls }), 
            dataType: 'json',
            success:
            function(result){
                if (result){ 
					$('#part_view tr').remove();
                    $('.table').append(function(){
						var res = '';
						for(var i = 0; i < result.group.id_part.length; i++){
							res += '<tr><td>' + result.group.id[i] + '</td><td>' + result.group.id_part[i] + '</td><td>' + result.group.name_part[i] + '</td><td>' + result.group.age[i] + '</td><td>' + result.group.cat[i] + '</td><td>' + result.group.main_cl[i] + '</td><td>' + result.group.other[i] + '</td></tr>';
						}
							return res;
					});
                }else{
                    alert(result.message);
                }
				return false;
            }
        });
    });
    
    //регистрация списка групп
    $('#reggroup').bind('click', function(){
        var namegroup = $('#name_group').val();
        var mcls = $("#main_clss").val();
        var othcls = $("#other_cls").val();
        var cat = $('#cat').val();
        $.ajax({
            url:'?reggroup',
            type: 'post',
            data: ({namegroup:namegroup,
                   mcls:mcls,
                   othcls:othcls,
                   cat:cat}),
            dataType: 'html',
            success: function(data){
                console.log('true');
            }
        });
    });
    
    //selected  tabpanel active
    $('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
    });

    //регистрация судий
    $("#reg_jud").bind("click",function(){
        var name = $("#name").val();
        var pass = $("#pass").val();
        var num = $("#num").val();
        $.ajax({
            url:'?regjud',
            type: 'post',
            data: ({
                name:name,
                pass:pass,
                number:num
            }),
            dataType: 'json',
            success: function(result){
                if(result){
                $("#part_view tr").remove();
                $(".table").append(function(){
                    var res = '';
                    for (var i = 1; i < result.jud.id.length; i++){
							res += '<tr><td>' + result.jud.id[i] + '</td><td>' + result.jud.name[i] + '</td><td>' + result.jud.pass[i] + '</td><td>' + result.jud.number[i] + '</td><td><a href="/?deljud/<?=$value['+result.jud.id[i]+']?>" style="padding:15px; text-decoration: none;"><i class="glyphicon glyphicon-remove"></i></a></td></tr>';
                    }
                    return res;
                });}else{
                    alert(result.message);
                }
                return false;
            }
        });
    });
    
    //1/8 финала, ставим оценки
    $(".ressel").bind('click', function(){
        var ids = $(this).find('.id_quar').val();
        var id_group = $(this).find('.id_group').text();
        var dance = $(".active").val();
        $.ajax({
            url: '?selresult/'+ids+'/'+id_group+'/'+dance,
            type: 'POST',
            data: ({ids:ids,
                id_group:id_group,
                dance:dance
            }),
            success: function(data){
                console.log(ids+id_group+dance);
            }
        });
    });    
    //1/4 финала, ставим оценки
    $(".resquar").bind('click', function(){
        var ids = $(this).find('.id_quar').val();
        var id_group = $(this).find('.id_group').text();
        var dance = $(".active").val();
        $.ajax({
            url: '?quaterresult/'+ids+'/'+id_group+'/'+dance,
            type: 'POST',
            data: ({ids:ids,
                id_group:id_group,
                dance:dance
            }),
            success: function(data){
                console.log(ids+id_group+dance);
            }
        });
    });    
    //1/2 финала, ставим оценки
    $(".ressem").bind('click', function(){
        var ids = $(this).find('.id_quar').val();
        var id_group = $(this).find('.id_group').text();
        var dance = $(".active").val();
        $.ajax({
            url: '?semiresult/'+ids+'/'+id_group+'/'+dance,
            type: 'POST',
            data: ({ids:ids,
                id_group:id_group,
                dance:dance
            }),
            success: function(data){
                console.log(ids+id_group+dance);
            }
        });
    });    
    //ФИНАЛ СУДЕЙСКИЙ
    var final = '';
    $(".resfinal > .resultfin").bind('click', function(){
        id_final = $(this).val();
        final = $(this).text();
        dance = $('.active').val();
      
        $.ajax({
            url: '?finalresult',
            type: 'POST',
            data: ({id:id_final,
                result:final,
                dance:dance
            }),
            success: function(data){
                console.log(id_final+final+dance);
            }
        });
    });
    
    $(".d1r1").bind('click',function(){
        $(".d1r1").hide();
    });
    $(".d1r2").bind('click',function(){
        $(".d1r2").hide();
    });
    $(".d1r3").bind('click',function(){
        $(".d1r3").hide();
    });
    $(".d1r4").bind('click',function(){
        $(".d1r4").hide();
    });
    $(".d1r5").bind('click',function(){
        $(".d1r5").hide();
    });
    $(".d1r6").bind('click',function(){
        $(".d1r6").hide();
    });
    $('.dance').bind('click',function(){
        var i = $(this).val();
    $(".d"+i+"r1").bind('click',function(){
        $(".d"+i+"r1").hide();
    });
    $(".d"+i+"r2").bind('click',function(){
        $(".d"+i+"r2").hide();
    });
    $(".d"+i+"r3").bind('click',function(){
        $(".d"+i+"r3").hide();
    });
    $(".d"+i+"r4").bind('click',function(){
        $(".d"+i+"r4").hide();
    });
    $(".d"+i+"r5").bind('click',function(){
        $(".d"+i+"r5").hide();
    });
    $(".d"+i+"r6").bind('click',function(){
        $(".d"+i+"r6").hide();
    });

    });
    $('.num').bind('click',function(){
    $(this).attr('class','success');    
    });
    $('.resfinal').bind('click',function(){
        $(this).text(final);
    });
    }); 