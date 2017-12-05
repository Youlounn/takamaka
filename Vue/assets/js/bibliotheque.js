$.ajax({
  type: 'POST',
  url: "Controleur/Routeur.php",
  data : {
    method: "getMailing"
  },
  success: function (retour, textStatus, jqXHR) {
    data = JSON.parse(retour);
    console.log(data);
    var table_body = $('#mailing_table_body');
    for(var i = 0; i < data.length; i++){
      var type = 'privé';
      if(data[i][9] == 1){
        type = 'public';
      }
      table_body.append("<tr class='mail_row'><th>"+data[i][0]+"</th><th>"+data[i][2]+"</th><th>"+data[i][3]+"</th><th>"+data[i][4]+"</th><th>"+data[i][5]+"</th><th>"+data[i][6]+"</th><th>"+data[i][7]+"</th><th>"+data[i][8]+"</th><th>"+data[i][9]+"</th><th>"+type+"</th><th><a href='#' class='small button'>Supprimer</a></th><th><a href='#' class='small button'>Modifier</a></th></tr>")
    }
    addClass();
  }
});

function addClass(){
  $('.delete').click(function(){
    alert('salut2222');
  });
  $('.modif').click(function(){
    alert('salut111');
  })
}
