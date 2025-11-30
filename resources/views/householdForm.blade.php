<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Household</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #F8F8ED;">
<div class="container-fluid">
    <div class="row">
        <div class="col-2 p-0">
            @include('sidebar')
        </div>
        <div class="col-10 py-4">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow" style="border-color: #677233;">
                        <div class="card-header text-center" style="background-color: #1F2310; color: white;">
                            <h4 class="mb-0">Add Household Information</h4>
                        </div>
                        <div class="card-body" style="background-color: white;">
                            <form action="{{ route('households.register') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="head" class="form-label fw-semibold" style="color: #1F2310;">Household Head</label>
                                    <input type="text" class="form-control" name="head" id="head" 
                                           placeholder="Juan Dela Cruz" style="border-color: #677233;" required>
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label fw-semibold" style="color: #1F2310;">Address</label>
                                    <input type="text" class="form-control" name="address" id="address" 
                                           placeholder="123 Manila Street" style="border-color: #677233;" required>
                                </div>

                                <div class="mb-3">
                                    <label for="contact" class="form-label fw-semibold" style="color: #1F2310;">Contact Information</label>
                                    <input type="text" class="form-control" name="contact" id="contact" 
                                           placeholder="09123456789" style="border-color: #677233;" required>
                                </div>

                                <div class="mb-3">
                                    <label for="members" class="form-label fw-semibold" style="color: #1F2310;">Number of Members</label>
                                    <input type="number" class="form-control" name="members" id="members" 
                                           placeholder="1" style="border-color: #677233;" min="1" max="50" required>
                                </div>

                                <div class="mb-3">
                                    <label for="pic" class="form-label fw-semibold" style="color: #1F2310;">Household Image</label>
                                    <input type="file" class="form-control" name="pic" id="pic" 
                                           accept="image/*" style="border-color: #677233;">
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn px-5 py-2 fw-bold" 
                                            style="background-color: #454C28; border-color: #454C28; color: white;">
                                        Save Household
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>