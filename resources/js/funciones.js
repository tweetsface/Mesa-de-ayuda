
         $('#myModal3').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) 
          var id = button.data('id') 
          var cNombre = button.data('cnombre') 
          var cApellidos = button.data('capellidos')
          var email = button.data('email') 
          var password = button.data('password')
          var modal=$(this)
          modal.find('.modal-body #id1').val(id);
          modal.find('.modal-body #cNombre1').val(cNombre);
          modal.find('.modal-body #cApellidos1').val(cApellidos);
          modal.find('.modal-body #email1').val(email);
          modal.find('.modal-body #password1').val(password);
      });