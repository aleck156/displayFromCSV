<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>displayFromCSV</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <table>
    <thead>
      <tr>
        <th>Date</th>
        <th>Check #</th>
        <th>Description</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <?php if(! empty($transactions)): ?>
        <?php foreach($transactions as $transaction): ?>
          <tr>
            <td><?= formatDate($transaction['date'])?></td>
            <td><?= $transaction['checkNumber']?></td>
            <td><?= $transaction['description']?></td>
            <td><?= formatDollarAmount($transaction['amount'])?></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
    <tfoot>
      <tr>
        <th colspan="3">Total income: </th>
        <td><?= formatDollarAmount($totals['totalIncome'])?></td>
      </tr>
      <tr>
        <th colspan="3">Total expense: </th>
        <td><?= formatDollarAmount($totals['totalExpense'])?></td>
      </tr>
      <tr>
        <th colspan="3">Net Total:</th>
        <td><?= formatDollarAmount($totals['netTotal'])?></td>
      </tr>
    </tfoot>

  </table>
</body>
</html>