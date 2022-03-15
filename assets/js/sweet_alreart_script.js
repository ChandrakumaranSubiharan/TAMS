document.querySelector(".login-emty-msg").addEventListener('click', function(){
  Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Please Fill out Login Details !'});
  });


  document.querySelector(".login-success-msg").addEventListener('click', function(){
  Swal.fire({
      icon: 'success',
      title: 'Oops...',
      text: 'Successfully Loged in...Please click ok to get redirect to dashboard'});
  });