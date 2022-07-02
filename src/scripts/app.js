var apps = {
    getTables : function(){
        let _this = this;
        let data = {
            host : $('input[name="host"]').val(),
            port : $('input[name="port"]').val(),
            username : $('input[name="username"]').val(),
            password : $('input[name="password"]').val(),
            database : $('input[name="database"]').val(),
        }

        $('div#connection').hide();
        $.post('tables.php',data,function(respon){
            $('div#main_container').append(respon);
            
            $('.progress-bar').attr('aria-valuemax',$('table td[data-content="table"]').length);
            if($('table td.queue').length>0) _this.getField($('table td.queue:first'));
        }).fail(function(){

        })
    },
    getField : function(ins){
        let _this = this;
        let data = {
            "table" : $(ins).attr('data-table')
        }

        $.post('fields.php',data,function(respon){
            $(ins).closest('tr').find('ul').html(respon);
            $(ins).removeClass('queue').addClass('done');
            if($('table td.queue').length>0){
                _this.getField($('table td.queue:first'));
                $('.progress-bar').attr('aria-valuenow',$('table td[data-content="table"].done').length);
            } 
            else{
                 // Define max value of progress-bar
                $('.progress-bar').attr('aria-valuemax',$('table ul li').length);
                $('.progress-bar').attr('aria-valuenow',0);
                $('a[data-aksi="startId"]').closest('div').show(400);
            } 

            $('.progress-bar').css("width", ($('.progress-bar').attr('aria-valuenow') / $('.progress-bar').attr('aria-valuemax') * 100)+'%');
        }).fail(function(){

        })
    },
    doCorrection : function(ins){
        let data = {
            table : $(ins).closest('tr').find('td[data-content="table"]').attr('data-table'),
            field : $(ins).attr('data-field'),
            type : $(ins).attr('data-type'),
            isnullable : $(ins).attr('data-isnullable')
        }
        let _this = this;

        $.post('corrector.php',data,function(respon){
           
            if(respon.isOk){
                if(respon.respon == 'done'){
                    $(ins).append('<span class="badge text-bg-success">Success</span>');
                }else if(respon.respon == 'skipped'){
                    $(ins).append('<span class="badge text-bg-warning">Skipped</span>');
                }
                $(ins).removeClass("queue").attr('data-result',respon.respon);
            }else{
                $(ins).append('<span class="badge text-bg-danger">failed</span>');
                $(ins).removeClass("queue").attr('data-result','failed');
            }
            
            $('.progress-bar').attr('aria-valuenow',$('table li.done').length);
            $('.progress-bar').css("width", ($('.progress-bar').attr('aria-valuenow') / $('.progress-bar').attr('aria-valuemax') * 100)+'%');

            $(ins).removeClass("queue").addClass('done');
            if($('table li.queue').length > 0){
                _this.doCorrection($('table ul li.queue:first'));
            }else {
                $('.progress-bar').css("width", '100%');
            }
        },'json').fail(function(){
            $(ins).append('<span class="badge text-bg-danger">failed</span>');
            $(ins).removeClass("queue").attr('data-result','failed');

            $('.progress-bar').attr('aria-valuenow',$('table li.done').length);
            $('.progress-bar').css("width", ($('.progress-bar').attr('aria-valuenow') / $('.progress-bar').attr('aria-valuemax') * 100)+'%');
            $(ins).removeClass("queue").addClass('done');
            if($('table li.queue').length > 0){
                _this.doCorrection($('table ul li.queue:first'));
            }else{
                $('.progress-bar').css("width", '100%');
            }
        })
        
    },
    init : function(){
        var _this = this;
       
    }
}
$(document).ready(function(){
    apps.init();
})
$('a[data-aksi="gettables"]').click(function(){
    apps.getTables();
})
$('body').on('click','a[data-aksi="startId"]', function(){
    $(this).hide();
    $('.progress').show(400);
    apps.doCorrection($('table ul li.queue:first'));
})