var toursService = {

  init: function() {

    $("#addUserForm").validate({

      submitHandler: function(form) {
        var user = Object.fromEntries((new FormData(form)).entries());

        usersService.add(user);
      }


    });
    usersService.list();



  },

  list: function() {
    $.get("rest/tours", function(data) {

      $("#toursList").html("");

      var html = "";

      for (i = 0; i < data.length; i++) {

        html += `

    <div style="margin-top: 50px; display: inline-block;">
      <div class="card" style="width: 25rem;">
         <img src="https://i.natgeofe.com/n/45610619-0806-45f7-94c2-9f366df60aac/old-town-bascarsija-sarajevo.jpg">
         <h5 class="card-title">` + data[i].title + `</h5>
         <p class="card-text">` + data[i].description + ` :Some quick example text to build on the card title and make up the bulk of the card's content.</p>
         <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary">Edit</button>
            <button type="button" class="btn btn-success">Go</button>
         </div>
      </div>
    </div>`

      }

      $("#toursList").html(html);

      console.log(data);

    });

  },


  add: function(user) {
    $.ajax({
      url: 'rest/users',
      type: 'POST',
      data: JSON.stringify(user),
      contentType: "application/json",
      dataType: "json",
      success: function(result) {

        usersService.list();

        $("#addModal").modal("hide");
      }
    });

  },

  get: function(id) {


    $.get('rest/users/' + id, function(data) {
      console.log(data);
      //$("#exampleModal .modal-body").html(id);
      $("#description").val(data.description);
      $("#created").val(data.created);
      $("#id").val(data.id);
      $("#editModal").modal("show");


    })
  },

  update: function() {
    var user = {};
    user.description = $('#description').val();
    user.created = $('#created').val();

    $.ajax({
      url: 'rest/users/' + $('#id').val(),
      type: 'PUT',
      data: JSON.stringify(user),
      contentType: "application/json",
      dataType: "json",
      success: function(result) {
        $("#editModal").modal("hide");
        usersService.list();

      }
    });


  },

  delete: function(id) {
    $.ajax({
      url: 'rest/users/' + id,
      type: 'DELETE',
      success: function(response) {
        usersService.list();
      }
    });
  }
}
