<!DOCTYPE html>
<html>
<body>
<h3>Hello {{ $student->full_name }}</h3>
<p>Your Maintenance Request No <strong>{{$maintenanceRequest->request_id}}</strong> , for <strong>{{$maintenanceRequest->asset->name}}</strong> Has Been Resolved </p>
</body>
</html>
