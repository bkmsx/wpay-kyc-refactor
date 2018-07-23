<!DOCTYPE html>
<html lang="en">
<head>
  <title>Users</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" type="image/png" href="../img/favicon.png"/>
  <link rel='stylesheet' href='css/style.css'>
  <script src='../js/bootstrap-datepicker.js'></script>
  <link href="../css/bootstrap-datepicker.css" rel="stylesheet">
</head>
<script>
    $(function() {
        $('#transactions').removeClass('active');
        $('#users').addClass('active');

        getUsers();
    });

    function getUsers() {
      $.ajax({
          url: 'services/get_users.php',
          type: 'GET',
          success: function(result) {
            var json = JSON.parse(result);
            var index = 1;
            for (let user of json) {
              row = $('<tr>');
              row.append($('<td>').html(index));
              row.append($('<td>').html(user['email']));
              row.append($('<td>').html(user['first_name']));
              row.append($('<td>').html(user['last_name']));
              row.append($('<td>').html(user['date_birth']));
              row.append($('<td>').html(user['status']));
              row.append($('<td>').html(user['citizenship']));
              row.append($('<td>').html(user['country']));
              row.append($('<td>').html(user['token_number']));
              if (user['passport_location'] != null) {
                row.append('<td style="text-align:center"><button class="btn btn-primary btn-xs" onclick="showPassport(\'' + user['passport_location'] + '\')"  ><span class="glyphicon glyphicon-picture"></span></button></td>');
              } else {
                row.append($('<td>'));
              }
              row.append('<td><button class="btn btn-primary btn-xs" onclick="editUser(' + user['user_id'] + ')"><span class="glyphicon glyphicon-pencil"></span></button></td>');
              $('#user_table').append(row);
              index++;
            }
          }
        })
    }

    function editUser(user_id) {
      $.ajax({
        url:'services/get_users.php',
        type: 'GET',
        data: {'user_id': user_id},
        success: function(result) {
          user = JSON.parse(result);
          $('#first_name').val(user['first_name']);
          $('#last_name').val(user['last_name']);
          $('#email').val(user['email']);
          $('#date_birth').val(user['date_birth']);
          $('#token_number').val(user['token_number']);
          $('#citizenship').val(user['citizenship']);
          $('#country').val(user['country']);
          $('#status').val(user['status']);
          $('#user_id').val(user['user_id']);
          $('#edit').modal('show');
        }
      })
    }

    function updateUser() {
      $.ajax({
        url: 'services/update_user.php',
        type: 'POST',
        data: $('#data_form').serialize(),
        success: function(result) {
          json = JSON.parse(result);
          if (json.code == 200) {
            $('#edit').modal('hide');
            $('#user_table > tbody').html('');
            getUsers();
          }
        }
      })
    }

    function showPassport(passport_location) {
      $('#passport').modal('show');
      $('#image').attr('src', '..' + passport_location);
    }
</script>
<body>

<?php include 'html/nav.html' ?>
  
<div class="container">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4>User list</h4>
        <div class="table-responsive">          
          <table id="user_table" class="table table-bordred table-striped">   
            <thead>
            <th>#</th>
            <th>Email</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of birth</th>
            <th>Status</th>
            <th>Citizenship</th>
            <th>Country</th>
            <th>Token amount</th>
            <th>Passport</th>
            <th>Edit</th>
            </thead>
            <tbody>
            </tbody>     
          </table>
          <div class="clearfix"></div>               
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
          <h4 class="modal-title custom_align" id="Heading">Edit User Detail</h4>
        </div>
        <div class="modal-body">
          <form id='data_form'>
            <div class='row'>
              <div class="form-group col-sm-6">
                <label>First name</label>
                <input id='first_name' class="form-control" type="text" name='first_name'>
              </div>
              <div class="form-group col-sm-6">
                <label>Last name</label>
                <input id='last_name' class="form-control " type="text" name='last_name'>
              </div>
            </div>
            <div class='row'>
              <div class="form-group col-sm-6">
                <label>Email</label>
                <input id='email' class="form-control" type="text" name='email' readonly>
              </div>
              <div class="form-group col-sm-6">
                <label>Date of birth</label>
                <input id='date_birth' class="form-control " type="text" name='date_birth'>
              </div>
            </div>
            <div class='row'>
              <div class="form-group col-sm-6">
                <label>Citizenship</label>
                <input id='citizenship' class="form-control" type="text" name='citizenship' readonly>
              </div>
              <div class="form-group col-sm-6">
                <label>Country</label>
                <input id='country' class="form-control " type="text" name='country' readonly>
              </div>
            </div>
            <div class='row'>
              <div class="form-group col-sm-6">
                <label>Token amount</label>
                <input id='token_number' class="form-control" type="number" name='token_number'>
              </div>
              <div class="form-group col-sm-6">
                <label>Status</label>
                <select id='status' class="form-control" name='status'>
                  <option value='CLEARED'>CLEARED</option>
                  <option value='PENDING'>PENDING</option>
                  <option value='CANCELED'>CANCELED</option>
                </select>
              </div>
              <input id='user_id' class="form-control " type="hidden" name='user_id'>
            </div>
          </form>
        </div>
        <div class="modal-footer ">
          <button type="button" class="btn btn-primary btn-lg" style="width: 100%;" onclick='updateUser()'><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
        </div>
      </div>
    </div>
  </div>
    
    
    
  <div class="modal fade" id="passport" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
          <h4 class="modal-title custom_align" id="Heading">Passport</h4>
        </div>
        <div class="modal-body">
          <img id='image' style='width:500px; height:500px'>
        </div>
      </div>

    </div>
  </div>
</div>

<script>
$('#date_birth').datepicker({
  format: 'dd/mm/yyyy'
});
</script>
</body>
</html>
