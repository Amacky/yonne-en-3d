 
document.addEventListener('DOMContentLoaded', function(){


    var error = false;
    var name = $(this).data('name');
    var adminpath = $('.recup').data('path');
    var time = 5e3;
    
        var remove = function(){
            $('body').find('.sn').remove();
        }
    
    
    
    
    $('.admin-editor').click(function(e){
            
            e.preventDefault();
            $('body').find('#markupbefore').before(`<div id="view"></div>`);
         
            var userId = $(this).data('id');
            var link = $(this).data('link');
            var level = $(this).data('level');
            var status = $(this).data('state');
            var newStatus = $('#status' + userId).val();
            var newLevel = $('#level' + userId).val();
            var name = $(this).data('nameuser');
            
            $.ajax({
                url : link,
                data: {
                    status : newStatus,
                    level : newLevel
                },
                dataType : 'json',
                type: 'POST',
                success : function(){
                   
                    if (level == newLevel && status == newStatus){

                        $('body').find('#view').append(`<div class="alert alert-warning sn" role="alert">
                            Aucune modification n'a été apporté.</div>`  
                        );
                        setTimeout(remove,time);
    
                    }else{
                        
                        var active="Désactivé";
                        var lvl="Membre";
                        if (newStatus==1){
                            active = "Activé";
                        }
                        if (newLevel==1){
                            lvl = "Administrateur";
                        }
                        
    
    
    
    
                       
    
                        if (level != newLevel){
    
                            $('body').find('#view').append(`
                            <div class="alert alert-success sc " role="alert">
                                `+ name +` est désormais `+ lvl +`
                            </div>
                             `);
                            setTimeout(remove,time);
                        }
    
                        if (status != newStatus){
    
                            let state = "désactivé";
                            if(status==1){
                                state = "activé";
                            }
        
                            $('body').find('#view').append(`
                            <div class="alert alert-success sc " role="alert">
                                Le compte de  `+ name +` a été `+ active +`
                            </div>
                             `);
                            setTimeout(remove,time);
                        }
                        
                        $('#exampleModal' + userId ).modal('toggle');
    
                    }
                    
                    
                    
                  
                },
                error : function(){
                    alert( xhr.status ) ;
                },
                beforeSend : function(){
                 setOverlay();
                 },
                complete : function(){
                    removeOverlay();
                }
            });
    
    
        });
    
    });