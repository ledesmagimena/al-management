import Swal from "sweetalert2";
import axios from "axios";

export function showAlert(title,icon,foco=''){
  if(foco != ''){
    document.getElementById(foco).focus();
  }

  Swal.fire({
    icon: icon,
    title: title,
    customClass:{confirmButton: 'btn btn-primary', popup: 'animated zoonIn'},
    buttonsStyling: false
  });
}

export function confirmDelete(url, id, title, message){
  const urlp = url+id;
  const btnCancel = Swal.mixin({
    customClass:{confirmButton: 'btn btn-success me-3', cancelButton:'btn btn-danger'},
    buttonsStyling: false
  });

  btnCancel.fire({
    title: title,
    text: message,
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Si, eliminar!',
    cancelButtonText: 'Cancelar'}).then((result) => {
    if(result.isConfirmed){
      sendRequest('DELETE', {id:id}, urlp, 'Eliminado con éxito');
    }else {
      showAlert('Operación cancelada', 'info');
    }
});

Swal.fire({
  icon: icon,
    title: title,
    customClass:{confirmButton: 'btn btn-primary', popup: 'animated zoonIn'},
    buttonsStyling: false
});
}

export function sendRequest(metodo, params, urlp, message){
  axios({
    method: metodo,
    url: urlp,
    data: params
  })
 .then(function(response){
  const status = response.status;
  if(status == 200){
    showAlert(message, 'success');
    window.setTimeout(function(){
      window.location.href='/products';
    },1000);
  }else {
    showAlert('error de servidor', 'error');
  }
 });
}