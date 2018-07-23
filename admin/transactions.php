<!DOCTYPE html>
<html lang="en">
<head>
  <title>Users</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel='stylesheet' href='css/style.css'>
<script>
    $(function() {
        $('#transactions').addClass('active');
        $('#users').removeClass('active');

        getTransactions();
    });

    function getTransactions() {
        $.ajax({
            url: 'services/get_transactions.php',
            type: 'GET',
            success: function(result) {
                json = JSON.parse(result);
                var index = 1;
                for (let transaction of json) {
                    row = $('<tr>');
                    row.append($('<td>').html(index));
                    row.append($('<td>').html(transaction['email']));
                    row.append($('<td>').html(transaction['currency']));
                    row.append($('<td>').html(transaction['amount']));
                    row.append($('<td>').html(transaction['token_amount']));
                    row.append($('<td>').html(transaction['token_bonus']));
                    row.append($('<td>').html(transaction['conversion_rate']));
                    row.append($('<td>').html(transaction['wallet_address']));
                    row.append($('<td>').html(transaction['status']));
                    row.append($('<td>').html(transaction['date']));
                    row.append('<td><button class="btn btn-primary btn-xs" onclick="editTransaction(' + transaction['transaction_id'] + ')"><span class="glyphicon glyphicon-pencil"></span></button></td>');
                    $('#transaction_table').append(row);
                    index++;
                }
            }
        })
    }

    function editTransaction(transaction_id) {
        $.ajax({
            url: 'services/get_transactions.php',
            type: 'GET',
            data: {'transaction_id': transaction_id},
            success: function(result) {
                transaction = JSON.parse(result);
                $('#amount').val(transaction['amount']);
                $('#currency').val(transaction['currency']);
                $('#token_amount').val(transaction['token_amount']);
                $('#token_bonus').val(transaction['token_bonus']);
                $('#email').val(transaction['email']);
                $('#conversion_rate').val(transaction['conversion_rate']);
                $('#wallet_address').val(transaction['wallet_address']);
                $('#status').val(transaction['status']);
                $('#transaction_id').val(transaction['transaction_id']);
                $('#edit').modal('show');
            }
        })
    }

    function updateTransaction() {
        $.ajax({
            url: 'services/update_transaction.php',
            type: 'POST',
            data: $('#data_form').serialize(),
            success: function(result) {
                json = JSON.parse(result);
                if (json.code == 200) {
                    $('#edit').modal('hide');
                    $('#transaction_table > tbody').html('');
                    getTransactions();
                }
            }
        })
    }
</script>
</head>
<body>

<?php include 'html/nav.html' ?>
  
<div class="container">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4>Transaction list</h4>
        <div class="table-responsive">          
          <table id="transaction_table" class="table table-bordred table-striped">   
            <thead>
            <th>#</th>
            <th>Email</th>
            <th>Currency</th>
            <th>Amount</th>
            <th>Token amount</th>
            <th>Token bonus</th>
            <th>Conversion rate</th>
            <th>Wallet Address</th>
            <th>Status</th>
            <th>Date</th>
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
          <h4 class="modal-title custom_align" id="Heading">Edit Transaction Detail</h4>
        </div>
        <div class="modal-body">
          <form id='data_form'>
            <div class='row'>
              <div class="form-group col-sm-6">
                <label>Amount</label>
                <input id='amount' class="form-control" type="number" name='amount' readonly>
              </div>
              <div class="form-group col-sm-6">
                <label>Currency</label>
                <input id='currency' class="form-control " type="text" name='currency' readonly>
              </div>
            </div>
            <div class='row'>
              <div class="form-group col-sm-6">
                <label>Conversion rate</label>
                <input id='conversion_rate' class="form-control" type="number" name='conversion_rate' readonly>
              </div>
              <div class="form-group col-sm-6">
                <label>Token amount</label>
                <input id='token_amount' class="form-control " type="number" name='token_amount' readonly>
              </div>
            </div>
            <div class='row'>
              <div class="form-group col-sm-6">
                <label>Email</label>
                <input id='email' class="form-control" type="text" name='email' readonly>
              </div>
              <div class="form-group col-sm-6">
                <label>Token bonus</label>
                <input id='token_bonus' class="form-control " type="number" name='token_bonus'>
              </div>
            </div>
            <div class='row'>
              <div class="form-group col-sm-6">
                <label>Wallet address</label>
                <input id='wallet_address' class="form-control" type="text" name='wallet_address'>
              </div>
              <div class="form-group col-sm-6">
                <label>Status</label>
                <select id='status' class="form-control" name='status'>
                  <option value='Pending'>Pending</option>
                  <option value='Confirmed'>Confirmed</option>
                  <option value='Canceled'>Canceled</option>
                </select>
              </div>
              <input id='transaction_id' class="form-control " type="hidden" name='transaction_id'>
            </div>
          </form>
        </div>
        <div class="modal-footer ">
          <button type="button" class="btn btn-primary btn-lg" style="width: 100%;" onclick='updateTransaction()'><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
        </div>
      </div>
    </div>
  </div>
    
</div>

</body>
</html>
