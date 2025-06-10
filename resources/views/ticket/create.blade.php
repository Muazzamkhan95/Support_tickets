<!DOCTYPE html>
<html>
<head>
    <title>Submit Support Ticket</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .heading{
            height:150px;
            width:100%;
            background-color:#37c3f8;
            align-content:center;
            text-align:center;
            color:white;
        }
        .btn-primary{
            background-color:#37c3f8;
            border-color: #37c3f8;
        }
    </style>
</head>
<body class="p-0">
        <div class=" heading">
            <h2>Submit a Support Ticket</h2>
        </div>
    <div class="container p-5" >

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('ticket.store') }}">
            @csrf

            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Your Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="col mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Ticket Type</label>
                <select name="ticket_type" class="form-control" required>
                    <option value="">-- Select Type --</option>
                    <option>Technical Issues</option>
                    <option>Account & Billing</option>
                    <option>Product & Service</option>
                    <option>General Inquiry</option>
                    <option>Feedback & Suggestions</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Message</label>
                <textarea name="message" rows="5" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit Ticket</button>
        </form>
    </div>
</body>
</html>
