<?php include '../app/Views/layout/header.php'; ?>
<div class="row">
    <div class="col-md-12">
        <div class="p-5 mb-4 bg-white rounded-3 shadow">
            <h1>Welcome, <?= $_SESSION['user_name'] ?? 'User'; ?>!</h1>
            <p class="lead">Company Tax & Expense Management Dashboard.</p>
            <hr>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="p-3 border rounded bg-light">
                        <h5>Total Expenses</h5>
                        <h3>$<?= number_format($data['total_amount'], 2); ?></h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 border rounded bg-light border-primary">
                        <h5>Tax Deductible</h5>
                        <h3>$<?= number_format($data['total_tax'], 2); ?></h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 border rounded bg-light border-success">
                        <h5>Approved Items</h5>
                        <h3><?= $data['approved_count']; ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../app/Views/layout/footer.php'; ?>