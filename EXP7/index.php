<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        body { background: #f8fafc; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .container-card { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
        .table th { background: #2563eb; color: white; border: none; }
        .btn { border-radius: 8px; }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="container-card">
        <h2 class="text-center mb-4">Student Management System</h2>
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <input type="text" id="search" class="form-control" placeholder="🔍 Search students...">
            </div>
            <div class="col-md-3">
                <input type="text" id="name" class="form-control" placeholder="Full Name">
            </div>
            <div class="col-md-3">
                <input type="email" id="email" class="form-control" placeholder="Email Address">
            </div>
            <div class="col-md-2">
                <input type="text" id="phone" class="form-control" placeholder="Phone Number">
            </div>
            <div class="col-md-1">
                <button id="addStudent" class="btn btn-primary w-100">Add</button>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody id="tableData">
                <!-- rows loaded via AJAX -->
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Student Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="editId">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" id="editName" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" id="editEmail" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" id="editPhone" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button id="updateStudent" class="btn btn-success">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>