<?php include '../app/Views/layout/header.php'; ?>
<h2>Submit New Expense</h2>
<div class="card shadow-sm">
    <div class="card-body">
        <form action="/expenses/create" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Amount (Total)</label>
                    <input type="number" step="0.01" name="amount" class="form-control" placeholder="0.00" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Receipt Upload (Image or PDF)</label>
                    <input type="file" name="receipt" class="form-control" accept=".jpg,.png,.pdf" required>
                </div>
            </div>
            <div class="mb-3">
                <label>Description / Purpose</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit for Approval</button>
        </form>
    </div>
</div>
<?php include '../app/Views/layout/footer.php'; ?>