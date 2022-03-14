if(document.getElementById('producto').value){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Ha habido un error al crear el producto',
      })
}
