$(document).ready(function () {
           $('#formEmail').blur(function(event){
            var email = $('#formEmail').val(); 
            event.preventDefault();// using this page stop being refreshing
          $.ajax({
            type: 'GET',
            url: 'index.php?controller=usuarios&action=detalle&email='+email,
            //data: $('form').serialize(),
            success: function (data) {
                 console.log("devuleve "+data);
              
                if(data==0) {
                
                   $("#formEmail").css("background-color", "#F78181");
                }else{
                   
                    $("#formEmail").css("background-color", "#A9F5BC");
                }
              
            }
         
            
          });
      });
        $('#email').blur(function(){
          
            var ema=$('#email').val(); 

      
                var respuesta= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(ema); 
                
                if(!respuesta){
                    
                   alert('formato de email incorrecto') ;
                }
         
          });
  
  /**
   * hacer una funcion que oculte divs etc si esta o no logeado---pendiente
   * @returns {undefined}
   */
  function estiloLogin(){
       $.ajax({
            type: 'GET',
            url: 'index.php?controller=usuarios&action=detalle&email='+email,
            //data: $('form').serialize(),
            success: function (data) {
                 console.log("devuleve "+data);
              
                if(data==0) {
                
                   $("#formEmail").css("background-color", "#F78181");
                }else{
                   
                    $("#formEmail").css("background-color", "#A9F5BC");
                }
              
            }
         
            
          });
      
      
  };


    
    
    
    
    
    
    
       
});