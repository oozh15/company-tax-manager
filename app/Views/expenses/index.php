<?php include '../app/Views/layout/header.php'; ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>My Expense History</h2>
    <a href="/expenses/create" class="btn btn-primary">+ Add New</a>
</div>
<table class="table table-hover bg-white shadow-sm">
    <thead class="table-dark">
        <tr>
            <th>Date</th>
            <th>Amount</th>
            <th>Tax (Calculated)</th>
            <th>Status</th>
            <th>Attachment</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data['expenses'] as $expense): ?>
        <tr>
            <td><?= $expense->expense_date; ?></td>
            <td>$<?= number_format($expense->amount, 2); ?></td>
            <td>$<?= number_format($expense->tax_amount, 2); ?></td>
            <td><span class="badge bg-warning"><?= $expense->status; ?></span></td>
            <td>
                <a href="/uploads/<?= $expense->receipt_path; ?>" target="_blank" class="btn btn-sm btn-outline-info">View File</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php include '../app/Views/layout/footer.php'; ?>