const feedback = {
  write: document.getElementById('writeFeedBack'),
  show: document.getElementById('showFeedBacks'),
};

$(function () {

  feedback.write.onclick = ()=>{
    window.location.href = '/writeFeedBack/';
  };

  feedback.show.onclick = ()=>{
    window.location.href = '/ShowFeedBacks/';
  };

    document.getElementById('mainLogo').onclick = function () {
    mainLogo()
  };
  for(let $i = 1; $i <=4; $i+=1) {
    $('#sub'+$i).hide();
    $('#'+$i).hover(function () {
      $('#sub'+$i).toggle("fast");
    })
  }
  let $len = document.getElementsByClassName('click').length;
  for(let $i = 0; $i<$len; $i++) {
    document.getElementsByClassName('click')[$i].id = 'notYet'+$i;
    document.getElementById('notYet'+$i).onclick =  function () {
      notYet()
    }
  }
});



function notYet() {
  alert('not yet');
}

function Registration() {
  window.location.href = '/registation/'
}
function login() {
  window.location.href = '/login/'
}

function mainLogo() {
  window.location.href = '/'
}

function LogOut(){
  $.ajax({

          type: "GET",
          url: "/logOut/",
          success: function () {
            window.location.href = '/';
          }
    })
}