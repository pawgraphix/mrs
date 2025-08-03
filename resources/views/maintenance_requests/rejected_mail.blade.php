<!DOCTYPE html>
<html>
<body>
<h3>Hello {{ $student->full_name }}</h3>
<p>Your Maintenance Request No <strong>{{$maintenanceRequest->request_id}}</strong> ,<br/>
    for <strong>{{$maintenanceRequest->asset->name}}</strong> Has Been Rejected due to following reason: <br/>
    <i>{{$maintenanceRequest->reject_comment}}</i>
</p>
</body>
</html>
